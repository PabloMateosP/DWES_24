<?php 

    /**
     * 
     * Clase Conexion
     * 
     */

     Class Conexion {

        protected $pdo;

        public function __construct() {

            $dns = "mysql:host=" . SERVER . ";dbname=" . BD;

        }
     }



?>