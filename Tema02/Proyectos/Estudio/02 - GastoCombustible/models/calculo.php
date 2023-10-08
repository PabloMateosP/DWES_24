<?php 

    //Declaramos varaibles para cada dato
    $kilometros = $_POST["kilometrosRecorrer"];
    $precioCombustible = $_POST["valorCombustible"];
    $consumo = $_POST["consumoCien"];
    
    $costeKilometrosDados = ($consumo * $kilometros) / 100;
    $costeTotal = $costeKilometrosDados * $precioCombustible;

?>