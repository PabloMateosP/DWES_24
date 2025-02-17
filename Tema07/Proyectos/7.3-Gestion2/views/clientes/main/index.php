<!DOCTYPE html>
<html lang="es">

<head>
    <!-- head -->
    <?php require_once("template/partials/head.php"); ?>
    <title>Clientes - Gesbank</title>
</head>

<body>
    <div class="container" style="padding-top: 2%;">
        <!-- menu fijo superior -->
        <?php require_once "template/partials/menuAut.php"; ?>
        <!-- cabecera  -->
        <?php include "views/clientes/partials/header.php" ?>

        <!-- Mensajes -->
        <?php include "template/partials/notify.php" ?>
        <!-- Errores -->
        <?php include "template/partials/error.php" ?>
        <!-- Menu principal -->
        <?php require_once "views/clientes/partials/menu.php" ?>
        <!-- tabla clientes -->
        <table class="table">
            <thead>
                <tr>
                    <th>Id </th>
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
                            <td><?= $cliente->id ?></td>
                            <td><?= $cliente->cliente ?></td>
                            <td><?= $cliente->email ?></td>
                            <td><?= $cliente->telefono ?></td>
                            <td><?= $cliente->ciudad ?></td>
                            <td><?= $cliente->dni ?></td>
                            <td>
                                <!-- botones de acción -->
                                <a href="<?= URL ?>clientes/delete/<?= $cliente->id ?>" title="Eliminar"
                                    onclick="return confirm('¿Quieres Borrar?')" Class="btn btn-danger
                                            <?= (!in_array($_SESSION['id_rol'], $GLOBALS['clientes']['delete'])) ?
                                                'disabled' : null ?>"> <i class="bi bi-trash"></i> </a>

                                <a href="<?= URL ?>clientes/editar/<?= $cliente->id ?>" title="Editar" Class="btn btn-primary
                                            <?= (!in_array($_SESSION['id_rol'], $GLOBALS['clientes']['edit'])) ?
                                                'disabled' : null ?>"> <i class="bi bi-pencil"></i> </a>
                                <a href="<?= URL ?>clientes/mostrar/<?= $cliente->id ?>" title="Mostrar" Class="btn btn-primary
                                            <?= (!in_array($_SESSION['id_rol'], $GLOBALS['clientes']['show'])) ?
                                                'disabled' : null ?>"> <i class="bi bi-eye"></i> </a>
                            </td>
                        </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="8">Nº Registros: <?= $this->clientes->rowCount() ?> </td>
                </tr>
            </tfoot>

        </table>

    </div>

    <!-- footer -->
    <?php require_once "template/partials/footer.php" ?>

    <!-- Bootstrap JS y popper -->
    <?php require_once "template/partials/javascript.php" ?>
</body>

</html>