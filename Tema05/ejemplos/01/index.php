<?php 

    /**
     * 
     * 127.0.0.1:3306
     * Conexión localhost con usuario root
     * a la base de datos fp
     * - Conexión mediante mysqli_connect()
     * 
     */

    $servidor = 'localhost';
    $user = 'root';
    $password = '';
    $bd = 'fp123';

    # Conexión
    $conexion = mysqli_connect($servidor, $user, $password, $bd);

    if (mysqli_connect_errno()){

        echo 'Error de conexión Nº: '. mysqli_connect_errno();
        echo '<br>';
        echo 'Error en la conexión'. mysqli_connect_error();
        exit();
        
    }

    echo 'Conexión establecida con éxito';

?>