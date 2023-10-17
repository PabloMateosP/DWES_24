<?php 

    /*

    función: delete()
    descripcion: elimina un elemento de la tabla
    parámetros:
        - tabla
        - id del elemento que deseo eliminar
    salida: 
        - tabla actualizada
        
    */

    // Indicamos que el primer argumento es un array 
    function delete ($tabla = [], $id){
        // Creamos un elemento nulo para posteriormente mostrarlo en mensaje
        $libroEliminado = null;

        // Comenzamos la búsqueda del libro con el id introducido 
        foreach ($tabla as $indice => $libro) {
            if ($libro['id'] == $id) {
                $libroEliminado = $tabla[$indice];
                // Gracias al método unset borramos el libro con el id buscado. 
                unset($libros[$indice]);
                break;
            }
        }

        if ($libroEliminado) {
            return 'El libro con ID ' . $id . ' ("' . $libroEliminado['titulo'] . '") ha sido eliminado. La tabla ha sido actualizada.';
        } else {
            return 'No se encontró ningún libro con el ID ' . $id . '. La tabla no ha sido modificada.';
        }
    }

?>