<?php

/**
 * Página home
 */

session_start(); 



if (isset($_SESSION['num_visitas_home'])) {
    $_SESSION['num_visitas_home']++; 
} else {
    $_SESSION['num_visitas_home'] = 1; 
}


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 7.1 - Home</title>
</head>

<body>

    <ul>
        <li>
            <a href="home.php">Home</a>
        </li>
        <li>
            <a href="about.php">About</a>
        </li>
        <li>
            <a href="services.php">Services</a>
        </li>
        <li>
            <a href="events.php">Events</a>
        </li>
        <li>
            <a href="close.php">Close</a>
        </li>
    </ul>

    <ul>
    <br>
        <h2>Página: Home</h2>
        <li>SID de la sesión:
            <?= session_id(); ?>
        </li>
        <li>Nombre de la sesión:
            <?= session_name(); ?>
        </li>
        <li>Fecha y hora inicio sesión:
            <?= $_SESSION['fecha_hora_visita']; ?>
        </li>
        <li>Visitas Home.
            <?= $_SESSION['num_visitas_home']; ?>
        </li>
    </ul>

</body>

</html>