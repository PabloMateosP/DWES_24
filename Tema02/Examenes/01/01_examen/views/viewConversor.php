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

        <legend>Resultados de Conversión</legend>
        <form method="">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row"></th>
                        <td>
                            <strong>DECIMAL</strong>
                        </td>
                        <td>
                            <?= $valorInicial2 ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"></th>
                        <td>
                            <strong>BINARIO</strong>
                        </td>
                        <td>
                            <?= $valorBinario2 ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"></th>
                        <td>
                            <strong>OCTAL</strong>
                        </td>
                        <td>
                            <?= $valorOctal2 ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"></th>
                        <td>
                            <strong>HEXADECIMAL</strong>
                        </td>
                        <td>
                            <?= $valorHexadecimal2 ?>
                        </td>
                    </tr>
                </tbody>
            </table>
            <br>
            <!-- Botón volver -->
            <div class="btn-group" role="group">
                <a class="btn btn-primary" href="index.php" role="button">VOLVER</a>
            </div>
        </form>
        <!-- Pié del documento -->
        <?php include 'views/layouts/footer.html' ?>
    </div>
    <!-- javascript bootstrap 532 -->
    <?php include 'views/layouts/javascript.html' ?>
</body>
</html>