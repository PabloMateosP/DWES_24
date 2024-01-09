<?php 

    /**
     * 
     * Contador de visitas
     * 
     */

    # Compronar si existe la cookie contador
    if (isset($_COOKIE['contador'])) {

        # Actualizamos con el número de visitas 
        $numero_visit = $_COOKIE['contador'];
        $numero_visit ++ ;

        # Creamos la cookie para un año 
        setcookie('contador', $numero_visit, time() + 31536000);

    } else {
        # Si no existe creamos una con valor inicial 1 y duración por 1 año 
        $nombre_cookie = 'contador';

        $numero_visit = 1;

        $expiracion = time() + 31536000;

        setcookie($nombre_cookie, $numero_visit, $expiracion);

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo 7 Cookies</title>
</head>
<body>
    <h1>Número visitas: <?=$numero_visit ?></h1>
    <ul>
        <li>
            <a href="crear.php">Crear</a>
        </li>
        <li>
            <a href="eliminar.php">Eliminar</a>
        </li>
        <li>
            <a href="mostrar.php">Mostrar</a>
        </li>
    </ul>
</body>
</html>