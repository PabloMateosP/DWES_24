<?php

//Calificación de una nota de 0 a 10
$a = 1;

if ($a < 5 ) {
    echo "Insuficiente";
} elseif ($a < 6) {
    echo "Suficiente";
} elseif ($a < 7){
    echo "Bien";
} elseif ($a < 9){
    echo "Notable";
} else {
    echo "Sobresaliente";
}

?>