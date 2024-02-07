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
                    albumes.lugar,
                    albumes.fecha,
                    albumes.categoria,
                    albumes.etiquetas,
                    albumes.num_fotos,
                    albumes.num_visitas,
                    albumes.carpeta
                FROM
                    albumes
                ORDER BY 
                    :criterio
                ";

            # conectamos con la base de datos

            // $this->db es un objeto de la clase database
            // ejecuto el método connect de esa clase

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
                    albumes.lugar,
                    albumes.fecha,
                    albumes.categoria,
                    albumes.etiquetas,
                    albumes.num_fotos,
                    albumes.num_visitas,
                    albumes.carpeta
                FROM
                    albumes
                WHERE

                CONCAT_WS(
                    albumes.id,
                    albumes.titulo,
                    albumes.lugar,
                    albumes.fecha,
                    albumes.categoria,
                    albumes.etiquetas,
                    albumes.num_fotos,
                    albumes.num_visitas,
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

    // public function subirArchivo($archivos, $carpeta)
    // {

    //     $num = count($archivos['tmp_name']);

    //     $phpFileUploadErrors = array(
    //         0 => 'There is no error, the file uploaded with success',
    //         1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
    //         2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
    //         3 => 'The uploaded file was only partially uploaded',
    //         4 => 'No file was uploaded',
    //         6 => 'Missing a temporary folder',
    //         7 => 'Failed to write file to disk.',
    //         8 => 'A PHP extension stopped the file upload.',
    //     );

    //     $error = null;

    //     for ($i = 0; $i <= $num - 1 && is_null($error); $i++) {
    //         if ($archivos['error'][$i] != UPLOAD_ERR_OK) {
    //             $error = $phpFileUploadErrors[$archivos['error'][$i]];
    //         } else {
    //             //Validar tamaño máximo 4mb
    //             $max_file = 4194304;
    //             if ($archivos['size'][$i] > $max_file) {

    //                 //Errores de tipo error
    //                 $error = "Archivo excede tamaño maximo 4MB";

    //             }
    //             $info = new SplFileInfo($archivos['name'][$i]);
    //             $tipos_permitidos = ['JPEG', 'JPG', 'GIF', 'PNG'];
    //             if (!in_array(strtoupper($info->getExtension()), $tipos_permitidos)) {
    //                 $error = "Tipo archivo no permitido. Sólo JPG, JPEG, GIF o PNG";
    //             }
    //         }
    //     }

    //     //Sólo se procederá a la subida de archivos en caso de no ocurrir ningun error
    //     if (is_null($error)) {
    //         for ($i = 0; $i <= $num - 1; $i++) {
    //             if (is_uploaded_file($archivos['tmp_name'][$i])) {
    //                 move_uploaded_file($archivos['tmp_name'][$i], "images/" . $carpeta . "/" . $archivos['name'][$i]);
    //             }
    //         }
    //         $_SESSION['mensaje'] = "Archivo/s subido/s con éxito";
    //     } else {
    //         $_SESSION['error'] = $error;
    //     }
    // }

    public function subirArchivo($archivos, $carpeta)
    {
        $num = count($archivos['tmp_name']);

        for ($i = 0; $i < $num; $i++) {
            if ($archivos['error'][$i] == UPLOAD_ERR_OK) {
                // Validar tamaño máximo 4MB
                $max_file_size = 4 * 1024 * 1024; // 4MB en bytes
                if ($archivos['size'][$i] > $max_file_size) {
                    $_SESSION['error'] = "El archivo excede el tamaño máximo de 4MB";
                    return;
                }

                // Validar tipos de archivo permitidos (JPEG, JPG, GIF, PNG)
                $allowed_types = ['jpeg', 'jpg', 'gif', 'png'];
                $file_extension = pathinfo($archivos['name'][$i], PATHINFO_EXTENSION);
                if (!in_array(strtolower($file_extension), $allowed_types)) {
                    $_SESSION['error'] = "Tipo de archivo no permitido. Solo se permiten archivos JPG, JPEG, GIF o PNG";
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

        $_SESSION['mensaje'] = "Archivo/s subido/s con éxito";
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