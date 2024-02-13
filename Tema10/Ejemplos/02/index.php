<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

// Configuración caractéres
$mail->CharSet = "UTF-8";
$mail->Encoding = "quoted-printable";

try {
    
    $mail->Username = 'pmatpal0105@g.educaand.es';
    // Para tener la contraseña hay que activar el smtp de GMAIL.
    $mail->Password = '';

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'Here is the subject';
    $mail->Body = '<h1>This is the HTML message body</h>';

} catch (phpmailerexception $e) {
    echo $e->errormessage();
}