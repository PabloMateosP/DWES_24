<?php

class Login extends Controller
{


    public function render()
    {

        session_start();

        # Inicializamos valores del formulario
        $this->view->email = null;
        $this->view->password = null;

        if (isset($_SESSION['notify'])) {

            $this->view->mensaje = $_SESSION['notify'];
            unset($_SESSION['notify']);

            # Autorellenamos los datos en caso de registro fallido
            if (isset($_SESSION['email'])) {
                $this->view->email = $_SESSION['email'];
                unset($_SESSION['email']);
            }

            if (isset($_SESSION['password'])) {
                $this->view->password = $_SESSION['password'];
                unset($_SESSION['password']);
            }

        }

        # Control de errores
        if (isset($_SESSION['error'])) {

            $this->view->error = $_SESSION['error'];
            unset($_SESSION['error']);

            # Autocompletamos los valores del formulario
            $this->view->email = $_SESSION['email'];
            $this->view->password = $_SESSION['password'];
            unset($_SESSION['email']);
            unset($_SESSION['password']);

            $this->view->errores = $_SESSION['errores'];
            unset($_SESSION['errores']);

        }

        $this->view->render('login/index');
    }

    # Validamos el login 
    public function validate()
    {

        session_start();

        # Saneamos datos 
        $email = filter_var($_POST['email'] ??= '', FILTER_SANITIZE_EMAIL);
        $password = filter_var($_POST['password'] ??= '', FILTER_SANITIZE_STRING);

        # Validamos
        $errores = array();

        #obtengo el usuario a partir del email
        $user = $this->model->getUserEmail($email);

        # Si no hay usuarios o si la contraseña es incorrecta,
        # redirigimos al index con mensaje de error.
        if ($user === false) {

            $errores['email'] = "Email no ha sido registrado";
            $_SESSION['errores'] = $errores;

            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;

            $_SESSION['error'] = "Fallo en la Autentificación";

            header("location:" . URL . "login");

        } else if (!password_verify($password, $user->password)) {

            $errores['password'] = "Password no es correcto";
            $_SESSION['errores'] = $errores;

            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;

            $_SESSION['error'] = "Fallo en la Autentificación";

            header("location:" . URL . "login");

        } else {

            # Autentificación completada
            $_SESSION['id'] = $user->id;
            $_SESSION['name_user'] = $user->name;
            $_SESSION['id_rol'] = $this->model->getUserIdPerfil($user->id);
            $_SESSION['name_rol'] = $this->model->getUserPerfil($_SESSION['id_rol']);

            $_SESSION['mensaje'] = "Usuario " . $user->name . " ha iniciado sesión";

            header("location:" . URL . "alumno");
        }


    }
}

?>