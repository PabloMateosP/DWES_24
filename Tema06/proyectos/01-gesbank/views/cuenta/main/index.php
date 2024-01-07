<!doctype html>
<html lang="es">

<!-- head -->
<head>
	<?php require_once("template/partials/head.php") ?>
	<title><?= $this->title ?></title>
<head>

<body>
	<!-- Menú Principal -->
	<?php require_once("template/partials/menu.php") ?>
	<br><br><br>

	<!-- Page Content -->
	<div class="container">
		<!-- cabecera  -->
		<?php require_once("template/partials/header.php") ?>

		<!-- mensajes -->
		<?php require_once("template/partials/notify.php") ?>

		<!-- errores -->
		<?php require_once("template/partials/error.php") ?>

		<!-- Estilo card de bootstrap -->
		<div class="card">
			<div class="card-header">
				Tabla de cuentas
			</div>
			<div class="card-header">
				<!-- menu cuentas -->
				<?php require_once("views/cuenta/partials/menu.php") ?>
			</div>
			<div class="card-body">

				<!-- Muestra datos de la tabla -->
				<table class="table">
					<!-- Encabezado tabla -->
					<thead>
						<tr>
							<!-- personalizado -->
							<th>id</th>
							<th>Número de cuenta</th>
							<th>Nombre</th>
							<th>Apellidos</th>
							<th>Fecha alta</th>
							<th>Fecha último movimiento</th>
							<th>Núm movimientos</th>
							<th>Saldo</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<!-- Mostramos cuerpo de la tabla -->
					<tbody>

						<!-- Objeto clase pdostatement en foreach -->
						<?php foreach ($this->cuentas as $cuenta): ?>
								<tr>
									<!-- Formatos distintos para cada  columna -->

									<!-- Detalles de cuentas -->
									<td>
										<?= $cuenta->id ?>
									</td>
									<td>
										<?= $cuenta->num_cuenta ?>
									</td>
									<td>
										<?= $cuenta->nombre ?>
									</td>
									<td>
										<?= $cuenta->apellidos ?>
									</td>
									<td>
										<?= $cuenta->fecha_alta ?>
									</td>
									<td>
										<?= $cuenta->fecha_ul_mov ?>
									</td>
									<td>
										<?= $cuenta->num_movtos ?>
									</td>
									<td>
										<?= $cuenta->saldo ?>
									</td>

									<!-- botones de acción -->
									<td>
										<!-- botón  eliminar -->
										<a href="<?= URL ?>cuenta/delete/<?= $cuenta->id ?>" title="Eliminar">
											<i class="bi bi-trash-fill"></i></a>

										<!-- botón  editar -->
										<a href="<?= URL ?>cuenta/edit/<?= $cuenta->id ?>" title="Editar">
											<i class="bi bi-pencil-square"></i></a>

										<!-- botón  mostrar -->
										<a href="<?= URL ?>cuenta/show/<?= $cuenta->id ?>" title="Mostrar">
											<i class="bi bi-card-text"></i></a>

										<!-- botón  listar -->
										<a href="<?= URL ?>cuenta/#/<?= $cuenta->id ?>" title="Listar">
											<i class="bi bi-list-task"></i></i></a>
									</td>
								</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
			<div class="card-footer">
				<small class="text-muted"> Nº cuentas: 
					<?= $this->cuentas->rowCount(); ?>
				</small>
			</div>
		</div>
	</div>
	<br><br><br>

	<!-- /.container -->

	<?php require_once("template/partials/footer.php") ?>
	<?php require_once("template/partials/javascript.php") ?>

</body>

</html>