<!DOCTYPE html>
<html lang="es">

<head>
    <!-- head -->
    <?php require_once("template/partials/head.php"); ?>
    <title>Movimientos - GESBANK</title>
</head>

<body>
    <div class="container" style="padding-top: 2%;">
    <?php require_once "template/partials/menuAut.php"; ?>
    <!-- cabecera o titulo -->
    <?php include "views/cuentas/partials/header.php" ?>
    <!-- Menu principal -->
    <?php require_once "views/movimientos/partials/menu.php" ?>

        <?php require_once "template/partials/mensaje.php" ?>

        <table class="table">
            <thead>
                <tr>
                    <th>Id mov</th>
                    <th>Nº Cuenta</th>
                    <th>Fecha</th>
                    <th>Concepto</th>
                    <th>Tipo</th>
                    <th>Cantidad</th>
                    <th>Saldo</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($this->movimientos as $movimiento) : ?>
                    <tr>
                        <td><?= $movimiento->id ?></td>
                        <td><?= $movimiento->id_cuenta ?></td>
                        <td><?= $movimiento->fecha_hora ?></td>
                        <td><?= $movimiento->concepto ?></td>
                        <td><?= $movimiento->tipo ?></td>
                        <td><?= $movimiento->cantidad ?></td>
                        <td><?= $movimiento->saldo ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="7">Nº Registros: <?= $this->movimientos->rowCount() ?> </td>
                </tr>
            </tfoot>
        </table>

    </div>

    <?php require_once "template/partials/footer.php" ?>

    <?php require_once "template/partials/javascript.php" ?>

</body>

</html>
