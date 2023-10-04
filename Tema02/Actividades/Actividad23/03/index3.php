<?php
// Ejercicio 3: isset()

$var1 = null; //valor no definido
var_dump(isset($var1));
echo "<BR>";

$var2 = 33; //valor definido
var_dump(isset($var2));
echo "<BR>";

$var3 = "Pablo"; //valor definido
var_dump(isset($var3));
echo "<BR>";

$var4 = false; //valor no definido
var_dump(isset($var4));
echo "<BR>";

$var5 = 0; //valor no definido
var_dump(isset($var5));
echo "<BR>";

$var6 = array(); //valor definido
echo "Valor:  + $var ";
var_dump(isset($var6));
echo "<BR>";

?>