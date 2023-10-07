<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto Estudio - Calculo Indice Masa Corporal</title>

    <!-- css bootstrap 532 -->
    <!-- Debemos unir con el archivo css bootstrap que será el que nos dará el estilo de página -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- icon bootstrap 1.11.1 -->
    <!-- Debemos conectar con el otro archivo para los iconos de la página -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

</head>

<body>

    <!-- Capa Principal -->
    <div class="container">

        <header class="pb-3 mb-4 border-bottom">
            <i class="bi bi-app-indicator"></i>
            <span class="fs-3">Proyecto Repaso IMC</span>
        </header>

        <h1>Proyecto Repaso - Indice Calculo Masa Corporal</h1>

        <legend>Calculo Indice Masa Corporal</legend>
        <table>
            <tr>
                <th>Valor Índice Masa Corporal: </th>
                <td>
                    <?= $imc ?>
                </td>
            </tr>

        </table>


        <!--  Botones de acción -->
        <div class="btn-group" role="group">
            <a class="btn btn-primary" href="index.html" role="button">Volver</a>
        </div>

    </div>


    <!-- Pie del documento -->
    <footer class="footer mt-auto py-3 fixed-bottom bg-light">
        <div class="container">
            <span class="text-muted">© 2022
                Pablo Mateos Palas - DWES - 2º DAW - Curso 23/24</span>
        </div>
    </footer>

    <!-- Bootstrap Javascript y popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

</body>

</html>