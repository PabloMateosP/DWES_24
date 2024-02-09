<!DOCTYPE html>
<html lang="es">

<head>
    <?php require_once("template/partials/head.php") ?>
    <title><?= $this->title ?></title>
    
	<style>
		.col-3 {
			display: grid;
			grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
			gap: 15px;
		}

		.card {
			box-sizing: border-box;
		}

		.card img {
			width: 100%;
			height: 225px;
			object-fit: cover;
		}
	</style>
</head>

<body>
    
    <?php require_once("template/partials/menuAut.php") ?>
    <br><br><br>

    <div class="container">
        <?php include 'views/album/partials/header.php' ?>
        <?php include 'template/partials/error.php' ?>
    
        <h2 class="mt-4 mb-4">Formulario Editar Álbum</h2>

        <form action="<?= URL ?>album/update/<?= $this->id ?>" method="POST">

            <input type="hidden" name="id" value="<?= $this->album->id ?>">

            <div class="card mb-3">
                <div class="card-body">

                    <!-- Titulo -->
                    <div class="mb-3">
                        <label for="titulo" class="form-label">Título</label>
                        <input type="text" class="form-control" name="titulo" value="<?= $this->album->titulo ?>">
                        <?php if (isset($this->errores['titulo'])): ?>
                            <span class="form-text text-danger"><?= $this->errores['titulo'] ?></span>
                        <?php endif; ?>
                    </div>

                    <!-- Descripcion -->
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <input type="text" class="form-control" name="descripcion" value="<?= $this->album->descripcion ?>">
                        <?php if (isset($this->errores['descripcion'])): ?>
                            <span class="form-text text-danger"><?= $this->errores['descripcion'] ?></span>
                        <?php endif; ?>
                    </div>

                    <!-- Autor -->
                    <div class="mb-3">
                        <label for="autor" class="form-label">Autor</label>
                        <input type="text" class="form-control" name="autor" value="<?= $this->album->autor ?>">
                        <?php if (isset($this->errores['autor'])): ?>
                            <span class="form-text text-danger"><?= $this->errores['autor'] ?></span>
                        <?php endif; ?>
                    </div>

                    <!-- Lugar -->
                    <div class="mb-3">
                        <label for="lugar" class="form-label">Lugar</label>
                        <input type="text" class="form-control" name="lugar" value="<?= $this->album->lugar ?>">
                        <?php if (isset($this->errores['lugar'])): ?>
                            <span class="form-text text-danger"><?= $this->errores['lugar'] ?></span>
                        <?php endif; ?>
                    </div>

                    <!-- Fecha -->
                    <div class="mb-3">
                        <label for="fecha" class="form-label">Fecha</label>
                        <input type="date" class="form-control" name="fecha" value="<?= $this->album->fecha ?>">
                        <?php if (isset($this->errores['fecha'])): ?>
                            <span class="form-text text-danger"><?= $this->errores['fecha'] ?></span>
                        <?php endif; ?>
                    </div>

                    <!-- Categoría -->
                    <div class="mb-3">
                        <label for="categoria" class="form-label">Categoría</label>
                        <input type="text" class="form-control" name="categoria" value="<?= $this->album->categoria ?>">
                    </div>

                    <!-- Etiqueta -->
                    <div class="mb-3">
                        <label for="etiquetas" class="form-label">Etiqueta</label>
                        <input type="text" class="form-control" name="etiquetas" value="<?= $this->album->etiquetas ?>">
                    </div>

                    <!-- Carpeta -->
                    <div class="mb-3">
                        <label for="carpeta" class="form-label">Carpeta</label>
                        <input type="text" class="form-control" name="carpeta" value="<?= $this->album->carpeta ?>">
                    </div>

                    <!-- Imágenes -->
                    <div class="row mb-3">
                        <?php foreach (glob("images/" . $this->album->carpeta . "/*") as $imagen): ?>
                            <div class="col-3">
                                <div class="card shadow-sm">
                                    <img class="card-img-top" src="<?= URL . $imagen ?>" alt="Imagen">
                                    <div class="card-body"></div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- Botones de Acción -->
                    <div class="mb-3">
                        <a class="btn btn-secondary" href="<?= URL ?>album" role="button">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                    <br>
                </div>
            </div>
        </form>

        <?php include 'template/partials/footer.php' ?>
    </div>

    <?php include 'template/partials/javascript.php' ?>
</body>

</html>
