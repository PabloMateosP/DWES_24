<?php

class Album extends Controller
{

    function __construct()
    {

        parent::__construct();


    }

    function render()
    {

        # inicio o continuo sesión
        session_start();

        # compruebo usuario autentificado
        if (!isset($_SESSION['id'])) {
            $_SESSION['notify'] = "Usuario sin autentificar";
            header("location:" . URL . "login");
        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['album']['main']))) {
            $_SESSION['mensaje'] = "Ha intentado realizar operación sin privilegios";
            header('location:' . URL . 'index');
        } else {

            if (isset($_SESSION['mensaje'])) {
                $this->view->mensaje = $_SESSION['mensaje'];
                unset($_SESSION['mensaje']);
            }


            # Creo la propiedad title de la vista
            $this->view->title = "Home - Panel Control albumes";

            # Creo la propiedad albumes dentro de la vista
            # Del modelo asignado al controlador ejecuto el método get();
            $this->view->albumes = $this->model->get();

            $this->view->render('album/main/index');
        }

    }

    function new()
    {

        # iniciar o continuar  sesión
        session_start();

        # compruebo usuario autentificado
        if (!isset($_SESSION['id'])) {
            $_SESSION['notify'] = "Usuario debe autentificarse";

            header("location:" . URL . "login");

        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['album']['new']))) {
            $_SESSION['mensaje'] = "Operación sin privilegios";
            header('location:' . URL . 'album');
        } else {

            # Crear un objeto album vacio
            $this->view->album = new classalbum();

            # Comprobar si vuelvo de  un registro no validado
            if (isset($_SESSION['error'])) {

                # Mensaje de error
                $this->view->error = $_SESSION['error'];

                # Autorrellenar formulario con los detalles del  album
                $this->view->album = unserialize($_SESSION['album']);

                # Recupero array errores  específicos
                $this->view->errores = $_SESSION['errores'];

                # Elimino las variables de sesión
                unset($_SESSION['error']);
                unset($_SESSION['album']);
                unset($_SESSION['errores']);
            }

            # etiqueta title de la vista
            $this->view->title = "Añadir - Gestión albumes";

            # cargo la vista con el formulario nuevo album
            $this->view->render('album/new/index');
        }
    }

    function create($param = [])
    {

        # Iniciar sesión
        session_start();

        if (!isset($_SESSION['id'])) {
            $_SESSION['mensaje'] = "Usuario debe autentificarse";

            header("location:" . URL . "login");

        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['album']['new']))) {
            $_SESSION['mensaje'] = "Operación sin privilegios";
            header('location:' . URL . 'album');
        } else {

            # 1. Seguridad. Saneamos los  datos del formulario
            $titulo = filter_var($_POST['titulo'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $descripcion = filter_var($_POST['descripcion'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $autor = filter_var($_POST['autor'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $fecha = filter_var($_POST['fecha'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $lugar = filter_var($_POST['lugar'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $categoria = filter_var($_POST['categoria'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $etiquetas = filter_var($_POST['etiquetas'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $carpeta = filter_var($_POST['carpeta'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);


            # 2. Creamos album con los datos saneados
            $album = new classalbum(
                null,
                $titulo,
                $descripcion,
                $autor,
                $fecha,
                $lugar,
                $categoria,
                $etiquetas,
                0,
                0,
                $carpeta
            );

            # 3. Validación
            $errores = [];


            if (empty($album->titulo)) {
                $errores['titulo'] = "Titulo no puede estar vacio";
            }

            #Validar descripción
            if (empty($album->descripcion)) {
                $errores['descripcion'] = "Descripción no puede estar vacio";
            }

            #Validar autor
            if (empty($album->autor)) {
                $errores['autor'] = "Autor no puede estar vacio";
            }

            #Validar fecha
            if (empty($album->fecha)) {
                $errores['fecha'] = "Fecha no puede estar vacio";
            }

            #Validar lugar
            if (empty($album->lugar)) {
                $errores['lugar'] = "Lugar no puede estar vacio";
            }

            #Validar categoria
            if (empty($album->categoria)) {
                $errores['categoria'] = "Categoria no puede estar vacio";
            }

            #Validar carpeta
            if (empty($album->carpeta)) {
                $errores['carpeta'] = "Carpeta no puede estar vacio";
            }

            if (!empty($errores)) {

                #Formulario no validado
                $_SESSION['album'] = Serialize($album);
                $_SESSION['error'] = "Fallo en la validación del formulario";
                $_SESSION['errores'] = $errores;

                #Redireccionamos a nuevo album
                header('Location: ' . URL . 'album/nuevo');

            } else {

                $this->model->create($album);

                mkdir("images/" . $album->carpeta);

                $_SESSION['mensaje'] = "Album añadido correctamente";

                header('Location: ' . URL . 'album');
            }

        }
    }

    function edit($param = [])
    {

        # iniciamos sesión
        session_start();

        if (!isset($_SESSION['id'])) {
            $_SESSION['mensaje'] = "Usuario debe autentificarse";

            header("location:" . URL . "login");

        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['album']['edit']))) {
            $_SESSION['mensaje'] = "Operación sin privilegios";
            header('location:' . URL . 'album');
        } else {

            # obtengo el id del album que voy a editar
            # album/edit/4

            $id = $param[0];

            # asigno id a una propiedad de la vista
            $this->view->id = $id;

            # title
            $this->view->title = "Editar - Panel de control albumes";

            # obtener objeto de la clase album
            $this->view->album = $this->model->read($id);


            # Comprobar si el formulario viene de una no validación
            if (isset($_SESSION['error'])) {

                # Mensaje de error
                $this->view->error = $_SESSION['error'];

                # Autorrellenar formulario con los detalles del  album
                $this->view->album = unserialize($_SESSION['album']);

                # Recupero array errores  específicos
                $this->view->errores = $_SESSION['errores'];

                # Elimino las variables de sesión
                unset($_SESSION['error']);
                unset($_SESSION['album']);
                unset($_SESSION['errores']);
            }

            # cargo la vista
            $this->view->render('album/edit/index');

        }
    }

    public function update($param = [])
    {

        # iniciar sesión
        session_start();

        if (!isset($_SESSION['id'])) {
            $_SESSION['mensaje'] = "Usuario debe autentificarse";

            header("location:" . URL . "login");

        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['album']['edit']))) {
            $_SESSION['mensaje'] = "Operación sin privilegios";
            header('location:' . URL . 'album');
        } else {

            # 1. Seguridad. Saneamos los  datos del formulario
            $titulo = filter_var($_POST['titulo'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $descripcion = filter_var($_POST['descripcion'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $autor = filter_var($_POST['autor'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $fecha = filter_var($_POST['fecha'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $lugar = filter_var($_POST['lugar'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $categoria = filter_var($_POST['categoria'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $etiquetas = filter_var($_POST['etiquetas'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $carpeta = filter_var($_POST['carpeta'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);


            # 2. Creamos album con los datos saneados
            $album = new classalbum(
                null,
                $titulo,
                $descripcion,
                $autor,
                $fecha,
                $lugar,
                $categoria,
                $etiquetas,
                0,
                0,
                $carpeta
            );

            # Cargo id del album que voya a actualizar
            $id = $param[0];

            # Obtengo el  objeto album original
            $album_orig = $this->model->read($id);

            # 3. Validación
            # Sólo si es necesario
            # Sólo en caso de modificación del campo

            $errores = [];

            #Validar titulo
            if (strcmp($titulo, $album_orig->titulo) !== 0) {
                if (empty($titulo)) {
                    $errores['titulo'] = 'El campo titulo es  obligatorio';
                }
            }

            #Validar descripcion
            if (strcmp($descripcion, $album_orig->descripcion) !== 0) {
                if (empty($descripcion)) {
                    $errores['descripcion'] = 'El campo descripcion es  obligatorio';
                }
            }

            # Validar autor  
            if (strcmp($autor, $album_orig->autor) !== 0) {
                if (empty($autor)) {
                    $errores['autor'] = 'El campo autor es obligatorio';
                }
            }

            # Validar fecha
            if (strcmp($fecha, $album_orig->fecha) !== 0) {
                if (empty($fecha)) {
                    $errores['fecha'] = 'El campo fecha es obligatorio';
                }
            }

            # Validar lugar
            if (strcmp($lugar, $album_orig->lugar) !== 0) {
                if (empty($lugar)) {
                    $errores['lugar'] = 'El campo lugar es obligatorio';
                }
            }

            # Validar categoria
            if (strcmp($categoria, $album_orig->categoria) !== 0) {
                if (empty($categoria)) {
                    $errores['categoria'] = 'El campo categoria es obligatorio';
                }
            }

            #Validar carpeta
            if (empty($album->carpeta)) {
                $errores['carpeta'] = "Carpeta no puede estar vacio";
            }

            #Validar etiquetas
            if (empty($album->etiquetas)) {
                $errores['etiquetas'] = "Etiquetas no puede estar vacio";
            }

            # 4. Comprobar  validación

            if (!empty($errores)) {
                # errores de validación
                # variables sesión no admiten objetos
                $_SESSION['album'] = serialize($album);
                $_SESSION['error'] = 'Formulario no ha sido validado';
                $_SESSION['errores'] = $errores;

                # redireccionamos a new
                header('location:' . URL . 'album/edit/' . $id);


            } else {

                # Actualizo registro
                $this->model->update($album, $id);

                # Mensaje
                $_SESSION['mensaje'] = "album actualizado correctamente";

                # Redirigimos al main de albumes
                header('location:' . URL . 'album');

            }

        }
    }

    public function order($param = [])
    {

        # inicio o continúo sesión
        session_start();

        if (!isset($_SESSION['id'])) {
            $_SESSION['mensaje'] = "Usuario debe autentificarse";

            header("location:" . URL . "login");

        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['album']['order']))) {
            $_SESSION['mensaje'] = "Operación sin privilegios";
            header('location:' . URL . 'album');
        } else {

            # Obtengo criterio de ordenación
            $criterio = $param[0];

            # Creo la propiedad title de la vista
            $this->view->title = "Ordenar - Panel Control albumes";

            # Creo la propiedad albumes dentro de la vista
            # Del modelo asignado al controlador ejecuto el método get();
            $this->view->albumes = $this->model->order($criterio);

            # Cargo la vista principal de album
            $this->view->render('album/main/index');
        }
    }

    public function filter($param = [])
    {

        # inicio o continúo sesión
        session_start();

        if (!isset($_SESSION['id'])) {
            $_SESSION['mensaje'] = "Usuario debe autentificarse";
            header("location:" . URL . "login");
        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['album']['filter']))) {
            $_SESSION['mensaje'] = "Operación sin privilegios";
            header('location:' . URL . 'album');
        } else {

            # Obtengo expresión de búsqueda
            $expresion = $_GET['expresion'];

            # Creo la propiedad title de la vista
            $this->view->title = "Buscar - Panel Control albumes";

            # Filtro a partir de la  expresión
            $this->view->albumes = $this->model->filter($expresion);

            # Cargo la vista principal de album
            $this->view->render('album/main/index');
        }
    }

    // public function delete($param = [])
    // {

    //     # inicar sesión
    //     session_start();

    //     if (!isset($_SESSION['id'])) {
    //         $_SESSION['mensaje'] = "Usuario debe autentificarse";

    //         header("location:" . URL . "login");

    //     } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['album']['delete']))) {
    //         $_SESSION['mensaje'] = "Operación sin privilegios";
    //         header('location:' . URL . 'album');
    //     } else {

    //         # obtenemos id del  album
    //         $id = $param[0];

    //         # eliminar album
    //         $this->model->delete($id);

    //         #Creamos variable album para borrado carpeta
    //         $album = $this->model->read($id);

    //         # Iteramos eliminando las fotos de esa carpeta
    //         foreach( glob("images/" . $album->carpeta . "/*") as $a){

    //             unlink($a);
    //             // Consigo borrar las fotos pero no la carpeta

    //         }

    //         // No consigo que se borre la carpeta del todo 
    //         rmdir("images/" . $album->carpeta);

    //         # generar mensaje
    //         $_SESSION['mensaje'] = 'album eliminado correctamente';

    //         # redirecciono al main de albumes
    //         header('location:' . URL . 'album');
    //     }
    // }

    public function delete($param = [])
    {
        session_start();

        if (!isset($_SESSION['id'])) {
            $_SESSION['mensaje'] = "Usuario debe autentificarse";
            header("location:" . URL . "login");
            return;
        }

        if (!in_array($_SESSION['id_rol'], $GLOBALS['album']['delete'])) {
            $_SESSION['mensaje'] = "Operación sin privilegios";
            header('location:' . URL . 'album');
            return;
        }

        $id = $param[0];
        
        $album = $this->model->read($id);

        $this->model->delete($id);

        foreach (glob("images/" . $album->carpeta . "/*") as $a) {

            unlink($a);
            // Consigo borrar las fotos pero no la carpeta

        }

        if (is_dir("images/" . $album->carpeta)) {
            rmdir("images/" . $album->carpeta);
        }

        // Set success message
        $_SESSION['mensaje'] = 'Album eliminado correctamente';

        // Redirect to the main album page
        header('location:' . URL . 'album');
    }


    function subir($param)
    {

        session_start();

        if (isset($_SESSION['error'])) {

            $this->view->error = $_SESSION['error'];

            unset($_SESSION['error']);

        }

        if (isset($_SESSION['mensaje'])) {

            $this->view->mensaje = $_SESSION['mensaje'];

            unset($_SESSION['mensaje']);

        }

        // Capa autentificación
        if (!isset($_SESSION['id'])) {

            header("location:" . URL . "login");

            exit();

        } else if (!in_array($_SESSION['id_rol'], $GLOBALS['album']['show'])) {

            $_SESSION['error'] = "Operacion sin privilegios";

            header("location:" . URL . "index");

            exit();

        }

        // Obtengo objeto de la clase album
        $album = $this->model->read($param[0]);

        $this->model->subirImagen($_FILES['archivos'], $album->carpeta);

        header("location:" . URL . "album");

    }

    function show($param)
    {

        session_start();

        if (isset($_SESSION['error'])) {

            $this->view->error = $_SESSION['error'];

            unset($_SESSION['error']);

        }

        if (isset($_SESSION['mensaje'])) {

            $this->view->mensaje = $_SESSION['mensaje'];

            unset($_SESSION['mensaje']);

        }

        // Capa autentificación
        if (!isset($_SESSION['id'])) {

            header("location:" . URL . "login");

            exit();

        } else if (!in_array($_SESSION['id_rol'], $GLOBALS['album']['show'])) {

            $_SESSION['error'] = "Operacion sin privilegios";

            header("location:" . URL . "index");

            exit();

        }

        // Estraigo el id del album que voy a mostrar
        $this->view->id = htmlspecialchars($param[0]);

        // Actualizo el título de la página
        $this->view->title = "Mostrar album - Albumes";

        // Obtengo objeto de la clase album
        $this->view->album = $this->model->read($this->view->id);

        //Cargo la vista
        $this->view->render('album/show/index');


    }
}

