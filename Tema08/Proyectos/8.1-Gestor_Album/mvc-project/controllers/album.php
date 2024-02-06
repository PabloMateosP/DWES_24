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
            $titulo = filter_var($_POST['titulo'] ??='', FILTER_SANITIZE_SPECIAL_CHARS);
            $descripcion = filter_var($_POST['descripcion'] ??='', FILTER_SANITIZE_SPECIAL_CHARS);
            $autor = filter_var($_POST['autor'] ??='', FILTER_SANITIZE_SPECIAL_CHARS);
            $fecha = filter_var($_POST['fecha'] ??='', FILTER_SANITIZE_SPECIAL_CHARS);
            $lugar = filter_var($_POST['lugar'] ??='', FILTER_SANITIZE_SPECIAL_CHARS);
            $categoria = filter_var($_POST['categoria']  ??='', FILTER_SANITIZE_SPECIAL_CHARS);
            $etiquetas = filter_var($_POST['etiquetas'] ??='', FILTER_SANITIZE_SPECIAL_CHARS);
            $carpeta = filter_var($_POST['carpeta'] ??='', FILTER_SANITIZE_SPECIAL_CHARS);


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


            if(empty($album->titulo)){
                $errores['titulo'] = "Titulo no puede estar vacio";
            }

            #Validar descripción
            if(empty($album->descripcion)){
                $errores['descripcion'] = "Descripción no puede estar vacio";
            }

            #Validar autor
            if(empty($album->autor)){
                $errores['autor'] = "Autor no puede estar vacio";
            }

            #Validar fecha
            if(empty($album->fecha)){
                $errores['fecha'] = "Fecha no puede estar vacio";
            }

            #Validar lugar
            if(empty($album->lugar)){
                $errores['lugar'] = "Lugar no puede estar vacio";
            }

            #Validar categoria
            if(empty($album->categoria)){
                $errores['categoria'] = "Categoria no puede estar vacio";
            }else if (strlen($album->categoria) > 50){
                $errores['categoria'] = "Categoria no puede superar mas de 50 caracteres";
            }

            #Validar carpeta
            if(empty($album->carpeta)){
                $errores['carpeta'] = "Carpeta no puede estar vacio";
            }else if (strlen($album->carpeta) > 50){
                $errores['carpeta'] = "Carpeta no puede superar mas de 50 caracteres";
            }


            if(!empty($errores)){

                #Formulario no validado
                $_SESSION['album'] = Serialize($album);
                $_SESSION['error'] = "Fallo en la validación del formulario";
                $_SESSION['errores'] = $errores;

                #Redireccionamos a nuevo album
                header('Location: ' . URL . 'album/nuevo');

            }else{

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

            # obtener los cursos
            $this->view->cursos = $this->model->getCursos();

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

            # 1. Saneamos datos del formulario FILTER_SANITIZE
            $nombre = filter_var($_POST['nombre'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $apellidos = filter_var($_POST['apellidos'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_var($_POST['email'] ??= '', FILTER_SANITIZE_EMAIL);
            $telefono = filter_var($_POST['telefono'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $poblacion = filter_var($_POST['poblacion'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $dni = filter_var($_POST['dni'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $fechaNac = filter_var($_POST['fechaNac'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $id_curso = filter_var($_POST['id_curso'] ??= '', FILTER_SANITIZE_NUMBER_INT);

            # 2. Creamos el objeto album a partir de  los datos saneados del  formuario
            $album = new classalbum(
                null,
                $nombre,
                $apellidos,
                $email,
                $telefono,
                null,
                $poblacion,
                null,
                null,
                $dni,
                $fechaNac,
                $id_curso
            );

            # Cargo id del album que voya a actualizar
            $id = $param[0];

            # Obtengo el  objeto album original
            $album_orig = $this->model->read($id);

            # 3. Validación
            # Sólo si es necesario
            # Sólo en caso de modificación del campo

            $errores = [];

            #Validar nombre
            if (strcmp($nombre, $album_orig->nombre) !== 0) {
                if (empty($nombre)) {
                    $errores['nombre'] = 'El campo nombre es  obligatorio';
                }
            }

            #Validar apellidos
            if (strcmp($apellidos, $album_orig->apellidos) !== 0) {
                if (empty($apellidos)) {
                    $errores['apellidos'] = 'El campo nombre es  obligatorio';
                }
            }

            # Email: obligatorio, formáto válido y clave secundaria
            if (strcmp($email, $album_orig->email) !== 0) {
                if (empty($email)) {
                    $errores['email'] = 'El campo email es  obligatorio';
                } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errores['email'] = 'Formato email incorrecto';
                } else if (!$this->model->validateUniqueEmail($email)) {
                    $errores['email'] = 'Email existente';
                }
            }

            # Dni: obligatorio, formáto válido y clave secundaria
            # Expresión regular
            if (strcmp($dni, $album_orig->dni) !== 0) {
                $options = [
                    'options' => [
                        'regexp' => '/^(\d{8})([A-Za-z])$/'
                    ]
                ];

                if (empty($dni)) {
                    $errores['dni'] = 'El campo dni es  obligatorio';
                } else if (!filter_var($dni, FILTER_VALIDATE_REGEXP, $options)) {
                    $errores['dni'] = 'Formato DNI incorrecto';
                } else if (!$this->model->validateUniqueDNI($dni)) {
                    $errores['dni'] = 'DNI existente';
                }
            }

            # id_curso: obligatorio, entero, existente
            if (strcmp($id_curso, $album_orig->id_curso) !== 0) {
                if (empty($id_curso)) {
                    $errores['id_curso'] = 'Debe seleccionar un curso';
                } else if (!filter_var($id_curso, FILTER_VALIDATE_INT)) {
                    $errores['id_curso'] = 'Curso no válido';
                } else if (!$this->model->validateCurso($id_curso)) {
                    $errores['id_curso'] = 'Curso no existente';
                }
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

    public function delete($param = [])
    {

        # inicar sesión
        session_start();

        if (!isset($_SESSION['id'])) {
            $_SESSION['mensaje'] = "Usuario debe autentificarse";

            header("location:" . URL . "login");

        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['album']['delete']))) {
            $_SESSION['mensaje'] = "Operación sin privilegios";
            header('location:' . URL . 'album');
        } else {

            # obtenemos id del  album
            $id = $param[0];

            # eliminar album
            $this->model->delete($id);

            # generar mensaje
            $_SESSION['mensaje'] = 'album eliminado correctamente';

            # redirecciono al main de albumes
            header('location:' . URL . 'album');
        }
    }

    function subir($param){

        session_start();

        if (isset($_SESSION['error'])){

            $this->view->error = $_SESSION['error'];

            unset($_SESSION['error']);

        }

        if (isset($_SESSION['mensaje'])){

            $this->view->mensaje = $_SESSION['mensaje'];

            unset($_SESSION['mensaje']);

        }

         // Capa autentificación
         if(!isset($_SESSION['id'])){

            header("location:" . URL . "login");

            exit();

        }else if(!in_array($_SESSION['id_rol'], $GLOBALS['album']['show'])){

            $_SESSION['error'] = "Operacion sin privilegios";

            header("location:" . URL . "index");

            exit();

        }

        // Obtengo objeto de la clase album
        $album = $this->model->read($param[0]);

        $this->model->subirArchivo($_FILES['archivos'],$album->carpeta);

        header("location:" . URL . "album");

    }
}

