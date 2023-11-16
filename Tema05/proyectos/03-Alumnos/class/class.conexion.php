<?php

/*
 *
 * Clase conexión mediante mysqli
 * 
 */

class Conexion
{

    public $db;

    public function __construct()
    {
        try {
            //Creamos la conexión a la base de datos
            $this->db = new mysqli("localhost", "root", "", "fp");
            if($this->db->connect_error){
                throw new Exception('Error: ' . $this->db->connect_errno);
            }

        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
            echo "<br>";
            echo "Código: " . $e->getCode();
            echo "<br>";
            echo "Fichero: " . $e->getFile();
            echo "<br>";
            echo "Línea: " . $e->getLine();
            echo "<br>";

            exit();
        }

    }

}

?>