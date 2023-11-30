<?php 

    /*

        Modelo mostrar index

    */

    # creamos objeto de la clase  curso
    $conexion = new Alumnos();

    $indice = $_GET['id'];

    $alumno = $conexion->getAlumno($indice);

?>