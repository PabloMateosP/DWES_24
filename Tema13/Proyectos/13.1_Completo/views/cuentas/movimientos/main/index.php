<!DOCTYPE html>
<html lang="es">

<head>
    <!-- head -->
    <?php require_once("template/partials/head.php"); ?>
    <title>Movimientos Cuentas - GESBANK</title>
</head>

<body>
    <!-- menú principal superior -->
    <?php require_once "template/partials/menu.php"; ?>
    <div class="container" style="padding-top: 2%;">
    <?php include "views/clientes/partials/header.php" ?>
    
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
                        <td><?= $movimiento->num_cuenta ?></td>
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
