<!DOCTYPE html>
<html lang="es">

<head>
    <?php include "views/plantilla/head.html" ?>
    <title>Proyecto 2.2 - Lanzamiento proyectiles</title>
</head>

<body>
    <!-- Capa principal -->
    <div class="container">
        <!-- cabecera documento -->
        <header class="pb-3 mb-4 border-bottom">
            <i class="bi bi-rocket-takeoff-fill"></i>
            <span class="fs-4">Proyecto 2.2 - Lanzamiento proyectiles</span>

        </header>

        <legend>Lanzamiento proyectiles</legend>
        <form method="POST">

            <!-- Velocidad inicial -->
            <div class="mb=3">
                <label class="form-label">Velocidad inicial</label>
                <input type="number" name="VelocidadInicial" class="form-control" placeholder=""
                    aria-activedescendant="helpId" step="0.01" value="0.00">
                <small id="helpId" class="text-muted">Velocidad en m/s</small>
            </div>

            <!-- Angulo lanzamiento -->
            <div class="mb=3">
                <label class="form-label">Angulo lanzamiento</label>
                <input type="number" name="AnguloLanzamiento" class="form-control" placeholder=""
                    aria-activedescendant="helpId" step="0.01" value="0.00">
                <small id="helpId" class="text-muted">Angulo en grados</small>
            </div>

            <!-- botones de acción -->
            <div class="btn-group" role="group">

                <button type="reset" class="btn btn-secondary">Borrar</button>
                <button type="submit" class="btn btn-warning" formaction="calcular.php">Calcular</button>

            </div>
        </form>

        <!-- pie del documento -->

        <?php 
            include "views/plantilla/footer.html";
        ?>
    </div>


    <!-- javascript bootstrap 512 -->
    <?php 
        include "views/plantilla/javascript.html";
    ?>
</body>

</html>