<?php

/**
 * Página pora cerrar sesión 
 */

session_start(); 

$_SESSION['fecha_hora_fin'] = date("d-m-Y H:i:s");

$fecha_fin = new DateTime($_SESSION['fecha_hora_fin']);
$fecha_visita = new DateTime($_SESSION['fecha_hora_visita']);

# Formateamos fecha 
$_SESSION['duracion_sesion'] = date_diff($fecha_fin, $fecha_visita)->format("%y años, %m meses, %d días, %H horas, %i minutos, %s segundos");

$_SESSION['num_visitas_home'] = isset($_SESSION['num_visitas_home']) ? $_SESSION['num_visitas_home'] : 0;
$_SESSION['num_visitas_about'] = isset($_SESSION['num_visitas_about']) ? $_SESSION['num_visitas_about'] : 0;
$_SESSION['num_visitas_services'] = isset($_SESSION['num_visitas_services']) ? $_SESSION['num_visitas_services'] : 0;
$_SESSION['num_visitas_events'] = isset($_SESSION['num_visitas_events']) ? $_SESSION['num_visitas_events'] : 0;


# Total de visitas del sitio web
$_SESSION['total_visitas'] =
    $_SESSION['num_visitas_home']
    +
    $_SESSION['num_visitas_about']
    +
    $_SESSION['num_visitas_services']
    +
    $_SESSION['num_visitas_events'];

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 7.1 - Close</title>
</head>

<body>
    <ul>
    <br>
        <h2>Página: Close</h2>
        <li>SID de la sesión:
            <?= session_id(); ?>
        </li>
        <li>Nombre de la Sesión:
            <?= session_name(); ?>
        </li>
        <li>Contador Visitas: 
            <?= $_SESSION['total_visitas']; ?>
        </li>
        <li>Fecha y hora inicio sesion:
            <?= $_SESSION['fecha_hora_visita']; ?>
        </li>
        <li>Fecha y hora fin sesion:
            <?= $_SESSION['fecha_hora_fin']; ?>
        </li>
        <li>Duración sesión:
            <?= $_SESSION['duracion_sesion']; ?>
        </li>
    </ul>
</body>

</html>

<?php
# Eliminamos la sesión 
session_unset();
session_destroy();

?>