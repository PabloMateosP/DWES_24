<!doctype html>
<html lang="es">
<!-- head -->
<?php require_once("template/partials/head.php") ?>

<body>


	<!-- Page Content -->
	<div class="container">

		<!-- menu de la cabecera -->
		<?php require_once("views/alumno/partials/header.html") ?>

		<!-- mensajes -->
		<?php require_once("template/partials/mensaje.php") ?>

		<!-- errores -->
		<?php require_once("template/partials/error.php") ?>

		<!-- <br><br><br><br> -->

		<!-- Estilo card de bootstrap -->
		<div class="card">
			<div class="card-header">
				<!-- menu Alumnos -->
				<?php require_once("views/alumno/partials/menu.php") ?>
			</div>

			<div class="card-header">
				Tabla de Alumnos
			</div>
			<div class="card-body">

				<!-- Añadimos una tabla con los artículos -->
				<table class="table">
					<!-- Mostremos el nombre de las columnas, para nuestra comodidad y personalizción introduciremos lo datos manualmente -->
					<thead>
						<tr>
							<th scope="col">id</th>
							<th scope="col">Alumno</th>
							<th scope="col">Email</th>
							<th scope="col">Telefono</th>
							<th scope="col">Población</th>
							<th scope="col">DNI</th>
							<th scope="col">Edad</th>
							<th scope="col">Curso</th>
							<th scope="col">Acciones</th>
						</tr>
					</thead>
					<!-- Mostraremos el contenido de cada artículo -->
					<tbody>
						<!-- ACCEDEMOS A LOS ALUMNOS E ITERAMOS -->
						<?php foreach ($this->alumnos as $alumno): ?>
							<tr> <!-- Al ser foreach no requiere fetch (en el uso de while, si)-->
								<td>
									<?= $alumno->id ?>
								</td>
								<td>
									<?= $alumno->alumno ?>
								</td>
								<td>
									<?= $alumno->email ?>
								</td>
								<td>
									<?= $alumno->telefono ?>
								</td>
								<td>
									<?= $alumno->poblacion ?>
								</td>
								<td>
									<?= $alumno->dni ?>
								</td>
								<td>
									<?= $alumno->edad ?>
								</td>
								<td>
									<?= $alumno->curso ?>
								</td>


								<td>
									<!-- Botón eliminar GET id -> eliminar.php  -->
									<a href="eliminar.php?id=<?= $alumno->id ?>" title="Eliminar">
										<i class="bi bi-trash-fill"></i>
									</a>

									<!-- Botón editar GET id -> editar.php -->
									<a href="editar.php?id=<?= $alumno->id ?>" title="Editar">
										<i class="bi bi-pencil-square"></i>
									</a>
									<!-- Botón mostrar GET id -> mostrar.php -->
									<a href="mostrar.php?id=<?= $alumno->id ?>" title="Mostrar">
										<i class="bi bi-tv"></i>
									</a>
								</td>

							</tr>
						<?php endforeach; ?>
					</tbody>
					<!-- En el pie de la tabla, mostraremos el número de artículos mostrados -->
					<tfoot>
						<tr>
							<!-- muestra el n articulos (colspan=ocupa n columnas) -->
							<td colspan="7"><b>Nº de Alumnos =
									<?= $this->alumnos->rowCount() ?> <!--rowCount es un método de la clase podstsmt -->
								</b></td>
						</tr>
					</tfoot>
				</table>

			</div>
		</div>

	</div>

	<!-- /.container -->

	<?php require_once("template/partials/footer.php") ?>
	<?php require_once("template/partials/javascript.php") ?>

</body>

</html>