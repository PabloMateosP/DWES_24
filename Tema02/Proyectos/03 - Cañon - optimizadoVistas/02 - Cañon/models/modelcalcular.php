<?php

//Declaro la constante de la gravedad
define ("g",9.81);

//Obtenemos los valores del formulario
$velocidadInicial = $_POST["VelocidadInicial"];
$anguloLanzamiento = $_POST["AnguloLanzamiento"];
$radianes = deg2rad($anguloLanzamiento);

//Calculamos movimientos proyectil

$Vox =$velocidadInicial * cos($radianes);
$Voy =$velocidadInicial * sin($radianes);
$tiempo =2 * ($Voy / g);
$xMax =(pow($velocidadInicial,2) * sin($radianes * 2)) / g;
$yMax =(pow($velocidadInicial,2) * pow(sin($radianes),2)) / (2 * g);

//Formateo de resultados 

$radianes = number_format($radianes, 5, ",",".");
$Vox = number_format($Vox, 2,",",".");
$Voy = number_format($Voy, 2,",",".");
$xMax = number_format($xMax, 2,",",".");
$tiempo = number_format($tiempo, 2,",",".");
$yMax = number_format($yMax, 2,",",".");

?>