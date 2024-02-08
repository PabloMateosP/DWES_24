<?php

/*
    $albumModel.php

    Modelo del  controlador albumes

    Definir los métodos de acceso a la base de datos
    
    - insert
    - update
    - select
    - delete
    - etc..
*/

class albumModel extends Model
{

    /*
        Extrae los detalles  de los albumes
    */
    public function get()
    {

        try {

            # comando sql
            $sql = "
                SELECT 
                    *
                FROM
                    albumes
                ORDER BY 
                    id
                ";

            # conectamos con la base de datos

            // $this->db es un objeto de la clase database
            // ejecuto el método connect de esa clase

            $conexion = $this->db->connect();

            # ejecutamos mediante prepare
            $pdost = $conexion->prepare($sql);

            # establecemos  tipo fetch
            $pdost->setFetchMode(PDO::FETCH_OBJ);

            #  ejecutamos 
            $pdost->execute();

            # devuelvo objeto pdostatement
            return $pdost;

        } catch (PDOException $e) {

            include_once('template/partials/errorDB.php');
            exit();

        }
    }

    public function create(classAlbum $album)
    {

        try {
            $sql = "INSERT INTO 
                albumes 
               VALUES (
                        null,
                        :titulo,
                        :descripcion,
                        :autor, 
                        :fecha,
                        :lugar,
                        :categoria,
                        :etiquetas,
                        0,
                        0,
                        :carpeta,
                        null,
                        null
                        )
                ";
            $conexion = $this->db->connect();

            $pdoSt = $conexion->prepare($sql);
            $pdoSt->bindParam(':titulo', $album->titulo, PDO::PARAM_STR, 100);
            $pdoSt->bindParam(':descripcion', $album->descripcion, PDO::PARAM_STR);
            $pdoSt->bindParam(':autor', $album->autor, PDO::PARAM_STR, 50);
            $pdoSt->bindParam(':fecha', $album->fecha);
            $pdoSt->bindParam(':lugar', $album->lugar, PDO::PARAM_STR, 50);
            $pdoSt->bindParam(':categoria', $album->categoria, PDO::PARAM_STR, 50);
            $pdoSt->bindParam(':etiquetas', $album->etiquetas, PDO::PARAM_STR, 250);
            $pdoSt->bindParam(':carpeta', $album->carpeta, PDO::PARAM_STR, 50);

            $pdoSt->execute();

        } catch (PDOException $e) {
            include_once('template/partials/errorDB.php');
            exit();
        }

    }

    public function read($id)
    {

        try {
            $sql = "
                        SELECT 
                            *
                        FROM 
                                albumes
                        WHERE
                                id = :id
                ";

            # Conectar con la base de datos
            $conexion = $this->db->connect();


            $pdoSt = $conexion->prepare($sql);

            $pdoSt->bindParam(':id', $id, PDO::PARAM_INT);
            $pdoSt->setFetchMode(PDO::FETCH_OBJ);
            $pdoSt->execute();

            return $pdoSt->fetch();

        } catch (PDOException $e) {
            include_once('template/partials/errorDB.php');
            exit();
        }

    }

    public function update(classAlbum $album, $id)
    {

        try {

            $sql = "
                
                UPDATE albumes
                SET
                        titulo = :titulo,
                        descripcion = :descripcion,
                        autor = :autor,
                        fecha = :fecha,
                        lugar = :lugar,
                        categoria = :categoria,
                        etiquetas = :etiquetas,
                        carpeta = :carpeta
                WHERE
                        id = :id
                LIMIT 1
                ";

            $conexion = $this->db->connect();

            $pdoSt = $conexion->prepare($sql);

            $pdoSt->bindParam(':id', $id, PDO::PARAM_INT);

            $pdoSt->bindParam(':titulo', $album->titulo, PDO::PARAM_STR, 30);
            $pdoSt->bindParam(':descripcion', $album->descripcion, PDO::PARAM_STR, 50);
            $pdoSt->bindParam(':autor', $album->autor, PDO::PARAM_STR, 50);
            $pdoSt->bindParam(':fecha', $album->fecha, PDO::PARAM_STR, 9);
            $pdoSt->bindParam(':lugar', $album->lugar, PDO::PARAM_STR, 30);
            $pdoSt->bindParam(':categoria', $album->categoria, PDO::PARAM_STR, 9);
            $pdoSt->bindParam(':etiquetas', $album->etiquetas, PDO::PARAM_STR);
            $pdoSt->bindParam(':carpeta', $album->carpeta, PDO::PARAM_STR);

            $pdoSt->execute();

        } catch (PDOException $e) {
            include_once('template/partials/errorDB.php');
            exit();
        }

    }

