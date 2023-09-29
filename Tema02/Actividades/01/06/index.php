<!DOCTYPE html>
<html>
<style>
table {
  border-spacing: 0;
  width: 100%;
  border: 4px solid black;
} 
th, td {
  text-align: left;
  padding: 16px;
}
</style>
<head>
    <title>-Datos Alumno-</title>
</head>
<body>
    <?php
        $nombre = "Pablo";
        $apellidos = "Mateos Palas";
        $poblacion = "Prado Del Rey";
        $edad = 19;
        $ciclo = "DAW";
        $curso = 2;
        $modulo = "Desarrollo Web en Entorno Servidor";

        echo "<h1>Información Personal</h1>";
        //Creamos la tabla 
        echo "<table border='2'>";

        echo "<tr><td>Nombre</td><td> $nombre</td></tr>";

        echo "<tr><td>Apellidos</td><td> $apellidos</td></tr>";

        echo "<tr><td>Población</td><td> $poblacion</td></tr>";

        echo "<tr><td>Edad</td><td> $edad</td></tr>";

        echo "<tr><td>Ciclo</td><td> $ciclo</td></tr>";

        echo "<tr><td>Curso</td><td> $curso</td></tr>";

        echo "<tr><td>Módulo</td><td> $modulo</td></tr>";

        echo "</table>";
    ?>
</body>
</html>