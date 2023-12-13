<!DOCTYPE html>
<html lang="es">

<head>
    <!-- layout.head -->
    <?php include("layouts/layout.head.html") ?>
    <title>Nuevo - Gestión Libros </title>
</head>

<body>
    <!-- Capa Principal -->
    <div class="container">
        <!-- partial.header -->
        <?php include("partials/partial.header.php") ?>
        <legend>Formulario Nuevo Libro</legend>

        <form action="create.php" method="POST">
            <!-- título -->
            <div class="mb-3">
                <label for="titulo" class="form-label">Titulo</label>
                <input name="titulo" type="text" class="form-control">
            </div>

            <!-- isbn -->
            <div class="mb-3">
                <label for="isbn" class="form-label">Isbn</label>
                <input name="isbn" type="text" class="form-control">
            </div>

            <!-- fecha_edicion -->
            <div class="mb-3">
                <label for="fecha_edicion" class="form-label">Fecha_Edicion</label>
                <input name="fecha_edicion" type="date" class="form-control">
            </div>

            <!-- autor -->
            <div class="mb-3">
                <label for="" class="form-label">Autor</label>
                <select name="id_autor" class="form-select">
                    <option selected disabled>Seleccione Autor</option>
                    <?php foreach ($autores as $data): ?>
                        <option value="<?= $data->id ?>">
                            <?= $data->autor ?>
                        </option>
                    <?php endforeach; ?>
                    <option></option>
                  
                </select>
            </div>

            <!-- Editorial -->
            <div class="mb-3">
                <label for="" class="form-label">Editorial</label>
                <select class="form-select" name="id_editorial">
                    <option selected disabled>Seleccione Editorial</option>
                    <?php foreach ($editoriales as $data): ?>
                        <option value="<?= $data->id ?>">
                            <?= $data->editorial ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- stock -->
            <div class="mb-3">
                <label for="" class="form-label">Stock</label>
                <input name="stock" type="number" class="form-control" aria-describedby="emailHelpId" value=0>
            </div>

            <!-- precio_coste -->
            <div class="mb-3">
                <label for="" class="form-label">Precio_cost</label>
                <input name="precio_coste" type="number" class="form-control" aria-describedby="emailHelpId" step="0.01" value=0.00>
            </div>

            <!-- precio_venta -->
            <div class="mb-3">
                <label for="" class="form-label">Precio Venta</label>
                <input name="precio_venta" type="number" class="form-control" aria-describedby="emailHelpId" step="0.01" value=0.00>
            </div>


            <!-- Botones de acción -->
            <a class="btn btn-secondary" href="index.php" role="button">Cancelar</a>
            <button type="reset" class="btn btn-danger">Borrar</button>
            <button type="submit" class="btn btn-primary">Enviar</button>

        </form>

        <br><br><br>

        <!-- partial.footer -->

        <!-- layout.javascript -->

</body>

</html>