<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libro Seleccionado</title>
    <?php include "views/layouts/head.html" ?>


</head>

<body>
    <div class="container">
        <!-- cabecera documento -->
        <header class="pb-3 mb-4 border-bottom">
            <i class="bi bi-rocket-takeoff-fill"></i>
            <span class="fs-4">Proyecto 3.9 - Gestión de libros</span>

        </header>
        <legend>Tabla libros</legend>
        <table class="table">
            <thead>
                <!-- Encabezado Tabla -->
                <tr>
                    <!-- Personalizado -->
                    <th>Id</th>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Género</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($libros as $libro): ?>
                    <tr>
                        <!-- Mismo formato a cada campo de la Tabla -->
                        <?php foreach ($libro as $campo): ?>
                            <td>
                                <?= $campo ?>
                            </td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>

                <?php
                'views/layouts/footer.html';
                ?>
                <!-- javascript bootstrap 512 -->
                <?php
                include "views/layouts/javascript.html"; ?>
            </tbody>
        </table>
    </div>
</body>
</html>