    /*
       Extrae los detalles  de los albumes
   */
    public function order(int $criterio)
    {

        try {

            # comando sql
            $sql = "
                SELECT 
                    albumes.id,
                    albumes.titulo,
                    albumes.descripcion,
                    albumes.autor,
                    albumes.fecha,
                    albumes.lugar,
                    albumes.categoria,
                    albumes.etiquetas,
                    albumes.carpeta
                FROM
                    albumes
                ORDER BY 
                    :criterio
                ";

            # conectamos con la base de datos
            $conexion = $this->db->connect();

            # ejecutamos mediante prepare
            $pdost = $conexion->prepare($sql);

            $pdost->bindParam(':criterio', $criterio, PDO::PARAM_INT);

            # establecemos  tipo fetch
            $pdost->setFetchMode(PDO::FETCH_OBJ);

            #  ejecutamos 
            $pdost->execute();

            # devuelvo objeto pdostatement
            return $pdost;

        } catch (PDOException $e) {

            include_once('template/partials/errorDB.php');
            exit();

        }
    }

    public function filter($expresion)
    {
        try {
            $sql = "

                SELECT 
                    albumes.id,
                    albumes.titulo,
                    albumes.descripcion,
                    albumes.autor,
                    albumes.fecha,
                    albumes.lugar,
                    albumes.categoria,
                    albumes.etiquetas,
                    albumes.carpeta
                FROM
                    albumes
                WHERE

                CONCAT_WS(
                    albumes.id,
                    albumes.titulo,
                    albumes.descripcion,
                    albumes.autor,
                    albumes.fecha,
                    albumes.lugar,
                    albumes.categoria,
                    albumes.etiquetas,
                    albumes.carpeta
                    )
                    like :expresion

                ORDER BY 
                    albumes.id
                
                ";

            # Conectar con la base de datos
            $conexion = $this->db->connect();

            $pdost = $conexion->prepare($sql);

            $pdost->bindValue(':expresion', '%' . $expresion . '%', PDO::PARAM_STR);
            $pdost->setFetchMode(PDO::FETCH_OBJ);
            $pdost->execute();
            return $pdost;

        } catch (PDOException $e) {

            include_once('template/partials/errorDB.php');
            exit();

        }

    }


    public function subirArchivo($archivos, $carpeta)
    {
        $num = count($archivos['tmp_name']);

        for ($i = 0; $i < $num; $i++) {
            if ($archivos['error'][$i] == UPLOAD_ERR_OK) {
                // Validar tamaño máximo 5MB
                $max_file_size = 5 * 1024 * 1024; // 5MB en bytes
                if ($archivos['size'][$i] > $max_file_size) {
                    $_SESSION['error'] = "El archivo excede el tamaño máximo de 5MB";
                    return;
                }

                // Validar tipos de archivo permitidos (JPEG, JPG, GIF, PNG)
                $allowed_types = ['jpg', 'gif', 'png'];
                $file_extension = pathinfo($archivos['name'][$i], PATHINFO_EXTENSION);
                if (!in_array(strtolower($file_extension), $allowed_types)) {
                    $_SESSION['error'] = "Tipo de archivo no permitido. Solo se permiten archivos JPG, GIF o PNG";
                    return;
                }

                // Mover el archivo subido al directorio de destino
                $destination = "images/" . $carpeta . "/" . $archivos['name'][$i];
                move_uploaded_file($archivos['tmp_name'][$i], $destination);
            } else {
                // Manejar errores de carga
                $_SESSION['error'] = "Error al subir archivo: " . $archivos['error'][$i];
                return;
            }
        }

        $_SESSION['mensaje'] = "Archivo subido con éxito";
    }



    public function delete($id)
    {
        try {

            $sql = "DELETE FROM albumes WHERE id = :id limit 1";
            $conexion = $this->db->connect();
            $pdost = $conexion->prepare($sql);
            $pdost->bindParam(':id', $id, PDO::PARAM_INT);
            $pdost->execute();

        } catch (PDOException $e) {

            include_once('template/partials/errorDB.php');
            exit();

        }
    }

}