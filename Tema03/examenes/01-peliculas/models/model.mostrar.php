<?php

/*

    Modelo: model.mostrar.PHP

    - Carga los datos
    - Recibo por GET indice de la película que se desea mostrar

*/

// Cargamos array países 
$paises = getPaises();

// Cargamos array géneros 
$listGeneros = getGeneros();

// Cargamos array películas 
$peliculas = getPeliculas();

$peliculaMuestra = [
    'id' => $_GET['id'],
    'tiulo' => $_GET['titulo'],
    'pais' => $_GET['pais'],
    'director' => $_GET['director'],
    'generos' => $_GET['generos'],
    'año' => $_GET['año']
];




?>