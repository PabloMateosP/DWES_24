<?php

/*
    alumnoModel.php

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

    public function update(classAlumno $alumno, $id)
    {

        try {

            $sql = "
                
                UPDATE albumes
                SET
                        nombre = :nombre,
                        apellidos = :apellidos,
                        email = :email,
                        telefono = :telefono,
                        poblacion = :poblacion,
                        dni = :dni,
                        fechaNac = :fechaNac,
                        id_curso = :id_curso
                WHERE
                        id = :id
                LIMIT 1
                ";

            $conexion = $this->db->connect();

            $pdoSt = $conexion->prepare($sql);

            $pdoSt->bindParam(':id', $id, PDO::PARAM_INT);

            $pdoSt->bindParam(':nombre', $alumno->nombre, PDO::PARAM_STR, 30);
            $pdoSt->bindParam(':apellidos', $alumno->apellidos, PDO::PARAM_STR, 50);
            $pdoSt->bindParam(':email', $alumno->email, PDO::PARAM_STR, 50);
            $pdoSt->bindParam(':telefono', $alumno->telefono, PDO::PARAM_STR, 9);
            $pdoSt->bindParam(':poblacion', $alumno->poblacion, PDO::PARAM_STR, 30);
            $pdoSt->bindParam(':dni', $alumno->dni, PDO::PARAM_STR, 9);
            $pdoSt->bindParam(':fechaNac', $alumno->fechaNac);
            $pdoSt->bindParam(':id_curso', $alumno->id_curso, PDO::PARAM_INT);

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
                    concat_ws(', ', albumes.apellidos, albumes.nombre) alumno,
                    albumes.email,
                    albumes.telefono,
                    albumes.poblacion,
                    albumes.dni,
                    timestampdiff(YEAR,  albumes.fechaNac, NOW() ) edad,
                    cursos.nombreCorto curso
                FROM
                    albumes
                INNER JOIN
                    cursos
                ON 
                    albumes.id_curso = cursos.id
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
                    concat_ws(', ', albumes.apellidos, albumes.nombre) alumno,
                    albumes.email,
                    albumes.telefono,
                    albumes.poblacion,
                    albumes.dni,
                    timestampdiff(YEAR,  albumes.fechaNac, NOW() ) edad,
                    cursos.nombreCorto curso
                FROM
                    albumes
                INNER JOIN
                    cursos
                ON 
                    albumes.id_curso = cursos.id
                WHERE

                    CONCAT_WS(  ', ', 
                                albumes.id,
                                albumes.nombre,
                                albumes.apellidos,
                                albumes.email,
                                albumes.telefono,
                                albumes.poblacion,
                                albumes.dni,
                                TIMESTAMPDIFF(YEAR, albumes.fechaNac, now()),
                                albumes.fechaNac,
                                cursos.nombreCorto,
                                cursos.nombre) 
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

    # Validación email único
    public function validateUniqueEmail($email)
    {
        try {

            $sql = " 

                SELECT * FROM albumes 
                WHERE email = :email
            
            ";

            # conectamos con la base de datos
            $conexion = $this->db->connect();
            $pdost = $conexion->prepare($sql);
            $pdost->bindParam(':email', $email, PDO::PARAM_STR);
            $pdost->execute();

            if ($pdost->rowCount() != 0) {
                return FALSE;
            }

            return TRUE;


        } catch (PDOException $e) {

            include_once('template/partials/errorDB.php');
            exit();

        }
    }

    public function subirArchivo($archivos, $carpeta)
    {

        $num = count($archivos['tmp_name']);

        //Comprobamos antes si ha ocurrido algún errorde archivo
        $phpFileUploadErrors = array(
            0 => 'There is no error, the file uploaded with success',
            1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
            2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
            3 => 'The uploaded file was only partially uploaded',
            4 => 'No file was uploaded',
            6 => 'Missing a temporary folder',
            7 => 'Failed to write file to disk.',
            8 => 'A PHP extension stopped the file upload.',
        );

        $error = null;

        for ($i = 0; $i <= $num - 1 && is_null($error); $i++) {
            if ($archivos['error'][$i] != UPLOAD_ERR_OK) {
                $error = $phpFileUploadErrors[$archivos['error'][$i]];
            } else {
                //Validar tamaño máximo 4mb
                $max_file = 4194304;
                if ($archivos['size'][$i] > $max_file) {

                    //Errores de tipo error
                    $error = "Archivo excede tamaño maximo 4MB";

                }
                $info = new SplFileInfo($archivos['name'][$i]);
                $tipos_permitidos = ['JPEG', 'JPG', 'GIF', 'PNG'];
                if (!in_array(strtoupper($info->getExtension()), $tipos_permitidos)) {
                    $error = "Tipo archivo no permitido. Sólo JPG, JPEG, GIF o PNG";
                }
            }
        }

        //Sólo se procederá a la subida de archivos en caso de no ocurrir ningun error
        if (is_null($error)) {
            for ($i = 0; $i <= $num - 1; $i++) {
                if (is_uploaded_file($archivos['tmp_name'][$i])) {
                    move_uploaded_file($archivos['tmp_name'][$i], "images/" . $carpeta . "/" . $archivos['name'][$i]);
                }
            }
            $_SESSION['mensaje'] = "Archivo/s subido/s con éxito";
        } else {
            $_SESSION['error'] = $error;
        }


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