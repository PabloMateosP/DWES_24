<!doctype html>
<html lang="es">

<?php require_once("template/partials/head.php") ?>
<header>
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
</header>

<body>
	<?php require_once("template/partials/menuAut.php") ?>

	<!-- Page Content -->
	<div class="container">
		<br>
		<br>
		<br>
		<br>

		<?php require_once("template/partials/notify.php") ?>

		<!-- Estilo card de bootstrap -->

		<div class="card">
			<!-- header -->
			<div class="card-header">
				<?php include 'views/album/partials/header.php' ?>
			</div>
			<div class="card-header">
				INFORMACIÓN ALBÚM
			</div>
			<div class="row">
				<div class="col">
					<div class="card-body">
						<form>
							<!-- ID oculto -->
							<input type="hidden" name="id" value="<?= $this->album->id ?>">
							<div class="mb-3">
								<label class="form-label">Titulo</label>
								<input type="text" class="form-control" name="titulo"
									value="<?= $this->album->titulo ?>" readonly>
							</div>
							<div class="mb-3">
								<label class="form-label">Descripcion</label>
								<input type="text" class="form-control" name="descripcion"
									value="<?= $this->album->descripcion ?>" readonly>
							</div>
							<div class="mb-3">
								<label class="form-label">Autor</label>
								<input type="text" class="form-control" name="autor" value="<?= $this->album->autor ?>"
									readonly>
							</div>
							<div class="mb-3">
								<label class="form-label">Lugar</label>
								<input type="text" class="form-control" name="lugar" value="<?= $this->album->lugar ?>"
									readonly>
							</div>
							<div class="mb-3">
								<label class="form-label">Fecha</label>
								<input type="date" class="form-control" name="fecha" value="<?= $this->album->fecha ?>"
									readonly>
							</div>
							<div class="mb-3">
								<label class="form-label">Categoria</label>
								<input type="text" class="form-control" name="categoria"
									value="<?= $this->album->categoria ?>" readonly>
							</div>
							<div class="mb-3">
								<label class="form-label">Etiquetas</label>
								<input type="text" class="form-control" name="etiquetas"
									value="<?= $this->album->etiquetas ?>" readonly>
							</div>
							<div class="mb-3">
								<label class="form-label">Carpeta</label>
								<input type="text" class="form-control" name="carpeta" pattern="[A-Za-z0-9]{1,50}"
									value="<?= $this->album->carpeta ?>" readonly>
							</div>

							<?php foreach (glob("images/" . $this->album->carpeta . "/*") as $imagen):
								?>
								<div class="col-3">
									<div class="card shadow-sm">
										<img width="100%" height="225" src="<?= URL . $imagen ?>">
										<div class="card-body">
										</div>
									</div>
								<?php endforeach; ?>
						</form>
					</div>
				</div>
			</div>
			<div class="card-footer text-muted">
				<a class="btn btn-secondary" href="<?= URL ?>album" role="button">Volver</a>
			</div>
		</div>
	</div>
	<br><br><br>
	<!-- /.container -->

	<?php require_once("template/partials/footer.php") ?>
	<?php require_once("template/partials/javascript.php") ?>

</body>

</html>