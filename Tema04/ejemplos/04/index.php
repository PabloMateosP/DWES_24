<?php

include('class/class.vehiculo.php');

// En este otro caso lo hacemos mediante unos datos privados
$coche2 = new Vehiculo_privado('Honda', 'Civic Type R', 250, '4561D');

var_dump($coche2);

?>