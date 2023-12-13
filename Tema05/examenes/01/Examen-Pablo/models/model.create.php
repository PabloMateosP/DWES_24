<?php

    /*
        Modelo create

        Recibe los valores del formulario nuevo libro
        hay que tener en cuenta que he dejado de utilizar algunos campos
    */

    $titulo = $_POST['titulo'];
    $isbn = $_POST['isbn'];
    $fecha_edicion = $_POST['fecha_edicion'];
    $autor = $_POST['id_autor'];
    $editorial = $_POST['id_editorial'];
    $stock = $_POST['stock'];
    $precio_coste = $_POST['precio_coste'];
    $precio_venta = $_POST['precio_venta'];
    
    $libro_nuevo = new Libro();
    
    $libro_nuevo->id = null;
    $libro_nuevo->isbn = $isbn;
    $libro_nuevo->ean = 0;
    $libro_nuevo->titulo = $titulo;
    $libro_nuevo->autor_id = $autor;
    $libro_nuevo->editorial_id = $editorial;
    $libro_nuevo->precio_coste = $precio_coste;
    $libro_nuevo->precio_venta = $precio_venta;
    $libro_nuevo->stock = $stock;
    $libro_nuevo->stock_min = 0;
    $libro_nuevo->stock_max = 0;
    $libro_nuevo->fecha_edicion = $fecha_edicion;
    
    $conexion = new Libros();
    
    $conexion->insertarLibro($libro_nuevo);

?>