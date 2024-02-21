<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

class Perfil extends Controller
{

    # Muestra los detalles del perfil antes de eliminar
    public function render()
    {

        # Iniciamos o continuamos con la sesión
        session_start();

        # Capa autentificación
        if (!isset($_SESSION['id'])) {

            header("location:" . URL . "login");
        }

        # Capa mensaje
        if (isset($_SESSION['mensaje'])) {
            $this->view->mensaje = $_SESSION['mensaje'];
            unset($_SESSION['mensaje']);
        }

        # Obtenemos objeto con los detalles del usuario
        $this->view->user = $this->model->getUserId($_SESSION['id']);
        $this->view->title = 'Perfil Usuario - Gesbank - MVC';

        $this->view->render('perfil/main/index');

    }

    # Editar los detalles name y email de usuario
    public function edit()
    {

        # Iniciamos o continuamos sesión
        session_start();

        # Capa de autentificación
        if (!isset($_SESSION['id'])) {

            header('location:' . URL . 'login');

        }

        # Comprobamos si existe mensaje
        if (isset($_SESSION['mensaje'])) {

            $this->view->mensaje = $_SESSION['mensaje'];
            unset($_SESSION['mensaje']);

        }

        # Obtenemos objeto User con los detalles del usuario
        $this->view->user = $this->model->getUserId($_SESSION['id']);

        # Capa no validación formulario
        if (isset($_SESSION['error'])) {

            # Mensaje de error
            $this->view->error = $_SESSION['error'];
            unset($_SESSION['error']);

            # Variables de autorrelleno
            $this->view->user = unserialize($_SESSION['user']);
            unset($_SESSION['user']);

            # Tipo de error
            $this->view->errores = $_SESSION['errores'];
            unset($_SESSION['errores']);

        }



        $this->view->title = 'Modificar Perfil Usuario - Gesbank';
        $this->view->render('perfil/edit/index');


    }

