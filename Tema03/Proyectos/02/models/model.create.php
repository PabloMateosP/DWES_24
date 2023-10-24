<?php

$articulos = generar_Tabla();
$categorias = generar_Tabla_categoria();

/*
    Recogemos los datos del nuevo artículo y llamamos a la función nuevoLibro().
*/

//TODO DEBEMOS CAMBIAR LOS DATOS DENTRO DEL POST
$articulo =
    [
        'id' => $_POST['id'],
        'descripcion' => $_POST['descripcion'],
        'modelo' => $_POST['modelo'],
        'categoria' => $_POST['genero'],
        'unidades' => $_POST['unidades'],
        'precio' => $_POST['precio']
    ];


// La función nuevoLibro me sale como no definida por lo que opte por medir el array y añadir el nuevo libro en el ultimo espacio,
// aunque en este caso la variable $libros, es decir la matriz de libros me da como no definida 
$ultimovalor = strlen($articulo);

$articulos[$ultimovalor - 1] = $articulo;

?>