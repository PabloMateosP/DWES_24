<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista Alumnos.php</title>
</head>

<body>


    <h1>Vista Main alumnos.php</h1>

    <?php

        foreach($this->alumnos as $alumno) {
            var_dump($alumno);
        }

    ?>

</body>

</html>