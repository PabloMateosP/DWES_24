<?php


class clientesModel extends Model
{

    # Método get
    # Consulta SELECT a la tabla clientes
    public function get()
    {
        try {
            $sql = "

            SELECT 
                id,
                concat_ws(', ', apellidos, nombre) cliente,
                telefono,
                ciudad,
                dni,
                email
            FROM 
                clientes
            ORDER BY id;

            ";

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

    # Método create
    # Permite ejecutar INSERT en la tabla clientes
    public function create(classCliente $cliente)
    {
        try {
            $sql = " INSERT INTO 
                        clientes 
                        (
                            nombre, 
                            apellidos, 
                            email, 
                            telefono, 
                            ciudad, 
                            dni
                        ) 
                        VALUES 
                        ( 
                            :nombre,
                            :apellidos,
                            :email,
                            :telefono,
                            :ciudad,
                            :dni
                        )";

            $conexion = $this->db->connect();
            $pdoSt = $conexion->prepare($sql);

            //Vinculamos los parámetros
            $pdoSt->bindParam(":nombre", $cliente->nombre, PDO::PARAM_STR, 30);
            $pdoSt->bindParam(":apellidos", $cliente->apellidos, PDO::PARAM_STR, 50);
            $pdoSt->bindParam(":email", $cliente->email, PDO::PARAM_STR, 50);
            $pdoSt->bindParam(":telefono", $cliente->telefono, PDO::PARAM_STR, 9);
            $pdoSt->bindParam(":ciudad", $cliente->ciudad, PDO::PARAM_STR, 30);
            $pdoSt->bindParam(":dni", $cliente->dni, PDO::PARAM_STR, 9);

            // ejecuto
            $pdoSt->execute();

        } catch (PDOException $e) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }

    # Método delete
    # Permite ejecutar comando DELETE en la tabla clientes
    public function delete($id)
    {
        try {

            $sql = " 
                   DELETE FROM clientes WHERE id = :id;
                   ";

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

    # Método getCliente
    # Obtiene los detalles de un cliente a partir del id
    public function getCliente($id)
    {
        try {
            $sql = " 
                    SELECT     
                        id,
                        apellidos,
                        nombre,
                        telefono,
                        ciudad,
                        dni,
                        email
                    FROM  
                        clientes  
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
            apellidos, 
            nombre,
            telefono,
            ciudad,
            dni,
            email
        FROM 
            clientes
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

    # Método update
    # Actuliza los detalles de un cliente una vez editados en el formuliario
    public function update(classCliente $cliente, $id)
    {
        try {
            $sql = " 
                    UPDATE clientes
                    SET
                        apellidos=:apellidos,
                        nombre=:nombre,
                        telefono=:telefono,
                        ciudad=:ciudad,
                        dni=:dni,
                        email=:email,
                        update_at = now()
                    WHERE
                        id=:id
                    LIMIT 1";

            $conexion = $this->db->connect();
            $pdoSt = $conexion->prepare($sql);
            //Vinculamos los parámetros
            $pdoSt->bindParam(":nombre", $cliente->nombre, PDO::PARAM_STR, 30);
            $pdoSt->bindParam(":apellidos", $cliente->apellidos, PDO::PARAM_STR, 50);
            $pdoSt->bindParam(":email", $cliente->email, PDO::PARAM_STR, 50);
            $pdoSt->bindParam(":telefono", $cliente->telefono, PDO::PARAM_STR, 9);
            $pdoSt->bindParam(":ciudad", $cliente->ciudad, PDO::PARAM_STR, 30);
            $pdoSt->bindParam(":dni", $cliente->dni, PDO::PARAM_STR, 9);
            $pdoSt->bindParam(":id", $id, PDO::PARAM_INT);

            $pdoSt->execute();

        } catch (PDOException $error) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }



    # Método update
    # Permite ordenar la tabla de cliente por cualquiera de las columnas del main
    # El criterio de ordenación se establec mediante el número de la columna del select
    public function order(int $criterio)
    {
        try {
            $sql = "
                    SELECT 
                        id,
                        concat_ws(', ', apellidos, nombre) cliente,
                        telefono,
                        ciudad,
                        dni,
                        email
                    FROM 
                        clientes 
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
    # Permite filtar la tabla clientes a partir de una expresión de búsqueda
    public function filter($expresion)
    {
        try {

            $sql = "
                    SELECT 
                        id,
                        concat_ws(', ', apellidos, nombre) cliente,
                        telefono,
                        ciudad,
                        dni,
                        email
                    FROM 
                        clientes 
                    WHERE 
                        concat_ws(  
                                    ' ',
                                    id,
                                    apellidos,
                                    nombre,
                                    telefono,
                                    ciudad,
                                    dni,
                                    email
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

    public function validateUniqueEmail($email)
    {
        try {

            $sql = "
                SELECT * FROM clientes
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

    public function validateUniqueDni($dni)
    {
        try {

            $sql = "
                SELECT * FROM clientes
                WHERE dni = :dni
            ";

            # Conectar con la base de datos
            $conexion = $this->db->connect();

            $pdostmt = $conexion->prepare($sql);

            $pdostmt->bindParam(':dni', $dni, PDO::PARAM_STR, 50);
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
}
