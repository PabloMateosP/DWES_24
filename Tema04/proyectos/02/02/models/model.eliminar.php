<?php

// Model: model.eliminar.php

// Descripción: eliminar un elemto de la tabla

$articulos = new ArrayArticulo();
$articulos -> getDatos();

$categorias = ArrayArticulo::getCategorias();

$marcas = ArrayArticulo::getMarcas();

$id = $_GET['id'];

$indice_eliminar = buscar_en_tabla($articulos, 'id', $id);

if ($indice_eliminar !== false) {
    // elimino elemento seleccionado 
    $articulos -> delete();

} else {
    echo 'ERROR: libro no encontrado';
    exit();
}

?>