<?php 

class Users extends Controller {

    # Método principal. Muestra todos los usuarios registrados
    public function render() {

        # Inicio sesión o continuo sesión
        session_start();

        if (!isset($_SESSION['id'])) {
            $_SESSION['notify'] = "Usuario sin autentificar";

            header("location:" . URL . "login");
        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['admin']['mostrar']))) {
            $_SESSION['mensaje'] = "Usuario sin autentificar";
            header("location:" . URL . "index");

        } else {
            #comprobar si existe mensaje
            if (isset($_SESSION['mensaje'])) {
                $this->view->mensaje = $_SESSION['mensaje'];
                unset($_SESSION['mensaje']);

            }

            $this->view->title = "Tabla Usuarios";
            $this->view->users = $this->model->get();
            $this->view->render("users/main/index");
        }
    }


    # Método eliminar. Eliminamos el usuario elegido 
    public function delete($param = [])
    {
        session_start();
        if (!isset($_SESSION['id'])) {
            $_SESSION['mensaje'] = "Usuario debe autentificarse";

            header("location:" . URL . "login");

        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['admin']['delete']))) {
            $_SESSION['mensaje'] = "Operación sin privilegio";
            header("location:" . URL . "clientes");
        } else {
            $id = $param[0];
            $this->model->delete($id);
            $_SESSION['mensaje'] = 'Usuario eliminado correctamente';

            header("Location:" . URL . "users");
        }
    }

    public function editar($param = []){
        session_start();

        if (!isset($_SESSION['id'])) {
            $_SESSION['mensaje'] = "Usuario debe autentificarse";

            header("location:" . URL . "login");

        } else if (!in_array($_SESSION['id_rol'], $GLOBALS['admin']['editar'])) {
            $_SESSION['mensaje'] = "Operación sin privilegios";

            header('location:' . URL . 'users');

        } else {

            # obtengo el id del usuario que voy a editar
            $id = $param[0];

            $this->view->id = $id;
            $this->view->title = "Formulario  editar usuario";
            $this->view->user = $this->model->read($id);

            $this->view->user = $this->model->getUser($this->view->id);


            # Comprobamos si hay errores -> esta variable se crea al lanzar un error de validacion
            if (isset($_SESSION['error'])) {
                // rescatemos el mensaje
                $this->view->error = $_SESSION['error'];

                // Autorellenamos el formulario
                $this->view->user = unserialize($_SESSION['user']);

                // Recupero array de errores específicos
                $this->view->errores = $_SESSION['errores'];

                // debemos liberar las variables de sesión ya que su cometido ha sido resuelto
                unset($_SESSION['error']);
                unset($_SESSION['errores']);
                unset($_SESSION['user']);
                // Si estas variables existen cuando no hay errores, entraremos en los bloques de error en las condicionales
            }

            $this->view->render("users/editar/index");
        }
    }

    # Método update.
    # Actualiza los detalles de un cliente a partir de los datos del formulario de edición
    public function update($param = [])
    {

        #Iniciar Sesión
        session_start();

        if (!isset($_SESSION['id'])) {
            $_SESSION['mensaje'] = "Usuario debe autentificarse";

            header("location:" . URL . "login");

        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['clientes']['edit']))) {
            $_SESSION['mensaje'] = "Operación sin privilegio";
            header("location:" . URL . "clientes");
        } else {

            #1.Seguridad. Saneamos los datos del formulario
            $password = filter_var($_POST['password'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $name = filter_var($_POST['name'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_var($_POST['email'] ??= '', FILTER_SANITIZE_EMAIL);

            $password_encriptado = password_hash($password, PASSWORD_BCRYPT);

            $user = new classUser(
                null,
                $name,
                $email,
                $password_encriptado,
                null,
                null
            );
            $id = $param[0];

            #Obtengo el objeto cliente original
            $user_orig = $this->model->read($id);

            $errores = [];

            //Name: obligatorio, maximo 20 caracteres
            if (strcmp($user->name, $user_orig->name) !== 0) {

                if (empty($name)) {
                    $errores['name'] = 'El campo nombre es obligatorio';
                } else if (strlen($name) > 20) {
                    $errores['name'] = 'El campo nombre es demasiado largo';

                }
            }

            //Email: obligatorio, formato válido y clave secundaria
            if (strcmp($user->email, $user_orig->email) !== 0) {

                if (empty($email)) {
                    $errores['email'] = 'El campo email es obligatorio';
                } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errores['email'] = 'El formato introducido es incorrecto';
                } else if (!$this->model->validateUniqueEmail($email)) {
                    $errores['email'] = 'Email ya registrado';

                }
            }

            #4. Comprobar validacion

            if (!empty($errores)) {
                //errores de validacion
                $_SESSION['user'] = serialize($user);
                $_SESSION['error'] = 'Formulario no validado';
                $_SESSION['errores'] = $errores;

                # Redirigimos al main de clientes
                header('location:' . URL . 'users/editar/' . $id);
            } else {
                //crear alumno
                # Añadir registro a la tabla
                $this->model->update($user, $id);

                #Mensaje
                $_SESSION['mensaje'] = "Usuario actualizado correctamente";

                # Redirigimos al main de alumnos
                header('location:' . URL . 'users');
            }
        }
    }

    public function ordenar($param = [])
    {
        session_start();
        if (!isset($_SESSION['id'])) {
            $_SESSION['mensaje'] = "Usuario debe autentificarse";

            header("location:" . URL . "login");

        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['admin']['order']))) {
            $_SESSION['mensaje'] = "Operación sin privilegio";
            header("location:" . URL . "clientes");
        } else {
            $criterio = $param[0];
            $this->view->title = "Tabla Usuarios";
            $this->view->users = $this->model->order($criterio);
            $this->view->render("users/main/index");
        }

    }

    # Método buscar
    # Permite buscar los registros de usuarios que cumplan con el patrón especificado en la expresión
    # de búsqueda
    public function buscar($param = [])
    {
        session_start();
        if (!isset($_SESSION['id'])) {
            $_SESSION['mensaje'] = "Usuario debe autentificarse";

            header("location:" . URL . "login");

        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['admin']['filter']))) {
            $_SESSION['mensaje'] = "Operación sin privilegio";
            header("location:" . URL . "clientes");
        } else {
            $expresion = $_GET["expresion"];
            $this->view->title = "Tabla Usuarios";
            $this->view->users = $this->model->filter($expresion);
            $this->view->render("users/main/index");
        }
    }

}