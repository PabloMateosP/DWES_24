<?php

class Alumno extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function render()
    {
        session_start();

        if (isset($_SESSION['mensaje'])) {
            $this->view->mensaje = $_SESSION['mensaje'];
            unset($_SESSION['mensaje']);
        }

        $this->view->title = "Home - Alumnos";

        $this->view->alumnos = $this->model->get();

        $this->view->render('alumno/main/index');
    }

    function new()
    {
        session_start();

        $this->view->alumno = new classAlumno();

        # Compruebo si existe algún error 
        if (isset($_SESSION['error'])) {

            $this->view->error = $_SESSION['error'];


            $this->view->alumno = unserialize($_SESSION['alumno']);


            $this->view->errores = $_SESSION['errores'];

            # Borramos datos de la variables a posterior de su uso
            unset($_SESSION['error']);
            unset($_SESSION['errores']);
            unset($_SESSION['alumnos']);
        }



        $this->view->title = "Añadir - Alumnos";

        $this->view->cursos = $this->model->getCursos();

        $this->view->render('alumno/new/index');
    }

    function create($param = [])
    {

        # Iniciamos sesión
        session_start();

        # Saneamos datos 
        $nombre = filter_var($_POST['nombre'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $apellidos = filter_var($_POST['apellidos'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_var($_POST['email'] ??= '', FILTER_SANITIZE_EMAIL);
        $telefono = filter_var($_POST['telefono'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $poblacion = filter_var($_POST['poblacion'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $dni = filter_var($_POST['dni'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $fechaNac = filter_var($_POST['fechaNac'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $id_curso = filter_var($_POST['id_curso'] ??= '', FILTER_SANITIZE_NUMBER_INT);

        # Cargamos los datos
        $alumno = new classAlumno(
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

        # --------------------------------------------------------------------
        # Validación
        $errores = [];

        # Nombre valor obligatorio
        if (empty($nombre)) {
            $errores['nombre'] = 'El campo es obligatorio';
        }

        # Apellidos valor obligatorio
        if (empty($apellidos)) {
            $errores['apellidos'] = 'El campo es obligatorio';
        }

        # Validación Email
        if (empty($email)) {
            $errores['email'] = 'El campo es obligatorio';
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errores['email'] = 'El formato no válido';
        } else if (!$this->model->validarEmail($email)) {
            $errores['email'] = 'El email ya ha sido registrado';
        }

        $options = [
            'options' => [ # ESTOS PARÁMETROS DEBEN LLAMARSE ASÍ
                'regexp' => '/^(\d{8})([a-zA-Z])$/'
            ]
        ];

        #Validación dni
        if (empty($dni)) {
            $errores['dni'] = 'El campo es obligatorio';
        } else if (!filter_var($dni, FILTER_VALIDATE_REGEXP, $options)) {
            $errores['dni'] = 'El formato del dni no es válido';
        } else if (!$this->model->validarDniUnico($dni)) {
            $errores['dni'] = 'El dni ya ha sido registrado';
        }

        # Validación id_curso
        if (empty($id_curso)) {
            $errores['id_curso'] = 'Debe seleccionar un curso';
        } else if (!filter_var($id_curso, FILTER_VALIDATE_INT)) {
            $errores['id_curso'] = 'Curso no válido';
        } else if (!$this->model->validarCurso($id_curso)) {
            $errores['id_curso'] = 'Curso no existe';
        }

        # Comprobamos validacion
        if (!empty($errores)) {
            $_SESSION['alumno'] = serialize($alumno); # serializamos para tornar el objeto a string
            $_SESSION['error'] = 'Formulario no validado';
            $_SESSION['errores'] = $errores;

            header('location:' . URL . 'alumno/new');
        } else {
            $this->model->create($alumno);

            $_SESSION['mensaje'] = "Alumno creado correctamente";

            header('location:' . URL . 'alumno');
        }
        #------------------------------------------------------------------------

    }

    function edit($param = [])
    {
        session_start();

        $id = $param[0];

        $this->view->id = $id;


        $this->view->title = "Editar - Alumnos";


        $this->view->alumno = $this->model->read($id);


        $this->view->cursos = $this->model->getCursos();

        if (isset($_SESSION['error'])) {
            #Mensaje de error 
            $this->view->error = ($_SESSION['error']);

            #Autorrellenar formulario con los detalles del alumno
            $this->view->alumno = unserialize($_SESSION['alumno']);

            #Recupero
            $this->view->errores = $_SESSION['errores'];

            # Borramos datos de la variables a posterior de su uso
            unset($_SESSION['error']);
            unset($_SESSION['errores']);
            unset($_SESSION['alumnos']);
        }


        $this->view->render('alumno/edit/index');
    }

    public function update($param = [])
    {
        session_start();

        #1. Saneamos los datos del formulario 
        $nombre = filter_var($_POST['nombre'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $apellidos = filter_var($_POST['apellidos'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_var($_POST['email'] ??= '', FILTER_SANITIZE_EMAIL);
        $telefono = filter_var($_POST['telefono'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $poblacion = filter_var($_POST['poblacion'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $dni = filter_var($_POST['dni'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $fechaNac = filter_var($_POST['fechaNac'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $id_curso = filter_var($_POST['id_curso'] ??= '', FILTER_SANITIZE_NUMBER_INT);

        #2. Creamos el objeto alumno a partir de los datos saneados
        $alumno = new classAlumno(
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

        #Cargamos el id 
        $id = $param[0];

        #Obtengo los datos del alumno original
        $alumnoOriginal = $this->model->read($id);

        ## ---------------------------------------------------------- ##
        #3. Validación (Sólo si fuese necesario)
        $errores = [];

        # Validar Nombre
        if (strcmp($alumno->nombre, !$alumnoOriginal->nombre) !== 0) {
            if (empty($nombre)) {
                $errores['nombre'] = 'El campo nombre es obligatorio';
            }
        }

        # Validar Apellido
        if (strcmp($alumno->apellidos, !$alumnoOriginal->apellidos) !== 0) {
            if (empty($apellidos)) {
                $errores['apellidos'] = 'El campo apellidos es obligatorio';
            }
        }

        # Validación Email
        if (strcmp($alumno->email, !$alumnoOriginal->email) !== 0) {
            if (empty($email)) {
                $errores['email'] = 'El campo es obligatorio';
            } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errores['email'] = 'El formato no válido';
            } else if (!$this->model->validarEmail($email)) {
                $errores['email'] = 'El email ya ha sido registrado';
            }
        }

        # -----------------------------------------------------------
        #Validación dni
        $options = [
            'options' => [ # ESTOS PARÁMETROS DEBEN LLAMARSE ASÍ
                'regexp' => '/^(\d{8})([a-zA-Z])$/'
            ]
        ];

        if (strcmp($alumno->dni, !$alumnoOriginal->dni) !== 0) {
            if (empty($dni)) {
                $errores['dni'] = 'El campo es obligatorio';
            } else if (!filter_var($dni, FILTER_VALIDATE_REGEXP, $options)) {
                $errores['dni'] = 'El formato del dni no es válido';
            } else if (!$this->model->validarDniUnico($dni)) {
                $errores['dni'] = 'El dni ya ha sido registrado';
            }
        }
        # ------------------------------------------------------------

        # Validación id_curso
        if (strcmp($alumno->id_curso, !$alumnoOriginal->id_curso) !== 0) {
            if (empty($id_curso)) {
                $errores['id_curso'] = 'Debe seleccionar un curso';
            } else if (!filter_var($id_curso, FILTER_VALIDATE_INT)) {
                $errores['id_curso'] = 'Curso no válido';
            } else if (!$this->model->validarCurso($id_curso)) {
                $errores['id_curso'] = 'Curso no existe';
            }
        }

        #4. Comprobar validación
        if (!empty($errores)) {
            $_SESSION['alumno'] = serialize($alumno);
            $_SESSION['error'] = 'Formulario no validado';
            $_SESSION['errores'] = $errores;

            header('location:' . URL . 'alumno/edit/' . $id);
        } else {
            $this->model->update($alumno, $id);

            $_SESSION['mensaje'] = "Alumno actualizado correctamente";

            header('location:' . URL . 'alumno');
        }
    }

    public function order($param = [])
    {
        # Criterio de ordenación
        $criterio = $param[0];

        $this->view->title = "Ordenar - Alumnos";

        $this->view->alumnos = $this->model->order($criterio);

        $this->view->render('alumno/main/index');
    }

    public function filter($param = [])
    {

        # Expresión para buscar
        $expresion = $_GET['expresion'];

        $this->view->title = "Buscar - Alumnos";

        $this->view->alumnos = $this->model->filter($expresion);

        $this->view->render('alumno/main/index');
    }
}

?>