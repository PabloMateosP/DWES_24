<?php 

    /**
     * Controlador index.php
     * Muestra los detalles de los alumnos ordenados
     */

    // Cargamos libreria
    include 'class/class.conexion.php';
    include 'class/class.fp.php';

    //Cargamos modelo
    include "models/model.index.php";

    //Cargamos vista
    include "views/view.index.php";
    
?>