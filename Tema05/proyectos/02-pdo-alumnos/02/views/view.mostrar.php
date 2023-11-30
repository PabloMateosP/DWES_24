<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'views/layouts/head.html' ?>
    <title>Proyecto 5.1 - Gestión Alumnos</title>
</head>

<body>
    <!-- Capa principal -->
    <div class="container">

        <!-- cabecera documento -->
        <?php include 'views/partials/header.php' ?>

        <legend>Mostrar Alumno</legend>
        <hr>

        <!-- Notificación -->
        <?php include 'views/partials/notificacion.php' ?>

        <form >
            <div class="mb-3">
                <label class="form-label">Id</label>
                <input type="number" class="form-control" value="<?=$alumno->id?>">
            </div>
            <!-- Nombre -->
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" class="form-control" value="<?=$alumno->nombre?>">
            </div>
            <!-- Email -->
            <div class="mb-3">
                <label class="form-label">Correo Electronico</label>
                <input type="email" class="form-control" value="<?=$alumno->email?>">
            </div>
            <!-- Telefono -->
            <div class="mb-3">
                <label class="form-label">Télefono</label>
                <input type="number" class="form-control" value="<?=$alumno->telefono?>">
            </div>
            <!-- Población -->
            <div class="mb-3">
                <label class="form-label">Población</label>
                <input type="text" class="form-control" value="<?=$alumno->poblacion?>">
            </div>
            <!-- DNI -->
            <div class="mb-3">
                <label class="form-label">DNI</label>
                <input type="text" class="form-control" value="<?=$alumno->dni?>">
            </div>
            <!-- Edad -->
            <div class="mb-3">
                <label class="form-label">Edad</label>
                <input type="text" class="form-control" value="<?=$alumno->fechaNac?>">
            </div>
            <!-- Curso -->
            <div class="mb-3">
                <label class="form-label">Curso</label>
                <input type="text" class="form-control" value="<?=$alumno->id_curso?>">
            </div>

            <div class="mb-3">
                <a class="btn btn-secondary" href="index.php" role="button">Volver</a>
            </div>
        </form>
        
        <?php $conexion->cerrar_conexion(); $alumnos = null; ?>


        <!-- Pié del documento -->
        <?php include 'views/partials/footer.php' ?>

    </div>

    <!-- javascript bootstrap 532 -->
    <?php include 'views/layouts/javascript.html' ?>
</body>

</html>