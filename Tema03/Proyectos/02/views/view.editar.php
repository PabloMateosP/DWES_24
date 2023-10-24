<!DOCTYPE html>
<html lang="es">

<head>
    <?php include "views/layouts/head.html" ?>
</head>

<body>
    <!-- Capa principal -->
    <div class="container">
        <!-- cabecera documento -->
        <?php include "views/partials/header.php"?>
        
        <legend>Formulario Edicion Articulo</legend>

        <form action="update.php?id=<?= $id ?>" method="POST">
        
            <div class="mb-3">
                <label for="titulo" class="form-label">Id</label>
                <input type="text" class="form-control" name="id" value="<?= $articulo['id'] ?>" readonly>
            </div>

            <div class="mb-3">
                <label for="titulo" class="form-label">Descripción</label>
                <input type="text" class="form-control" name="descripcion" value="<?= $articulo['descripcion'] ?>">
            </div>
            
            <div class="mb-3">
                <label for="autor" class="form-label">Modelo</label>
                <input type="text" class="form-control" name="modelo" value="<?= $articulo['modelo'] ?>">
            </div>
            
            <div class="mb-3">
                <label for="genero" class="form-label">Categoría</label>
                <input type="text" class="form-control" name="categoria" value="<?= $articulo['categoria'] ?>">
            </div>
            
            <div class="mb-3">
                <label for="precio" class="form-label">Unidades</label>
                <input type="number" class="form-control" name="unidades" step="0.01" value="<?= $articulo['unidades'] ?>">
            </div>

            <div class="mb-3">
                <label for="precio" class="form-label">Precio</label>
                <input type="number" class="form-control" name="precio" step="0.01" value="<?= $articulo['precio'] ?>">
            </div>


            <a class="btn btn-secondary" href="index.php" role="button">Cancelar</a>
            <button type="reset" class="btn btn-danger">Borrar</button>
            <button type="submit" class="btn btn-primary">Actualizar</button>

        </form>

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