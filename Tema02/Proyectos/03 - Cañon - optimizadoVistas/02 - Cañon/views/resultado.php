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

        <legend>Formulario Lanzamiento proyectiles</legend>
        <table class="table">
            <tbody>
                <tr>
                    <th>Valores Iniciales:</th>
                    <td></td>

                </tr>
                <tr>
                    <td>Velocidad inicial</td>
                    <td>
                        <?= $velocidadInicial ?> m/s
                    </td>
                </tr>
                <tr>
                    <td>Angulo Lanzamiento</td>
                    <td>
                        <?= $anguloLanzamiento ?> º
                    </td>
                </tr>
                <tr>
                    <th>Resultados:</th>
                    <td></td>

                </tr>
                <tr>
                    <td>Angulo Radianes</td>
                    <td>
                        <?= $radianes ?> Radianes
                    </td>
                </tr>
                <tr>
                    <td>Velocidad inicial X</td>
                    <td>
                        <?= $Vox ?> m/s
                    </td>
                </tr>
                <tr>
                    <td>Velocidad inicial Y</td>
                    <td>
                        <?= $Voy ?> m/s
                    </td>
                </tr>
                <tr>
                    <td>Alcance Maximo</td>
                    <td>
                        <?= $xMax ?> m
                    </td>
                </tr>
                <tr>
                    <td>Tiempo de Vuelo</td>
                    <td>
                        <?= $tiempo ?> s
                    </td>
                </tr>
                <tr>
                    <td>Altura Maxima</td>
                    <td>
                        <?= $yMax ?> m
                    </td>
                </tr>
            </tbody>
        </table>
        <!-- botones de acción -->
        <div class="btn-group" role="group">

            <a class="btn btn-primary" href="index.php" role="button">Volver</a>
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