    # Valida el formulario de modificación de perfil
    public function valperfil()
    {

        # Iniciamos o continuamos con la sesión
        session_start();

        # Capa autentificación
        if (!isset($_SESSION['id'])) {

            header("location:" . URL . "login");
        }

        # Saneamos el formulario
        $name = filter_var($_POST['name'] ??= null, FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_var($_POST['email'] ??= null, FILTER_SANITIZE_EMAIL);

        # Obtenemos objeto con los detalles del usuario
        $user = $this->model->getUserId($_SESSION['id']);

        # Validaciones
        $errores = [];

        // name
        if (strcmp($user->name, $name) !== 0) {
            if (empty($name)) {
                $errores['name'] = "Nombre de usuario es obligatorio";
            } else if ((strlen($name) < 5) || (strlen($name) > 50)) {
                $errores['name'] = "Nombre de usuario ha de tener entre 5 y 50 caracteres";
            } else if (!$this->model->validarName($name)) {
                $errores['name'] = "Nombre de usuario ya ha sido registrado";
            }
        }

        // email
        if (strcmp($user->email, $email) !== 0) {
            if (empty($email)) {
                $errores['email'] = "Email es un campo obligatorio";
            } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errores['email'] = "Email no válido";
            } elseif (!$this->model->validarEmail($email)) {
                $errores['email'] = "Email ya ha sido registrado";
            }
        }

        # Crear objeto user
        $user = new classUser(
            $user->id,
            $name,
            $email,
            null
        );


        # Comprobamos si hay errores
        if (!empty($errores)) {
            $_SESSION['errores'] = $errores;
            $_SESSION['user'] = serialize($user);
            $_SESSION['error'] = "Formulario con errores de validación";

            header('location:' . URL . 'perfil/edit');

        } else {

            # Actualizamos perfil
            $this->model->update($user);

            // Código para enviar el correo de registro ---------------------------------------------
            // Creamos un objeto de la clase PHPMailer
            $mail = new PHPMailer(true);

            // Configuración de PHPMailer
            $mail->CharSet = "UTF-8";
            $mail->Encoding = "quoted-printable";
            $mail->Username = 'partypat1301@gmail.com';
            $mail->Password = 'mlsb jdfk vyti bimd';

            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // tls Habilita el cifrado TLS implícito
            $mail->Port = 587;

            $destinatario = $email;
            $remitente = 'partypat1301@gmail.com';
            $asunto = "Perfil editado correctamente";
            $mensaje = "
            <h1>Hola!! $name</h1>
            <p>Usuario registrado con éxito</p>
            <p>Datos: </p>
            <ul>
                <li><b>Nombre: </b>" . $name . "</li>
                <li><b>Correo Electrónico: </b>" . $email . "</li>
            </ul>";

            // Configuración del correo con PHPMailer
            $mail->setFrom($remitente, 'Paco');
            $mail->addAddress($destinatario, $name);
            $mail->addReplyTo($remitente, 'Paco Fiestas');

            // Configuración del contenido del correo
            $mail->isHTML(true);
            $mail->Subject = $asunto;
            $mail->Body = $mensaje;

            // Esta línea la he tenido que añadir para mi pc en casa porque me daba fallo el certificado SSL
            $mail->SMTPOptions = array('ssl' => array('verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true));
            $mail->send();

            // -------------------------------------------------------------------------------

            $_SESSION['name_user'] = $name;
            $_SESSION['mensaje'] = 'Usuario modificado correctamente';

            header('location:' . URL . 'perfil');

        }

    }

    # Modificación del password
    public function pass()
    {

        # Iniciamos o continuamos sesión
        session_start();

        # Capa de autentificación
        if (!isset($_SESSION['id'])) {

            header('location:' . URL . 'login');

        }

        # Comprobamos si existe mensaje
        if (isset($_SESSION['mensaje'])) {

            $this->view->mensaje = $_SESSION['mensaje'];
            unset($_SESSION['mensaje']);

        }

        # Capa no validación formulario
        if (isset($_SESSION['error'])) {

            # Mensaje de error
            $this->view->error = $_SESSION['error'];
            unset($_SESSION['error']);

            # Tipo de error
            $this->view->errores = $_SESSION['errores'];
            unset($_SESSION['errores']);

        }

        # título página
        $this->view->title = "Modificar password";
        $this->view->render('perfil/pass/index');


    }

    # Validación cambio password
    public function valpass()
    {

        # Iniciamos o continuamos con la sesión
        session_start();

        # Capa autentificación
        if (!isset($_SESSION['id'])) {

            header("location:" . URL . "login");
        }

        # Saneamos el formulario
        $password_actual = filter_var($_POST['password_actual'] ??= null, FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_var($_POST['password'] ??= null, FILTER_SANITIZE_SPECIAL_CHARS);
        $password_confirm = filter_var($_POST['password_confirm'] ??= null, FILTER_SANITIZE_SPECIAL_CHARS);

        # Obtenemos objeto con los detalles del usuario
        $user = $this->model->getUserId($_SESSION['id']);

        # Validaciones

        $errores = array();

        # Validar password actual
        if (!password_verify($password_actual, $user->password)) {
            $errores['password_actual'] = "Password actual no es correcto";
        }

        # Validar nuevo password
        if (empty($password)) {
            $errores['password'] = "Password no introducido";
        } else if (strcmp($password, $password_confirm) !== 0) {
            $errores['password'] = "Password no coincidentes";
        } else if ((strlen($password) < 5) || (strlen($password) > 60)) {
            $errores['password'] = "Password ha de tener entre 5 y 60 caracteres";
        }


        if (!empty($errores)) {

            $_SESSION['errores'] = $errores;
            $_SESSION['error'] = "Formulario con errores de validación";

            header("location:" . URL . "perfil/pass");

        } else {

            # Crear objeto user
            $user = new classUser(
                $user->id,
                null,
                null,
                $password
            );

            # Actualiza password
            $this->model->updatePass($user);


            // Código para enviar el correo de registro ---------------------------------------------
            // Creamos un objeto de la clase PHPMailer
            $mail = new PHPMailer(true);

            // Configuración de PHPMailer
            $mail->CharSet = "UTF-8";
            $mail->Encoding = "quoted-printable";
            $mail->Username = 'partypat1301@gmail.com';
            $mail->Password = 'mlsb jdfk vyti bimd';

            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // tls Habilita el cifrado TLS implícito
            $mail->Port = 587;

            $destinatario = $user->email;
            $remitente = 'partypat1301@gmail.com';
            $asunto = "Contraseña Modificada";
            $mensaje = "
            <h1>Hola!! $user->name</h1>
            <p>Contraseña Modificada con éxito</p>
            <p>Datos: </p>
            <ul>
                <li><b>Password Modificada: </b>" . $user->password . "</li>
            </ul>";

            // Configuración del correo con PHPMailer
            $mail->setFrom($remitente, 'Paco');
            $mail->addAddress($destinatario, $user->name);
            $mail->addReplyTo($remitente, 'Paco Fiestas');

            // Configuración del contenido del correo
            $mail->isHTML(true);
            $mail->Subject = $asunto;
            $mail->Body = $mensaje;

            // Esta línea la he tenido que añadir para mi pc en casa porque me daba fallo el certificado SSL
            $mail->SMTPOptions = array('ssl' => array('verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true));
            $mail->send();

            // -------------------------------------------------------------------------------

            $_SESSION['mensaje'] = "Password modificado correctamente";

            #Vuelve corredores
            header("location:" . URL . "clientes");
        }



    }

    # Elimina definitivamente el perfil
    public function delete()
    {

        # Iniciamos o continuamos con la sesión
        session_start();

        # Capa autentificación
        if (!isset($_SESSION['id'])) {

            header("location:" . URL . "login");

        } else {

            # Elimino perfil de usuario
            $this->model->delete($_SESSION['id']);

            # Destruyo la sesión
            session_destroy();

            # Salgo de la aplicación
            header('location:' . URL . 'index');
        }

    }



}

?>