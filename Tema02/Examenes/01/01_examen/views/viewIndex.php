<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Incluir head -->
    <title>Formulario Conversor</title>

    <!-- Añadimos el php include para el css bootstrap -->
    <?php 
        include "layouts/head.html";
    ?>
    
</head>
<body>
    <!-- Capa principal -->
    <div class="container">

        <!-- cabecera documento -->
        <header class="pb-3 mb-4 border-bottom">
            <i class="bi bi-calculator"></i>
            <span class="fs-6"></span>   
        </header>

        <legend>Formulario  Conversor</legend>
        <form method="post">
        
            <!-- Valor Decimal -->
            <div class="form-group">
                <label for="velInicial"></label>
                <p>Valor Decimal:</p>
                <input type="number" name="valInicial" class="form-control" placeholder="" aria-describedby="helpId">
                <small id="helpId" class="text-muted"></small>
            </div>

            <br>
            
            <!-- Botones de acción -->
            <button type="reset" class="btn btn-secondary">BORRAR</button>

            <div class="btn-group" role="group" >
                <button type="submit" class="btn btn-warning" formaction="binario.php">BINARIO</button>
                <button type="submit" class="btn btn-success" formaction="octal.php">OCTAL</button>
                <button type="submit" class="btn btn-danger" formaction="hexadecimal.php">HEXADECIMAL</button>
            </div>

            <button type="submit" class="btn btn-primary" formaction="conversor.php">TODAS</button>
            
        </form>

        <!-- Pié del documento -->
        <?php include 'views/layouts/footer.html' ?>
        
    </div>

    <!-- javascript bootstrap 532 -->
    <?php include 'views/layouts/javascript.html' ?>
</body>
</html>