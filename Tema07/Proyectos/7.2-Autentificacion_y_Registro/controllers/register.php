<?php

class Register extends Controller
{

    public function render()
    {

        session_start();


        if (isset($_SESSION['mensaje'])) {

            $this->view->mensaje = $_SESSION['mensaje'];
            unset($_SESSION['mensaje']);

        }

        $this->view->name = null;
        $this->view->email = null;
        $this->view->password = null;

        if (isset($_SESSION['error'])) {

            $this->view->error = $_SESSION['error'];
            unset($_SESSION['error']);

            $this->view->name = $_SESSION['name'];
            $this->view->email = $_SESSION['email'];
            $this->view->password = $_SESSION['password'];
            unset($_SESSION['name']);
            unset($_SESSION['email']);
            unset($_SESSION['password']);

            $this->view->errores = $_SESSION['errores'];
            unset($_SESSION['errores']);

        }

        $this->view->render('register/index');
    }


    public function validate()
    {

        session_start();

        # Saneamos
        $name = filter_var($_POST['name'], FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $password = filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS);
        $password_confirm = filter_var($_POST['password-confirm'], FILTER_SANITIZE_SPECIAL_CHARS);

        # Validamos
        $errores = array();

        # nombre
        if (empty($name)) {
            $errores['name'] = "Campo obligatorio";
        } else if (!$this->model->validateName($name)) {
            $errores['name'] = "Nombre de usuario no permitido";
        }

        # email
        if (empty($email)) {
            $errores['email'] = "Campo Obligatorio";
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errores['email'] = "Email: Email no válido";
        } elseif (!$this->model->validateEmailUnique($email)) {
            $errores['email'] = "Email existente, ya está registrado";
        }

        # contraseña
        if (empty($password)) {
            $errores['password'] = "No se ha introducido password";
        } else if (strcmp($password, $password_confirm) !== 0) {
            $errores['password'] = "Password no coincidentes";
        } elseif (!$this->model->validatePass($password)) {
            $errores['password'] = "Password: No permitido";
        }

        if (!empty($errores)) {

            $_SESSION['errores'] = $errores;
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            $_SESSION['error'] = "Fallo en la validación del formulario";

            header("location:" . URL . "register");

        } else {

            # Creamos usuario en caso de no haber errores 
            $this->model->create($name, $email, $password);

            $_SESSION['notify'] = "Usuario registrado correctamente";
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;

            header("location:" . URL . "login");
        }
    }
}

?>