<!DOCTYPE html>
<html lang="es">

<head>

    <?php include "views/layouts/head.html" ?>

</head>

<body>
    <!-- Capa principal -->
    <div class="container">
        <!-- cabecera documento -->
        <?php include "views/partials/header.php" ?>

        <legend>Tabla Artículos</legend>

        <?php
        include 'views/partials/menu_prin.php';
        ?>

        <?php
        include 'views/partials/notificacion.php';
        ?>

        <table class="table">
            <thead>
                <!-- Encabezado Tabla -->
                <tr>

                    <!-- Personalizado -->
                    <th>Id</th>
                    <th>Alumno</th>
                    <th class="text-end">Edad</th>
                    <th>DNI</th>
                    <th>Población</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Curso</th>
                    <th>Acciones</th>

                </tr>
            </thead>
            <tbody>

                <?php foreach ($alumnos as $alumno): ?>
                    <tr>

                        <td>
                            <?= $alumno['id'] ?>
                        </td>
                        <td>
                            <?= $alumno['alumno'] ?>
                        </td>
                        <td>
                            <?= $alumno['edad'] ?>
                        </td>
                        <td>
                            <?= $alumno['dni'] ?>
                        </td>
                        <td>
                            <?= $alumno['poblacion'] ?>
                        </td>
                        <td>
                            <?= $alumno['email'] ?>
                        </td>
                        <td>
                            <?= $alumno['telefono'] ?>
                        </td>
                        <td>
                            <?= $alumno['curso'] ?>
                        </td>

                        <td>
                            <!-- botón  eliminar -->
                            <a href="eliminar.php?indice=<?= $indice ?>" title="Eliminar">
                                <i class="bi bi-trash-fill"></i></a>

                            <!-- botón  editar -->
                            <a href="editar.php?indice=<?= $indice ?>" title="Editar">
                                <i class="bi bi-pencil-square"></i></a>

                            <!-- botón  mostrar -->
                            <a href="mostrar.php?indice=<?= $indice ?>" title="Mostrar">
                                <i class="bi bi-card-text"></i></a>
                        </td>

                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <!-- <td colspan="7">Nº Alumnos
                            <//?= $alumnos->num_rows ?>
                        </td> -->
                    </tr>
                </tfoot>
            <?php endforeach; ?>

        </table>

    </div>

    <?php
    'views/partials/footer.html';
    ?>
    <!-- javascript bootstrap 512 -->
    <?php
    include "views/layouts/javascript.html";
    ?>
</body>

</html>