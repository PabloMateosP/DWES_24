<?php

/**
 * clienteModel.php
 */

class clienteModel extends Model
{
    // Método get()
    public function get()
    {
        try {
            # Comando sql
            $sql = "SELECT 
                id, 
                apellidos, 
                nombre, 
                telefono, 
                ciudad, 
                dni, 
                email
        FROM
                clientes
        ORDER BY id";

            # Conectamos
            $conexion = $this->db->connect();

            $pdostmt = $conexion->prepare($sql);

            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            # Ejecutamos
            $pdostmt->execute();

            # Retornamos
            return $pdostmt;

        } catch (PDOException $e) {

            include_once('template/partials/errorDB.php');
            exit();

        }
    }

    // Método create()
    public function create(classCliente $data)
    {
        try {

            $sql = "INSERT INTO clientes (
                apellidos,
                nombre,
                telefono,
                ciudad,
                dni,
                email
                )VALUES(
                :apellidos,
                :nombre,
                :telefono,
                :ciudad,
                :dni,
                :email
                )";

            // creamos la conexión
            $conexion = $this->db->connect();

            $pdostmt = $conexion->prepare($sql);

            $pdostmt->bindParam(':apellidos', $data->apellidos, PDO::PARAM_STR);
            $pdostmt->bindParam(':nombre', $data->nombre, PDO::PARAM_STR);
            $pdostmt->bindParam(':telefono', $data->telefono, PDO::PARAM_INT);
            $pdostmt->bindParam(':ciudad', $data->ciudad, PDO::PARAM_STR);
            $pdostmt->bindParam(':dni', $data->dni, PDO::PARAM_STR);
            $pdostmt->bindParam(':email', $data->email, PDO::PARAM_STR);

            // ejecutamos
            $pdostmt->execute();

        } catch (PDOException $e) {

            include_once('template/partials/errorDB.php');
            exit();

        }
    }

    // Método read()
    public function read($id_editar)
    {
        try {

            $sql = "SELECT 
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
                        id = :id_editar";

            // conexión
            $conexion = $this->db->connect();

            // prepare
            $pdostmt = $conexion->prepare($sql);

            $pdostmt->bindParam(':id_editar', $id_editar, PDO::PARAM_INT);

            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            // ejecutamos
            $pdostmt->execute();

            return $pdostmt->fetch();

        } catch (PDOException $e) {

            include_once('template/partials/errorDB.php');
            exit();

        }
    }

    // Método edit()
    public function update(classCliente $data, int $id_editar)
    {

        try {

            $sql = "UPDATE clientes 
            SET 
                apellidos = :apellidos,
                nombre    = :nombre,
                telefono  = :telefono,
                ciudad    = :ciudad,
                dni       = :dni,
                email     = :email
            WHERE
                id = :id_editar";

            // conexión
            $conexion = $this->db->connect();

            //prepare
            $pdostmt = $conexion->prepare($sql);

            $pdostmt->bindParam(':apellidos', $data->apellidos, PDO::PARAM_STR);
            $pdostmt->bindParam(':nombre', $data->nombre, PDO::PARAM_STR);
            $pdostmt->bindParam(':telefono', $data->telefono, PDO::PARAM_INT);
            $pdostmt->bindParam(':ciudad', $data->ciudad, PDO::PARAM_STR);
            $pdostmt->bindParam(':dni', $data->dni, PDO::PARAM_STR);
            $pdostmt->bindParam(':email', $data->email, PDO::PARAM_STR);
            $pdostmt->bindParam(':id_editar', $id_editar, PDO::PARAM_INT);

            $pdostmt->execute();


        } catch (PDOException $e) {

            include_once('template/partials/errorDB.php');
            exit();

        }
    }

    // Método delete()
    public function delete($id_eliminar)
    {
        try {

            $sql = "DELETE
            FROM
                clientes
            WHERE
                id = :id_eliminar";

            // conexión
            $conexion = $this->db->connect();

            // prepare
            $pdostmt = $conexion->prepare($sql);

            $pdostmt->bindParam(':id_eliminar', $id_eliminar, PDO::PARAM_INT);

            // ejecutamos
            $pdostmt->execute();


        } catch (PDOException $e) {
            include_once('template/partials/errorDB.php');
            exit();
        }

    }

    // Método delete()
    public function order(int $criterio)
    {
        try {
            $sql = "SELECT 
                        id, 
                        apellidos, 
                        nombre, 
                        telefono, 
                        ciudad, 
                        dni, 
                        email
                    FROM
                        clientes
                    ORDER BY :criterio";

            # Conexión
            $conexion = $this->db->connect();

            # Prepare
            $pdostmt = $conexion->prepare($sql);

            $pdostmt->bindParam(':criterio', $criterio, PDO::PARAM_INT);

            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            # Ejecutamos
            $pdostmt->execute();

            return $pdostmt;

        } catch (PDOException $e) {
            include_once('template/partials/errorDB.php');
            exit();
        }

    }

    // Método filter() -> filtra los clientes mostrados mediante expresión del usuario
    public function filter($expresion)
    {
        $expresion = '%' . $expresion . '%';
        try {

            # Comando sql
            $sql = "SELECT 
                id, apellidos, nombre, telefono, ciudad, dni, email
            FROM
                clientes
            WHERE
                CONCAT_WS(' ',
                        clientes.id,
                        clientes.apellidos,
                        clientes.nombre,
                        clientes.telefono,
                        clientes.ciudad,
                        clientes.dni,
                        clientes.email) LIKE :expresion";

            # Conectamos -> ejecuta el método connect() de db
            $conexion = $this->db->connect();

            # Prepare
            $pdostmt = $conexion->prepare($sql);

            $pdostmt->bindParam(':expresion', $expresion, PDO::PARAM_STR);

            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            # Ejecutamos
            $pdostmt->execute();

            return $pdostmt;

        } catch (PDOException $e) {
            include_once('template/partials/errorDB.php');
            exit();
        }
    }
}
?>