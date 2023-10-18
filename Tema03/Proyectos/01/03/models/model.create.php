<?php

/*
    Recogemos los datos del nuevo libro y llamamos a la función nuevoLibro().
*/

$libro =
    [
        'id' => $_POST['idL'],
        'titulo' => $_POST['tituloL'],
        'autor' => $_POST['autorL'],
        'genero' => $_POST['generoL'],
        'precio' => $_POST['precioL']
    ];

$libros = nuevoLibro($libros, $libro);

?>