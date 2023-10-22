<?php 

$id = $_GET['id'];

$indice_mostrar = buscar_en_tabla($libros, 'id', $id);

$libros = $libros[$indice_mostrar];

?>