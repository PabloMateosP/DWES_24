<!DOCTYPE html>
<html lang="es">

<head>
    <!-- head -->
    <?php require_once("template/partials/head.php") ?>
    <title><?= $this->title ?></title>
</head>

<body>
    <!-- Menú Principal -->
	<?php require_once("template/partials/menuAut.php") ?>
	<br><br><br>

    <!-- Capa principal -->
    <div class="container">

        <!-- header -->
        <?php include 'views/album/partials/header.php' ?>

        <!-- comprobamos si existe error -->
        <?php include 'template/partials/error.php' ?>

        <legend>Formulario Nuevo album</legend>

        

        <!-- Formulario Nuevo Libro -->
        <form action="<?= URL ?>album/create" method="POST">

        <form method="POST" action="<?= URL?>albumes/create">
					<div class="mb-3">
						<label class="form-label">Titulo</label>
						<input type="text" class="form-control" name="titulo" value="<?= $this->album->titulo ?>">
						
						<span class="form-text text-danger" role="alert">
							<?= $this->erroresVal['titulo'] ??= null?>
						</span>
					</div>
					<div class="mb-3">
						<label class="form-label">Descripcion</label>
						<input type="text" class="form-control" name="descripcion" value="<?= $this->album->descripcion ?>">

						<span class="form-text text-danger" role="alert">
							<?= $this->erroresVal['descripcion'] ??= null?>
						</span>
					</div>
					<div class="mb-3">
						<label class="form-label">Autor</label>
						<input type="text" class="form-control" name="autor" value="<?= $this->album->autor ?>">

						<span class="form-text text-danger" role="alert">
							<?= $this->erroresVal['autor'] ??= null?>
						</span>
					</div>
					<div class="mb-3">
						<label class="form-label">Lugar</label>
						<input type="text" class="form-control" name="lugar" value="<?= $this->album->lugar ?>">

						<span class="form-text text-danger" role="alert">
							<?= $this->erroresVal['lugar'] ??= null?>
						</span>
					</div>
					<div class="mb-3">
						<label class="form-label">Fecha</label>
						<input type="date" class="form-control" name="fecha" value="<?= $this->album->fecha ?>">

						<span class="form-text text-danger" role="alert">
							<?= $this->erroresVal['fecha'] ??= null?>
						</span>
					</div>
					<div class="mb-3">
						<label class="form-label">Categoria</label>
						<input type="text" class="form-control" name="categoria" value="<?= $this->album->categoria ?>">

						<span class="form-text text-danger" role="alert">
							<?= $this->erroresVal['categoria'] ??= null?>
						</span>
					</div>
					<div class="mb-3">
						<label class="form-label">Etiquetas</label>
						<input type="text" class="form-control" name="etiquetas" value="<?= $this->album->etiquetas?>">
					
						<span class="form-text text-danger" role="alert">
							<?= $this->erroresVal['etiquetas'] ??= null?>
						</span>
					</div>
					<div class="mb-3">
						<label class="form-label">Carpeta</label>
						<input type="text" class="form-control" name="carpeta" pattern="[A-Za-z0-9]{1,50}" value="<?= $this->album->carpeta?>">
						<br>
						<span class="form-text text-danger" role="alert">
							<?= $this->erroresVal['carpeta'] ??= null?>
						</span>
					</div>

            <!-- botones de acción -->
            <a class="btn btn-secondary" href="<?= URL ?>album" role="button">Cancelar</a>
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