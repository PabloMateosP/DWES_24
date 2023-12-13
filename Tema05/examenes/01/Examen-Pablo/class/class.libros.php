<?php

/*
    Clase libros 

    Aquí se definirán los métodos necesarios para completar el examen
    
*/

class Libros extends Conexion
{

    public function getLibros()
    {
        // Tener cuenta de autor y editorial 

        $sql = "SELECT 
                libros.id,
                libros.titulo,
                autores.nombre autor,
                editoriales.nombre editorial,
                libros.stock,
                libros.precio_coste,
                libros.precio_venta
            FROM
                libros
                    INNER JOIN
                autores
                    INNER JOIN
                editoriales
            WHERE
                autores.id = libros.autor_id
                    AND editoriales.id = libros.editorial_id 
            ORDER BY libros.id";

        # Prepare -> objeto
        $pdostmt = $this->pdo->prepare($sql);

        // Establezco fetch
        $pdostmt->setFetchMode(PDO::FETCH_OBJ);

        // ejecuto
        $pdostmt->execute();

        return $pdostmt;

    }

    public function getAutores()
    {
        //Tener cuidado ya que he llamado al nombre autor 
        $sql = "SELECT id, nombre autor FROM autores ORDER BY autor;";

        # Prepare -> objeto
        $pdostmt = $this->pdo->prepare($sql);

        // Establezco fetch
        $pdostmt->setFetchMode(PDO::FETCH_OBJ);

        // ejecuto
        $pdostmt->execute();

        return $pdostmt;

    }

    public function getEditoriales()
    {
        //Tener cuidado ya que he llamado al nombre editorial 
        $sql = "SELECT id, nombre editorial FROM editoriales ORDER BY editorial;";

        # Prepare -> objeto
        $pdostmt = $this->pdo->prepare($sql);

        // Establezco fetch
        $pdostmt->setFetchMode(PDO::FETCH_OBJ);

        // ejecuto
        $pdostmt->execute();

        return $pdostmt;

    }

    public function insertarLibro(Libro $libro)
    {
        try {
            $sql = "INSERT INTO libros (
                isbn,
                titulo,
                autor_id,
                editorial_id,
                precio_coste,
                precio_venta,
                stock,
                stock_min,
                stock_max,
                fecha_edicion
            ) VALUES(
                :isbn, 
                :titulo,
                :autor,
                :editorial,
                :precioCoste,
                :precioVenta,
                :stock,
                :stockMinimo,
                :stockMaximo,
                :fecha_edicion
                )";

            $pdostmt = $this->pdo->prepare($sql);

            $pdostmt->bindParam(':isbn', $libro->isbn, PDO::PARAM_INT, 30);
            $pdostmt->bindParam(":titulo", $libro->titulo, PDO::PARAM_STR, 30);
            $pdostmt->bindParam(":autor", $libro->autor_id, PDO::PARAM_INT);
            $pdostmt->bindParam(":editorial", $libro->editorial_id, PDO::PARAM_INT);
            $pdostmt->bindParam(':precioCoste', $libro->precio_coste, PDO::PARAM_INT, 10);
            $pdostmt->bindParam(":precioVenta", $libro->precio_venta, PDO::PARAM_INT, 10);
            $pdostmt->bindParam(":stock", $libro->stock, PDO::PARAM_INT);
            $pdostmt->bindParam(":stockMinimo", $libro->stock_min, PDO::PARAM_INT);
            $pdostmt->bindParam(":stockMaximo", $libro->stock_max, PDO::PARAM_INT);
            $pdostmt->bindParam(":fecha_edicion", $libro->fecha_edicion);

            $pdostmt->execute();

            $pdostmt = null;

            $this->pdo = null;

        } catch (PDOException $e) {

            include('views/partials/partial.errorDB.php');
            exit();

        }
    }

    public function ordenar(int $criterio)
    {
        try {
            $sql = "SELECT 
                libros.id,
                libros.titulo,
                autores.nombre autor,
                editoriales.nombre editorial,
                libros.stock,
                libros.precio_coste,
                libros.precio_venta
            FROM
                libros
                    INNER JOIN
                autores
                    INNER JOIN
                editoriales
            WHERE
                autores.id = libros.autor_id
                    AND editoriales.id = libros.editorial_id
                ORDER BY $criterio";

            // Preparo la consulta
            $pdostmt = $this->pdo->prepare($sql);

            // Elegimos el tipo de fetch
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            // Ejecuto la consulta
            $pdostmt->execute();

            // Devolvemos el objeto de tipo PDOStatement
            return $pdostmt;

        } catch (PDOException $e) {
            include 'views/partials/errorDB.php';
            exit();
        }
    }
}


?>