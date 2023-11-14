<?php 

    /**
     * 
     * 127.0.0.1:3306
     * Conexión localhost con usuario root a la base de datos fp
     * 
     * - Conexión mediante la clase 
     * - Retorna en un array asociativo
     * 
     * Las propiedades y métodos de la clase msqli aparecen en 'https://www.php.net/manual/es/class.mysqli.php' en el manual
     * 
     */

    $servidor = 'localhost';
    $user = 'root';
    $password = '';
    $bd = 'fp';

    # Conexión mediante la clase mysqli
    $conexion = new mysqli($servidor, $user, $password, $bd);

    # Connect_errno y connect_error son propiedades de la clase
    if ($conexion -> connect_errno){

        echo 'Error de conexión Nº: '. $conexion -> connect_errno;
        echo '<br>';
        echo 'Error en la conexión'. $conexion -> connect_error;
        exit();
        
    }

    echo 'Conexión establecida con éxito';

    # Creamos variable para la ejecución de comando sql
    $sql = 'select * from alumnos order by id';

    # Con el método query devolvemos un objeto de la clase msqli_result
    $result = $conexion->query($sql);

    echo '<br>';
    echo 'Número de resgistros: '. $result->num_rows;
    echo '<br>';
    echo 'Número de columnas: '. $result->field_count;
    echo '<br>';

    $alumnos = $result -> fetch_all(MYSQLI_ASSOC); 
    /* 
     * Constante MSQLI_ASSOC con la cual se le indica la forma que extraeremos los datos,
     * en este caso, mediante un array ASOCIATIVO.
    */

    foreach ($alumnos as $alumno) {
        print_r($alumno);
        echo '<br>';
    }

?>