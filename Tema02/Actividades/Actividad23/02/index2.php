<?php

// Ejercicio 2: is_null()

$var1 = null; //valor nulo
var_dump(is_null($var1));

$var2 = 33; //valor no nulo
var_dump(is_null($var2));

$var3 = "Pablo"; //valor no nulo 
var_dump(is_null($var3));

$var4 = false; //valor nulo
var_dump(is_null($var4));

$var5 = 0; //valor nulo
var_dump(is_null($var5));

$var6 = array(); //valor no nulo
var_dump(is_null($var6));

?>