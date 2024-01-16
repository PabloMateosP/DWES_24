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

        <legend>Formulario Editar Cuenta</legend>

        <!-- Formulario Editar cuenta -->
        <form action="<?= URL ?>cuenta/update/<?= $this->cuenta->id ?>" method="POST">

            <!-- id oculto -->
            <input type="number" class="form-control" name="id" value="<?= $this->cuenta->id ?>" hidden>

            <!-- Núm Cuenta -->
            <div class="mb-3">
                <label for="num_cuenta" class="form-label">Número cuenta</label>
                <input type="text" class="form-control" name="num_cuenta" value="<?=$this->cuenta->num_cuenta?>">
            </div>

            <!-- Cliente -->
            <div class="mb-3">
                <label for="cliente" class="form-label">Cliente</label>
                <input type="text" class="form-control" name="cliente" value="<?=$this->cuenta->cliente?>">
            </div>

            <!-- Cliente (mostramos lista desplegable)  -->
            <div class="mb-3">
                <label for="id_cliente" class="form-label">Asociar la cuenta a un cliente</label>
                <select class="form-select" aria-label="Default select example" type="number" name="id_cliente">
                    <option selected>Seleccione Cliente</option>
                    <?php foreach ($this->cuenta as $customer): ?>
                        <option value="<?= $customer->id ?>">
                            <?= $customer->cliente ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Fecha Alta -->
            <div class="mb-3">
                <label for="fecha_alta" class="form-label">Fecha Alta</label>
                <input type="date" class="form-control" name="fecha_alta" value="<?=$this->cuenta->fecha_alta?>">
            </div>

            <!-- fecha_ul_mov -->
            <div class="mb-3">
                <label for="fecha_ul_mov" class="form-label">Fecha Últ.Movimiento</label>
                <input type="date" class="form-control" name="fecha_ul_mov" value="<?=$this->cuenta->fecha_ul_mov?>">
            </div>

            <!-- Núm Movtos -->
            <div class="mb-3">
                <label for="num_movtos" class="form-label">Núm Movimientos</label>
                <input type="number" class="form-control" name="num_movtos" value="<?=$this->cuenta->num_movtos?>">
            </div>
            <!-- Saldo -->
            <div class="mb-3">
                <label for="saldo" class="form-label">Saldo</label>
                <input type="number" class="form-control" name="saldo" value="<?=$this->cuenta->saldo?>">
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