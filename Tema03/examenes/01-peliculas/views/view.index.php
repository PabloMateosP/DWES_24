<!doctype html>
<html lang="es">

<head>
  <!-- Incluimos HEAD -->
  <?php include("layouts/layout.head.php") ?>
  <title>Home - CRUD Tabla Películas</title>
</head>

<body>
  <div class="container">

    <!-- Cabecera -->
    <?php include"partials/partial.cabecera.php" ?>

    <legend>
      Tabla Películas
    </legend>

    <!-- Incluimos Partials menu -->
    <?php include "partials/partial.menu.php" ?>

    <table class="table">
      <thead>
        <tr>
          <?php
          $claves = array_keys($peliculas[0]);
          $claves[] = "Acciones";
          foreach ($claves as $clave): ?>
            <th>
              <?= ucfirst($clave) ?>
            </th>
          <?php endforeach; ?>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($peliculas as $indice => $pelicula): ?>
          <tr>
            <td>
              <?= $pelicula['id'] ?>
            </td>
            <td>
              <?= $pelicula['titulo'] ?>
            </td>
            <td>
              <?= $paises[$pelicula['pais']] ?>
            </td>
            <td>
              <?= $pelicula['director'] ?>
            </td>
            <td>
              <?= implode(', ', mostrarGeneros($listGeneros, $pelicula['generos'])) ?>
            </td>
            <td>
              <?= $pelicula['año'] ?>
            </td>

            <!-- botones de acción -->
            <td>
              <a href=#><i class="bi bi-trash-fill"></i></a>
              <a href=#><i class="bi bi-pencil-square"></i></a>
              <a href="mostrar.php?indice=<?= $indice ?>" Title="Mostrar"><i class="bi bi-eye"></i></a>
            </td>

          </tr>
        <?php endforeach; ?>
      <tfoot>
        <tr>
          <td colspan="7">Películas:
            <?= count($peliculas) ?>
          </td>
        </tr>
      </tfoot>

      </tbody>
    </table>

    <!-- Incluimos Partials footer -->
    <?php include "partials/partial.footer.php" ?>

  </div>

  <!-- Incluimos Partials javascript bootstrap -->
  <?php include "layouts/layout.javascript.php" ?>

</body>

</html>