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

        <legend>Resultado</legend>
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
                            <strong>
                                RESULTADO
                            </strong>
                        </td>
                        <td>
                            <?= $valorInicial ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"></th>
                        <td>
                            <strong>
                                <?= $cuenta ?>
                            </strong>
                        </td>
                        <td>
                            <?= $valor ?>
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