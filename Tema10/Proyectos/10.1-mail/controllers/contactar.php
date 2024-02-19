<?php

class contactar extends Controller
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
                include('views/formulario_contacto.php');
            } else {
                // Enviar correo electrónico
                $this->enviarCorreo($_POST);

                // Mostrar mensaje de éxito
                include('views/mensaje_enviado.php');
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

    private function enviarCorreo($datos)
    {
        // Configurar el envío de correo usando SMTP (debes proporcionar tus propios detalles)
        $smtpHost = 'smtp.gmail.com';
        $smtpUsername = 'tucorreo@gmail.com'; // Coloca tu cuenta de correo personal
        $smtpPassword = 'tucontrasena';
        $smtpPort = 587;

        // Destinatario del correo (correo de la empresa)
        $destinatario = 'correodeempresa@example.com';

        // Configurar el mensaje
        $mensaje = "Nombre: {$datos['nombre']}\n";
        $mensaje .= "Email: {$datos['email']}\n";
        $mensaje .= "Asunto: {$datos['asunto']}\n";
        $mensaje .= "Mensaje: {$datos['mensaje']}";

        // Configurar la cabecera del correo
        $cabeceras = "From: {$datos['email']}";

        // Enviar el correo
        mail($destinatario, $datos['asunto'], $mensaje, $cabeceras);
    }
}
