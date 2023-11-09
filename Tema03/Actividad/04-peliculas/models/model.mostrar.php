<?php

/*

    Modelo: model.mostrar.PHP

    - Carga los datos
    - Recibo por GET indice de la película que se desea mostrar

*/

// Cargamos array películas 
$peliculas = getPeliculas();

// Cargamos array países 
$paises = getPaises();

// Cargamos array géneros 
$listGeneros = getGeneros();

$idPelicula = $_GET['id'];

$indicePelBuscada = idPelicula($peliculas,'id',$idPelicula);
if ($indicePelBuscada !== false) {
    $pelicula = $peliculas[$indicePelBuscada];
}


?>