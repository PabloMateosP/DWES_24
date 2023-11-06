<?php 

    include ('class/class.vehiculo.php');

    $coche1 = new Vehiculo();


    //En este caso es mediante un coche con los parámetros en público,
    //si estos datos fueran privados, esto se debería hacer mediante setters y getters 

    $coche1 -> nombre = ('NissanGtr');
    $coche1 -> modelo = ('r34');
    $coche1 -> velocidad = ('240');
    $coche1 -> matricula = ('2456e');

    var_dump($coche1);

    // En este otro caso lo hacemos mediante unos datos privados
    $coche2 = new Vehiculo_privado();

    $coche2 -> setNombre = ('Citroen');
    $coche2 -> setModelo = ('C15');
    $coche2 -> setVelocidad = ('505050550505');
    $coche2 -> setMatricula = ('4562E');

    var_dump($coche2);

?>