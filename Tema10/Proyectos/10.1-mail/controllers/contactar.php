<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

class Contactar extends Controller
{
    # Método principal. Muestra todos los clientes
    public function render($param = [])
    {
        #inicio o continuo sesion
        session_start();

        #comprobar si existe mensaje
        if (isset($_SESSION['mensaje'])) {
            $this->view->mensaje = $_SESSION['mensaje'];
            unset($_SESSION['mensaje']);
        }

        $this->view->title = "Contactar";
        $this->view->render("contactar/index");
    }

    public function validar()
    {
        // Verificar que se haya enviado el formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validar campos obligatorios
            $errores = $this->validarFormulario($_POST);

            if (!empty($errores)) {
                // Mostrar errores y volver al formulario
                $this->view->errores = $errores;
                $this->view->render("contactar/index"); // Ajusta el nombre del archivo según la estructura de tus vistas
            } else {
                // Enviar correo electrónico
                $this->enviarCorreo($_POST);

                // Mostrar mensaje de éxito
                $this->view->mensaje = '¡Correo enviado con éxito!';
                $this->view->render("contactar/index"); // Ajusta el nombre del archivo según la estructura de tus vistas
            }
        } else {
            // Redirigir a la página de inicio si se accede directamente a este método
            header('Location: index.php');
        }
    }

    private function validarFormulario($datos)
    {
        // Validar campos obligatorios
        $errores = [];

        if (empty($datos['nombre'])) {
            $errores['nombre'] = 'El campo Nombre es obligatorio.';
        }

        if (empty($datos['email']) || !filter_var($datos['email'], FILTER_VALIDATE_EMAIL)) {
            $errores['email'] = 'El campo Email es obligatorio y debe ser un correo electrónico válido.';
        }

        if (empty($datos['asunto'])) {
            $errores['asunto'] = 'El campo Asunto es obligatorio.';
        }

        if (empty($datos['mensaje'])) {
            $errores['mensaje'] = 'El campo Mensaje es obligatorio.';
        }

        return $errores;
    }

    // private function enviarCorreo($datos)
    // {
    //     session_start();

    //     ini_set('SMTP', 'smtp.gmail.com');
    //     ini_set('smtp_port', 587);

    //     $smtpUsername = 'partypat1301@gmail.com'; 
    //     $smtpPassword = 'mlsb jdfk vyti bimd';

    //     $destinatario = "{$datos['email']}";

    //     $message = "Nombre: {$datos['nombre']}\n";
    //     $asunto = "Asunto: {$datos['asunto']}\n";
    //     $message .= "Mensaje: {$datos['mensaje']}";

    //     $cabeceras = "From: {$datos['email']}";

    //     // Enviar el correo
    //     if (mail($destinatario, $asunto, $message)) {
    //         $_SESSION['mensaje'] = "Mensaje enviado";
    //     } else {
    //         $_SESSION['error'] = "Error de envío";
    //     }
    //     ;
    // }

    private function enviarCorreo($datos)
    {
        session_start();

        

        // Incluimos las clases de PHPMailer
        // require 'PHPMailer/src/Exception.php';
        // require 'PHPMailer/src/PHPMailer.php';
        // require 'PHPMailer/src/SMTP.php';

        // Creamos un objeto de la clase PHPMailer
        $mail = new PHPMailer(true);

        // Configuración de PHPMailer
        $mail->CharSet = "UTF-8";
        $mail->Encoding = "quoted-printable";
        $mail->Username = 'partypat1301@gmail.com';
        $mail->Password = 'mlsb jdfk vyti bimd';

        // Configuración del servidor SMTP de Gmail
        $mail->SMTPDebug = 2;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // tls Habilita el cifrado TLS implícito
        $mail->Port = 587;


        $destinatario = "{$datos['email']}";
        $remitente = 'partypat1301@gmail.com';
        $asunto = "{$datos['asunto']}";
        $mensaje = "
        <h1>Hola!! {$datos['nombre']}</h1>
        <p>{$datos['mensaje']}</p>
        ";

        // Configuración del correo con PHPMailer
        $mail->setFrom($remitente, 'Paco');
        $mail->addAddress($destinatario, "{$datos['nombre']}");
        $mail->addReplyTo($remitente, 'Paco Fiestas');

        // Configuración del contenido del correo
        $mail->isHTML(true);
        $mail->Subject = $asunto;
        $mail->Body = $mensaje;

        try {
            // Enviamos el correo
            $mail->send();
            $_SESSION['mensaje'] = "Mensaje enviado";
        } catch (Exception $e) {
            $_SESSION['error'] = "Error de envío: {$mail->ErrorInfo}";
        }
    }

}