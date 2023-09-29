<!DOCTYPE html>
<html>
<head>
    <title>Mi Página</title>
</head>
<body>
    <?php
        $titulo = "Soy Pablo Mateos";
        $parrafo = "Este es un párrafo de al menos 3 líneas. <BR>Segunda línea del párrafo. <BR>Tercera línea del párrafo";
        
    ?>

    <h1><?php echo $titulo; ?></h1>
    <p><?php echo $parrafo; ?></p>
    <a href="http://www.elpais.es" target="_blank">Enlace a El País</a>
    <?php echo '<img src="C:\Users\usuario\Pictures\Saved Pictures\fondo pantalla.jpg" width="100px" height="100px">';?>
</body>
</html>