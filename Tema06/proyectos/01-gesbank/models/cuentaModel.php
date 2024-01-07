<?php

/**
 * clienteModel.php
 */

class cuentaModel extends Model
{
    // Método get()
    public function get()
    {
        try {
            # Comando sql
            $sql = "SELECT 
                cuentas.id,
                cuentas.num_cuenta,
                clientes.nombre,
                clientes.apellidos,
                cuentas.fecha_alta,
                cuentas.fecha_ul_mov,
                cuentas.num_movtos,
                cuentas.saldo
            FROM
                cuentas
            INNER JOIN
            clientes ON id_cliente = clientes.id";

            # Conectamos
            $conexion = $this->db->connect();

            # prepare
            $pdostmt = $conexion->prepare($sql);

            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            # Ejecutamos
            $pdostmt->execute();

            return $pdostmt;

        } catch (PDOException $e) {

            include_once('template/partials/errorDB.php');
            exit();

        }
    }

    // Método get()
    public function getCustomerName()
    {
        try {
            # Comando sql
            $sql = "SELECT 
            id,
            CONCAT_WS(' ',
            clientes.nombre,
            clientes.apellidos) AS cliente
        FROM
            clientes";

            # Conectamos
            $conexion = $this->db->connect();

            # Prepare
            $pdostmt = $conexion->prepare($sql);

            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            # Ejecutamos
            $pdostmt->execute();

            return $pdostmt;

        } catch (PDOException $e) {

            include_once('template/partials/errorDB.php');
            exit();

        }
    }

    // Método create()
    public function create(classCuenta $data)
    {
        try {
            $sql = "INSERT INTO cuentas (
                    num_cuenta,
                    id_cliente,
                    fecha_alta,
                    num_movtos,
                    saldo
                ) VALUES (
                    :num_cuenta,
                    :id_cliente,
                NOW(),
                    0,
                    :saldo
                )";


            $conexion = $this->db->connect();

            // prepare
            $pdostmt = $conexion->prepare($sql);

            $pdostmt->bindParam(':num_cuenta', $data->num_cuenta);
            $pdostmt->bindParam(':id_cliente', $data->id_cliente);
            $pdostmt->bindParam(':saldo', $data->saldo);

            // ejecutamos
            $pdostmt->execute();

        } catch (PDOException $e) {

            include_once('template/partials/error.php');
            exit();

        }
    }

    // Método read()
    public function read($id_editar)
    {
        try {
            $sql = "SELECT 
                        cuentas.id,
                        cuentas.num_cuenta,
                        CONCAT_WS(' ', clientes.apellidos, clientes.nombre) AS cliente,
                        cuentas.fecha_alta,
                        cuentas.fecha_ul_mov,
                        cuentas.num_movtos,
                        cuentas.saldo
                    FROM
                        cuentas
                            INNER JOIN
                        clientes ON cuentas.id_cliente = clientes.id
                    WHERE
                        clientes.id = :id_editar";

            // Conexión
            $conexion = $this->db->connect();

            // Prepare
            $pdostmt = $conexion->prepare($sql);

            $pdostmt->bindParam(':id_editar', $id_editar, PDO::PARAM_INT);

            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            // ejecutamos
            $pdostmt->execute();

            return $pdostmt->fetch();

        } catch (PDOException $e) {

            include_once('template/partials/error.php');
            exit();

        }
    }

    // Método edit()
    public function update(classCuenta $data, int $id_editar)
    {
        try {
            $sql = "UPDATE cuentas 
            SET 
                num_cuenta = :num_cuenta,
                fecha_alta = :fecha_alta,
                fecha_last_move = :fecha_last_move,
                num_moves = :num_moves,
                saldo = :saldo

            WHERE
                id = :id_editar";

            // Conexión
            $conexion = $this->db->connect();

            // Prepare
            $pdostmt = $conexion->prepare($sql);

            $pdostmt->bindParam(':num_cuenta', $data->num_cuenta);
            $pdostmt->bindParam(':fecha_alta', $data->fecha_alta);
            $pdostmt->bindParam(':fecha_ul_mov', $data->fecha_last_move);
            $pdostmt->bindParam(':num_movtos', $data->num_move);
            $pdostmt->bindParam(':saldo', $data->saldo);
            $pdostmt->bindParam(':id_editar', $id_editar, PDO::PARAM_INT);

            // ejecutamos
            $pdostmt->execute();

        } catch (PDOException $e) {

            include_once('template/partials/error.php');
            exit();

        }
    }

    // Método delete()
    public function delete($id_eliminar)
    {
        try {

            $sql = "DELETE
            FROM
                cuentas
            WHERE
                id = :id_eliminar";

            // Conexión
            $conexion = $this->db->connect();

            // Prepare
            $pdostmt = $conexion->prepare($sql);

            $pdostmt->bindParam(':id_eliminar', $id_eliminar, PDO::PARAM_INT);

            // Ejecutamos
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

            # Comando sql
            $sql = "SELECT 
            id, apellidos, nombre, telefono, ciudad, dni, email
        FROM
            cuentas
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

    // Método filter()
    public function filter($expresion)
    {
        $expresion = '%' . $expresion . '%';
        try {

            # Comando sql
            $sql = "SELECT 
                id, apellidos, nombre, telefono, ciudad, dni, email
            FROM
                cuentas
            WHERE
                CONCAT_WS(' ',
                        cuentas.id,
                        cuentas.apellidos,
                        cuentas.nombre,
                        cuentas.telefono,
                        cuentas.ciudad,
                        cuentas.dni,
                        cuentas.email) LIKE :expresion";

            # Conexión
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