<?php

    //Tipos de variables

    # tipo boolean
    $test = false;
    echo "\$test: ";
    var_dump($test);

    # tipo int
    $edad = 50;
    echo "\$edad: ";
    var_dump($edad);

    echo "<BR>";

    # tipo float
    $altura = 1.70;
    echo "\$altura: ";
    var_dump($altura);

    echo "<BR>";

    # tipo float exponencial
    $distancia = 1.70e4;
    echo "\$distancia: ";
    var_dump($distancia);

    echo "<BR>";

    # tipo string
    $mensaje = 'La distancia recorrida fue de $distancia km';
    echo "\$mensaje: ";
    var_dump($mensaje);

    #tipo string 
    $mensaje2 = 'La distancia recorrida fue de '.$distancia.' km';
    echo "\$mensaje: ";
    var_dump($mensaje2);

?>