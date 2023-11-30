<?php 

    /*

        Modelo mostrar index

    */

    # creamos objeto de la clase  curso
    $conexion = new Alumnos();

    $indice = $_GET['id'];

    // Hay que sacar el id del curso 
    $curso = $conexion->getCurso($indice);
    $alumno = $conexion->getAlumno($indice);

?>