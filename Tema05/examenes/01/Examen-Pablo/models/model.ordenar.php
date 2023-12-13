<?php

   /*  
        model.ordenar.php

    */

    // Capturamos el criterio de ordenación a través del método GET
    $criterio = $_GET['criterio'];

    // Creamos la conexion
    $conexion = new Libros();

    // Ejecutamos el método order, y lo inicializamos en una variable
    $libros = $conexion->ordenar($criterio);
    
?>