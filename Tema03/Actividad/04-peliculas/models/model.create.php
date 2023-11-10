<?php

/*

    model.create.PHP

    - Añade un elemento a la tabla 

*/

$peliculas = getPeliculas();
$paises = getPaises();
$listGeneros = getGeneros();


$id = sizeof($peliculas) + 1; // Generación automatica de id
$titulo = $_POST['titulo'];
$pais = $_POST['pais'];
$director = $_POST['director'];
$generosPel = $_POST['generos'];
$ano = $_POST['año'];


//  Creamos una pelicula
$peliculaNueva = [
    'id' => $id,
    'titulo' => $titulo,
    'pais' => $pais,
    'director' => $director,
    'generos' => $generosPel,
    'año' => $ano
];

$peliculas[] = $peliculaNueva;

?>