<?php

/*

    Modelo: model.index.php
    Descripcion: genera en array de objetos

*/

setlocale(LC_MONETARY, "es_ES");
#Caonecto con la BD
$db = new Fp();

#Objeto result con los detalles del alumno
$alumnos = $db->getAlumnos();

?>