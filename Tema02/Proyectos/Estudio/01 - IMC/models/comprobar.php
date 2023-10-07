<?php 

    //Declaramos variables para el peso y altura
    $peso = $_POST["pesoPersona"];
    $altura = $_POST["alturaPersona"];
    $imc = $peso / pow($altura, 2);

?>