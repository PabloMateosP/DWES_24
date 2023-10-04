<?php

// Ejercicio 4: empty()

$var1 = null; //Valor vacío
var_dump(empty($var1));
echo "<BR>";

$var2 = 42; //Valor no vacío
var_dump(empty($var2));
echo "<BR>";

$var3 = "Pablo"; //Valor no vacío
var_dump(empty($var3));
echo "<BR>";

$var4 = false; //Valor vacío
var_dump(empty($var4));
echo "<BR>";

$var5 = 0; //Valor vacío
var_dump(empty($var5));
echo "<BR>";

$var6 = array(); //Valor no vacio 
var_dump(empty($var6));
echo "<BR>";

?>