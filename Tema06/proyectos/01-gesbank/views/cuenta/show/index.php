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
    <br>
    <br>
    <br>

    <!-- Capa principal -->
    <div class="container">

        <!-- header -->
        <?php include 'template/partials/header.php' ?>

        <legend>Mostrar Cuenta</legend>

        <!-- Mostrar cuenta -->
        <form>

            <!-- id oculto -->
            <input type="number" class="form-control" name="id" value="<?= $this->cuenta->id?>" disabled>

            <!-- Número de cuenta -->
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" value="<?=$this->cuenta->num_cuenta?>" disabled>
            </div>

            <!-- Id del cliente -->
            <div class="mb-3">
                <label for="apellidos" class="form-label">Apellidos</label>
                <input type="text" class="form-control" name="apellidos" value="<?=$this->cuenta->cliente?>" disabled>
            </div>

            <!-- Fecha Alta -->
            <div class="mb-3">
                <label for="ciudad" class="form-label">Ciudad</label>
                <input type="text" class="form-control" name="ciudad" value="<?=$this->cuenta->fecha_alta?>" disabled>
            </div>

            <!-- Fecha último movimiento -->
            <div class="mb-3">
                <label for="dni" class="form-label">Dni</label>
                <input type="text" class="form-control" name="dni" value="<?=$this->cuenta->fecha_last_move?>" disabled>
            </div>

            <!-- Número Movimiento -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="<?=$this->cuenta->num_move?>" disabled>
            </div>

            <!-- Saldo -->
            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="tel" class="form-control" name="telefono" value="<?=$this->cuenta->saldo?>" disabled>
            </div>

            <!-- botones de acción -->
            <a class="btn btn-secondary" href="<?= URL ?>cuenta" role="button">Volver</a>

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