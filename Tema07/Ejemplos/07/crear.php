<?php 

    /**
     * crear.php
     * 
     * ejemplo creación cookie
     */

    # Nombre cookie 
    $nombre_cookie_1 = "Nombre";
    $nombre_cookie_2 = "Apellidos";

    # Variable que almacena nuestro nombre
    $nombre = "Pablo";
    $apellidos = "Mateos Palas";

    # Cookie que expire a los 60 minutos
    $expiracion = time()+ 60 * 60;
    
    if  (setcookie($nombre_cookie_1, $nombre, $expiracion)) {
        echo 'Cookie para nombre creada correctamente';
        echo '<br>';
    } if (setcookie($nombre_cookie_2, $apellidos, $expiracion)) {
        echo 'Cookie para apellidos  creada correctamente';
    } else {
        echo 'Error en la creación de la cookie';
    }

    
    
?>