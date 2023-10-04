<?php
    $var = "13Pablo";

    //Conversión mediante funciones
    $var1 = strval($var);
    $var2 = intval($var);
    $var3 = floatval($var);

    //Muestra el tipo y valor 
    var_dump($var1);
    var_dump($var2);
    var_dump($var3);

    //Conversion variable
    $var1=(int) $var;
    $var2=(float) $var;
    $var3=(string) $var;

    //Muestra el tipo y valor
    var_dump($var1);
    var_dump($var2);
    var_dump($var3);

    //conversion mediante settype
    settype($var1, "integer");
    settype($var2, "float");
    settype($var3, "string");

    //Muestra el tipo y valor
    var_dump($var1);
    var_dump($var2);
    var_dump($var3);

?>