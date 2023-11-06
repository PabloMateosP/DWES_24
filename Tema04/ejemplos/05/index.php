<?php

include('class/class.vehiculo.php');
// Siempre debemos cargar la clase padre antes que la hija 
include('class/class.deportivo.php');

// Vemos como Deportivo al heredar de Vehiculo, también hereda el constructor
$coche1 = new Deportivo('Honda', 'Civic Vtec', 195, '3421G', 1200, 150000);

var_dump($coche1);

$coche2 = new Vehiculo_privado('Honda', 'Civic Type R', 250, '4561D');

var_dump($coche2);

?>