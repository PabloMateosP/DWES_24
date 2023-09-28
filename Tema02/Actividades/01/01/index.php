<!DOCTYPE html>
<html>
<head>
    <title>Mi Página</title>
</head>
<body>
    <?php
        $titulo = "Soy Pablo Mateos";
        $parrafo = "Este es un párrafo de al menos 3 líneas. \nSegunda línea del párrafo. \nTercera línea del párrafo";
    ?>

    <h1><?php echo $titulo; ?></h1>
    <p><?php echo $parrafo; ?></p>
    <a href="http://www.elpais.es" target="_blank">Enlace a El País</a>
</body>
</html>