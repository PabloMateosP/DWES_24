<?php

/*
    Modelo Movimientos Model
*/

class movimientosModel extends Model
{

    # Método get 
    # Consulta select sobre la tabla movimientos

    public function get()
    {
        try {

            $sql = "SELECT id,
            id_cuenta,
            fecha_hora,
            concepto,
            tipo,
            cantidad,
            saldo
            FROM movimientos order by id";

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

    public function getMovCuenta($idCuenta)
    {
        try {
            $sql = " 
            SELECT 
                m.id,
                m.id_cuenta,
                m.fecha_hora,
                m.concepto,
                m.tipo,
                m.cantidad,
                m.saldo,
                cu.num_cuenta
            FROM 
                movimientos as m inner join cuentas as cu on m.id_cuenta=cu.id 
            WHERE
                cu.id=:id;";

            $conexion = $this->db->connect();

            $result = $conexion->prepare($sql);

            $result->bindParam(':id', $idCuenta);
            //Establez como quiero q devuelva el resultado 

            $result->setFetchMode(PDO::FETCH_OBJ);

            // ejecuto
            $result->execute();
            return $result;

        } catch (PDOException $e) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }

    public function getAllCuentas()
    {
        try {
            $sql = "SELECT id, num_cuenta FROM cuentas";
            $conexion = $this->db->connect();
            $result = $conexion->prepare($sql);
            $result->setFetchMode(PDO::FETCH_OBJ);
            $result->execute();

            return $result->fetchAll();
        } catch (PDOException $e) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }

    public function create($mov)
    {
        try {
            $conexion = $this->db->connect();

            // Insertar en la tabla movimientos
            $sqlMovimientos = "INSERT INTO movimientos (id_cuenta, fecha_hora, concepto, tipo, cantidad) 
                            VALUES (:id_cuenta, :fecha_hora, :concepto, :tipo, :cantidad)";
            $pdoStMovimientos = $conexion->prepare($sqlMovimientos);

            $pdoStMovimientos->bindParam(":id_cuenta", $mov->id_cuenta, PDO::PARAM_INT);
            $pdoStMovimientos->bindParam(":fecha_hora", $mov->fecha_hora);
            $pdoStMovimientos->bindParam(":concepto", $mov->concepto, PDO::PARAM_STR);
            $pdoStMovimientos->bindParam(":tipo", $mov->tipo, PDO::PARAM_STR);
            $pdoStMovimientos->bindParam(":cantidad", $mov->cantidad, PDO::PARAM_INT);

            $pdoStMovimientos->execute();

            // Obtener el ID del último movimiento insertado
            $lastInsertId = $conexion->lastInsertId(); // Use lastInsertId directly

            // Actualizar la cuenta
            $sqlUpdateCuenta = "UPDATE cuentas 
                            SET saldo = saldo + :cantidad,
                                num_movtos = num_movtos + 1,
                                fecha_ul_mov = NOW(),
                                update_at = NOW() 
                            WHERE id = :id";
            $pdoStUpdateCuenta = $conexion->prepare($sqlUpdateCuenta);

            $pdoStUpdateCuenta->bindParam(":cantidad", $mov->cantidad, PDO::PARAM_INT);
            $pdoStUpdateCuenta->bindParam(":id", $mov->id_cuenta, PDO::PARAM_INT); 

            $pdoStUpdateCuenta->execute();

        } catch (PDOException $e) {
            // Deshacer la transacción en caso de error
            $conexion->rollBack();
            require_once("template/partials/errorDB.php");
            exit();
        } catch (Exception $e) {
            // Manejar la excepción específica, mostrar mensaje o redirigir al usuario
            echo $e->getMessage();
        }
    }


}