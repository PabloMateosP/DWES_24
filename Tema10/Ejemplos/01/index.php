<?php 

// cabecera
$header = "Mime-Versión: 1.0" . "\n";
$header .= "Content-type: text/html; charset=iso-8859" . "\n";
$header .= "From: Pablo Mateos Palas <pmatpal0105@g.educaand.es>\n";
$header .= "X-Mailer: PHP/" . phpversion();

// parámetros
$destino = "****************";
$asunto = "Mensaje prueba mail()";
$mensaje = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis assumenda provident blanditiis amet maxime incidunt vero ex atque ducimus molestiae odio delectus iusto nam, voluptatum enim omnis facere laboriosam dignissimos!";

// envío 
if (mail($destino, $asunto, $mensaje, $header)) {
    echo "Mensaje enviado";
} else {
    echo "Error al enviar el mensaje";
}
