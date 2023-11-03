<?php

/*

    model.create.PHP

    - Añade un elemento a la tabla 

*/

$nuevaPelicula = [
    'id' => sizeof($peliculas) + 1,
    'tiulo' => $_POST['titulo'],
    'pais' => $_POST['pais'],
    'director' => $_POST['director'],
    'generos' => $_POST['generos'],
    'año' => $_POST['año']
];

$peliculas[] = $nuevaPelicula;

?>