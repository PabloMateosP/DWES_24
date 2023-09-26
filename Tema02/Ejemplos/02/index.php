<?php $usuario = "Pablo Mateos" ?>
//Esto no se debe de hacer ya que se liga php con html
//Se puede poner 1 o 2 líneas pero no abusar de ellas
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <center>
        <h2>Ejemplo 2 - Tema 2</h2>
    </center>
    <h4>
        <?php
        echo "Hola Mundo";
        echo "<br>";
        echo "Soy $usuario";
        ?>
    </h4>
</body>

</html>