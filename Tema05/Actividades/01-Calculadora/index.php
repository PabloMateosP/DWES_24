<?php

include('class/class.calculadora.php');

$Calculadora1 = new Calculadora();

$Calculadora1->setDato1(5);
$Calculadora1->setDato2(2);

$Calculadora1->suma();

var_dump($total);

?>