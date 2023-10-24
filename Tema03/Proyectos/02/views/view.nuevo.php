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

        <legend>Formulario Nuevo Articulo</legend>

        <form method="post">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="id">
                <label for="idArticulo" class="form-label">Id:</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="descripcion">
                <label for="descripcionArticulo" class="form-label">Descripcion:</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="modelo">
                <label for="modeloaArticulo" class="form-label">Modelo</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="categoria">
                <label for="categoriaArticulos" class="form-label">Categoria</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="unidades">
                <label for="unidadesArticulos" class="form-label">Unidades</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="precio">
                <label for="precioArticulo" class="form-label">Precio</label>
            </div>
            
            <button type="submit" class="btn btn-primary" formaction="create.php">Submit</button>
            <button type="reset" class="btn btn-danger">Borrar</button>
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