<!DOCTYPE html>
<html lang="es">

<head>
    <!-- head -->
    <?php require_once("template/partials/head.php"); ?>
    <title>Home Clientes</title>
</head>

<body>
    <div class="container" style="padding-top: 2%;">
        <!-- menu fijo superior -->
        <?php require_once "template/partials/menu.php"; ?>
        <!-- cabecera  -->
        <?php include "views/clientes/partials/header.php" ?>

        <!-- Mensajes -->
        <?php include "template/partials/notify.php" ?>
        <!-- Errores -->
        <?php include "template/partials/error.php" ?>


        <!-- Bootstrap Card for Clients Table -->
        <div class="card">
            <div class="card-header">
                Tabla de clientes
            </div>
            <div class="card-header">
                <?php require_once "views/clientes/partials/menu.php"; ?>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Cliente</th>
                            <th>Email</th>
                            <th>Telefono</th>
                            <th>Ciudad</th>
                            <th>DNI</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($this->clientes as $cliente): ?>
                        <tr>
                            <td>
                                <?= $cliente->id ?>
                            </td>
                            <td>
                                <?= $cliente->cliente ?>
                            </td>
                            <td>
                                <?= $cliente->email ?>
                            </td>
                            <td>
                                <?= $cliente->telefono ?>
                            </td>
                            <td>
                                <?= $cliente->ciudad ?>
                            </td>
                            <td>
                                <?= $cliente->dni ?>
                            </td>
                            <td>
                                <!-- botones de acción -->
                                <a href="<?= URL ?>clientes/delete/<?= $cliente->id ?>" title="Eliminar"
                                    onclick="return confirm('¿Quieres Borrar?')">
                                    <i class="bi bi-trash"></i>
                                </a>

                                <a href="<?= URL ?>clientes/editar/<?= $cliente->id ?>" title="Editar">
                                    <i class="bi bi-pencil-square"></i>
                                </a>

                                <a href="<?= URL ?>alumno/mostrar/<?= $cliente->id ?>" title="Mostrar">
                                    <i class="bi bi-card-text"></i></a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                
            </div>
            <div class="card-footer">
                Nº de clientes: <?= $this->clientes->rowCount() ?>
            </div>

            <!-- footer -->
            <?php require_once "template/partials/footer.php" ?>

            <!-- Bootstrap JS y popper -->
            <?php require_once "template/partials/javascript.php" ?>
</body>

</html>