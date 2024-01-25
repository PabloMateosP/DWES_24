<!DOCTYPE html>
<html lang="es">

<head>
    <!-- bootstrap  -->
    <?php require_once("template/partials/head.php");  ?>

    <title>Editar Cliente · Gesbank</title>
</head>

<body>
    <!-- menú principal -->
    <?php require_once "template/partials/menuAut.php"; ?>
    <!-- capa principal -->
    <div class="container">
        <!-- cabecera  -->
        <?php include "views/clientes/partials/header.php" ?>
        <!-- Mostramos el Mensaje en caso de error -->
        <?php include("template/partials/error.php") ?>
        <!-- Formulario -->
        <form action="<?= URL ?>clientes/update/<?= $this->id ?>" method="POST">
            <!-- nombre -->
            <div class="mb-3">
                <label for="" class="form-label">Nombre</label>
                <input type="text" class="form-control <?= (isset($this->errores['nombre']))? 'is-invalid': null ?>"
                    name="nombre" value="<?= $this->cliente->nombre ?>">
                <!-- Mostrar posible error -->
                <?php if (isset($this->errores['nombre'])): ?>
                <span class="form-text text-danger" role="alert">
                    <?= $this->errores['nombre'] ?>
                </span>
                <?php endif; ?>
            </div>
            <!-- apellidos -->
            <div class="mb-3">
                <label for="" class="form-label">Apellidos</label>
                <input type="text" class="form-control <?= (isset($this->errores['apellidos']))? 'is-invalid': null ?>"
                    name="apellidos" value="<?= $this->cliente->apellidos ?>">
                <!-- Mostrar posible error -->
                <?php if (isset($this->errores['apellidos'])): ?>
                <span class="form-text text-danger" role="alert">
                    <?= $this->errores['apellidos'] ?>
                </span>
                <?php endif; ?>
            </div>
            <!-- ciudad -->
            <div class="mb-3">
                <label for="" class="form-label">Ciudad</label>
                <input type="text" class="form-control <?= (isset($this->errores['ciudad']))? 'is-invalid': null ?>"
                    name="ciudad" value="<?= $this->cliente->ciudad ?>">
                <!-- Mostrar posible error -->
                <?php if (isset($this->errores['ciudad'])): ?>
                <span class="form-text text-danger" role="alert">
                    <?= $this->errores['ciudad'] ?>
                </span>
                <?php endif; ?>
            </div>
            <!-- email -->
            <div class="mb-3">
                <label for="" class="form-label">Email</label>
                <input type="email" class="form-control <?= (isset($this->errores['email']))? 'is-invalid': null ?>"
                    name="email" id="" value="<?= $this->cliente->email ?>">
                <!-- Mostrar posible error -->
                <?php if (isset($this->errores['email'])): ?>
                <span class="form-text text-danger" role="alert">
                    <?= $this->errores['email'] ?>
                </span>
                <?php endif; ?>
            </div>
            <!-- telefono -->
            <div class="mb-3">
                <label for="" class="form-label">Telefono</label>
                <input type="text" class="form-control <?= (isset($this->errores['telefono']))? 'is-invalid': null ?>"
                    name="telefono" id="" value="<?= $this->cliente->telefono ?>">
                <!-- Mostrar posible error -->
                <?php if (isset($this->errores['telefono'])): ?>
                <span class="form-text text-danger" role="alert">
                    <?= $this->errores['telefono'] ?>
                </span>
                <?php endif; ?>
            </div>
            <!-- dni -->
            <div class="mb-3">
                <label for="" class="form-label">DNI</label>
                <input type="text" class="form-control <?= (isset($this->errores['dni']))? 'is-invalid': null ?>"
                    name="dni" id="" value="<?= $this->cliente->dni ?>">
                <!-- Mostrar posible error -->
                <?php if (isset($this->errores['dni'])): ?>
                <span class="form-text text-danger" role="alert">
                    <?= $this->errores['dni'] ?>
                </span>
                <?php endif; ?>
            </div>
            <!-- botones de acción -->
            <div class="mb-3">
                <a name="" id="" class="btn btn-secondary" href="<?= URL ?>clientes" role="button">Cancelar</a>
                <button type="button" class="btn btn-danger">Borrar</button>
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </form>
    </div>

    <br><br><br>

    <!-- footer -->
    <?php require_once "template/partials/footer.php" ?>

    <!-- Bootstrap JS y popper -->
    <?php require_once "template/partials/javascript.php" ?>
</body>

</html>