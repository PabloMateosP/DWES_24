<?php 

/**
 * Eliminar.php
 */

# Eliminamos cookie nombre
setcookie("Nombre", '',  time() -3600);

# Eliminamos cookie apellidos
setcookie("Apellidos", '', time() -3600);

echo 'Cookies eliminadas con exito';

?>