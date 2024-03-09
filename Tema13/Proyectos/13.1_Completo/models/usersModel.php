<?php

class usersModel extends Model
{


    # Método Get
    # Consulta SELECT a la tabla usuarios 
    public function get()
    {
        try {
            $sql = "
                SELECT 
                    id,
                    name, 
                    email, 
                    created_at,
                    update_at
                FROM 
                    users
                ORDER BY id";

            $conexion = $this->db->connect();
            $pdoSt = $conexion->prepare($sql);
            $pdoSt->setFetchMode(PDO::FETCH_OBJ);
            $pdoSt->execute();
            return $pdoSt;

        } catch (PDOException $e) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }

    # Método delete
    # Permite ejecutar comando DELETE de un usuario
    public function delete($id)
    {
        try {

            $sql = " DELETE FROM users WHERE id = :id; ";

            $conexion = $this->db->connect();
            $pdoSt = $conexion->prepare($sql);
            $pdoSt->bindParam(":id", $id, PDO::PARAM_INT);
            $pdoSt->execute();
            return $pdoSt;

        } catch (PDOException $error) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }


    # Método update 
    # Actualiza los detalles del usuario 
    public function update(classUser $user, $id)
    {

        try {

            $sql = "
                UPDATE users 
                SET
                    name=:name,
                    email=:email,
                    password=:password,
                    update_at = now()
                WHERE 
                    id=:id
                LIMIT 1";

            $conexion = $this->db->connect();
            $pdoSt = $conexion->prepare($sql);

            // Vinculamos los parámetros
            $pdoSt->bindParam(":name", $user->name, PDO::PARAM_STR, 30);
            $pdoSt->bindParam(":email", $user->email, PDO::PARAM_INT);
            $pdoSt->bindValue(":password", $user->password, PDO::PARAM_STR);
            $pdoSt->bindParam(":id", $id, PDO::PARAM_INT);

            // Ejecutamos la consulta
            $pdoSt->execute();

        } catch (PDOException $error) {
            require_once("template/partials/errorDB.php");
            exit();
        }

    }

    # Método getUser
    # Obtiene los detalles de un cliente a partir del id
    public function getUser($id)
    {
        try {
            $sql = " 
                    SELECT     
                        id,
                        name,
                        email,
                        password
                    FROM  
                        users  
                    WHERE
                        id = :id";

            $conexion = $this->db->connect();
            $pdoSt = $conexion->prepare($sql);
            $pdoSt->bindParam(":id", $id, PDO::PARAM_INT);
            $pdoSt->setFetchMode(PDO::FETCH_OBJ);
            $pdoSt->execute();
            return $pdoSt->fetch();

        } catch (PDOException $e) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }

    public function read($id)
    {

        try {
            $sql = " SELECT
            id,
            name,
            email,
            password
        FROM 
            users
        WHERE id =  :id;
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

    public function validateUniqueEmail($email)
    {
        try {

            $sql = "
                SELECT * FROM users
                WHERE email = :email
            ";

            # Conectar con la base de datos
            $conexion = $this->db->connect();

            $pdostmt = $conexion->prepare($sql);

            $pdostmt->bindParam(':email', $email, PDO::PARAM_STR, 50);
            $pdostmt->execute();

            if ($pdostmt->rowCount() != 0) {
                return FALSE;
            }

            return TRUE;

        } catch (PDOException $e) {

            include_once('template/partials/errorDB.php');
            exit();

        }
    }

    public function order(int $criterio)
    {
        try {
            $sql = "
                    SELECT 
                        id,
                        name,
                        email,
                        created_at
                    FROM 
                        users
                    ORDER BY
                        :criterio";

            $conexion = $this->db->connect();
            $pdoSt = $conexion->prepare($sql);
            $pdoSt->bindParam(":criterio", $criterio, PDO::PARAM_INT);
            $pdoSt->setFetchMode(PDO::FETCH_OBJ);

            $pdoSt->execute();

            return $pdoSt;
        } catch (PDOException $e) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }

    # Método filter
    # Permite filtar la tabla usuarios a partir de una expresión de búsqueda
    public function filter($expresion)
    {
        try {

            $sql = "
                    SELECT 
                        id,
                        name,
                        email,
                        created_at
                    FROM 
                        users
                    WHERE 
                        concat_ws(  
                                    ' ',
                                    id,
                                    name,
                                    email,
                                    created_at
                                )
                        LIKE 
                                :expresion
                    
                    ORDER BY id ASC";

            $conexion = $this->db->connect();
            $pdoSt = $conexion->prepare($sql);

            # enlazamos parámetros con variable
            $expresion = "%" . $expresion . "%";
            $pdoSt->bindValue(':expresion', $expresion, PDO::PARAM_STR);

            $pdoSt->setFetchMode(PDO::FETCH_OBJ);
            $pdoSt->execute();
            return $pdoSt;

        } catch (PDOException $e) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }

}