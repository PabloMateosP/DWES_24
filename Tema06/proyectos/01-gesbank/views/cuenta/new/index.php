<!DOCTYPE html>
<html lang="es">

<head>
    <!-- head -->
    <?php require_once("template/partials/head.php") ?>
    <title>
        <?= $this->title ?>
    </title>
</head>

<body>
    <!-- Menú Principal -->
    <?php require_once("template/partials/menu.php") ?>
    <br><br><br>

    <!-- Capa principal -->
    <div class="container">

        <!-- header -->
        <?php include 'template/partials/header.php' ?>

        <legend>Formulario Nuevo cuenta</legend>

        <!-- Formulario Nuevo Libro -->
        <form action="<?= URL ?>cuenta/create" method="POST">

            <!-- Número Cuenta -->
            <div class="mb-3">
                <label for="nombre" class="form-label">Número Cuenta</label>
                <input type="number" class="form-control" name="num_cuenta">
            </div>

            <!-- Cliente (mostramos lista desplegable)  -->
            <div class="mb-3">
                <label for="id_cliente" class="form-label">Asociar la cuenta a un cliente</label>
                <select class="form-select" aria-label="Default select example" type="number" name="id_cliente">
                    <option selected>Seleccione Cliente</option>
                    <?php foreach ($this->customers as $customer): ?>
                        <option value="<?= $customer->id ?>">
                            <?= $customer->cliente ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Saldo -->
            <div class="mb-3">
                <label for="saldo" class="form-label">Saldo</label>
                <input type="number" class="form-control" name="saldo" min="0" step="0.01">
            </div>


            <!-- botones de acción -->
            <a class="btn btn-secondary" href="<?= URL ?>cuenta" role="button">Cancelar</a>
            <button type="reset" class="btn btn-danger">Borrar</button>
            <button type="submit" class="btn btn-primary">Enviar</button>

        </form>

        <br>
        <br>
        <br>




        <!-- Pié del documento -->
        <?php include 'template/partials/footer.php' ?>

    </div>

    <!-- javascript bootstrap 532 -->
    <?php include 'template/partials/javascript.php' ?>
</body>

</html>