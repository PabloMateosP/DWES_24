<?php 

/**
 * mostrar.php
 * 
 * Ejemplo Mostrar cookie
 */

# Accedemos a la información de la cookie 
if (isset($_COOKIE['Nombre'])){
    echo $_COOKIE['Nombre'];
    echo '<br>';
} if (isset($_COOKIE['Apellidos'])) {
    echo $_COOKIE['Apellidos'];
    echo '<br>';
} else {
    echo 'No existe ninguna cookie que mostrar ';
}


?>