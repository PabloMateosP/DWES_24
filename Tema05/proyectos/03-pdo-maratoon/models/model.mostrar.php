<?php 

    /*

        Modelo mostrar index

    */

    $conexion = new Corredores();

    $indice = $_GET['id'];

    $categorias = $conexion->getCategorias();
    $clubs = $conexion->getClubs();

    $categoria = $conexion->getCategoria($indice);
    $club = $conexion->getClub($indice);
    $corredor = $conexion->getCorredor($indice);

?>