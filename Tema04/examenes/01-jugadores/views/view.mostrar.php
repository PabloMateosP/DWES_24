<!DOCTYPE html>
<html lang="es">
<head>
    <?php require_once("layouts/layout.head.php");?>
    <title>Nuevo - Gestión Jugadores </title> 
</head>
<body>
    <!-- Capa Principal -->
    <div class="container">

        <?php include("partials/partial.header.php"); ?>

        <legend>Formulario Nuevo Jugador</legend>

      <form action="mostrar.php">
        <!-- id -->
        <div class="mb-3">
            <label for="titulo" class="form-label">Id:</label>
            <input type="text" class="form-control" name="id" value="<?= $jugador->getId()?>" disabled>
        </div>
        <!-- nombre -->
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre: </label>
            <input type="text" class="form-control" name="nombre" value="<?= $jugador->getNombre()?>">
        </div>
        <!-- número -->
        <div class="mb-3">
          <label for="" class="form-label">Número</label>
          <input type="number" class="form-control" name="numero" value="<?= $jugador->getNumero()?>">
        </div>
        <!-- contrato -->
        <div class="mb-3">
          <label for="" class="form-label">Contrato</label>
          <input type="number" class="form-control" name="contrato" steep="0.01" placeholder="0.00 €" value="<?= $jugador->getContrato()?>">
        </div>
        <!-- Pais -->
        <div class="mb-3"> 
                <label for="" class="form-label">País: </label>
                <select class="form-select" name="pais">
                <option selected disabled>Seleccione </option>
                    <?php foreach ($paises as $key => $pais):?>
                        <option value="<?= $key ?>">
                    <?=$pais?></option>
                    <?php endforeach; ?>
                </select>
        </div>

        <!-- equipos -->
        <div class="mb-3"> 
                <label for="" class="form-label">Equipo: </label>
                <select class="form-select" name="equipos">
                <option selected disabled>Seleccione </option>
                    <?php foreach ($equipos as $key => $equipo):?>
                        <option value="<?= $key ?>">
                    <?=$equipo?></option>
                    <?php endforeach; ?>
                </select>
        </div>
        
        <!-- Posiciones -->
        <div class="mb-3">
            <label for="" class="form-label">Posiciones</label>
            <div class="form-control">
                <?php foreach($posiciones as $indice => $posicion): ?>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="<?= $indice ?>" name="posiciones[]"> 
                        <label class="form-check-label" for="flexCheckDefault">
                            <?=$posicion?>
                        </label>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        
        <a class="btn btn-secondary" href="index.php" role="button">Volver</a>
        
      </form>

      <br><br><br> <br>

    <!-- Pie del documento -->
    <?php include("partials/partial.footer.php");?>

    <!-- Bootstrap Javascript y popper -->
    <?php include("layouts/layout.javascript.php");?>
 
</body>
</html>