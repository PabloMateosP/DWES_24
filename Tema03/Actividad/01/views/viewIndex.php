<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Incluir head -->
    <title>Actividad 3.1 - Tema 03  </title>

    <!-- Añadimos el php include para el css bootstrap -->
    <?php
    include "layouts/head.html";
    ?>

</head>

<body>
    <!-- Capa principal -->
    <div class="container">

        <!-- cabecera documento -->
        <header class="pb-3 mb-4 border-bottom">
            <i class="bi bi-calculator"></i>
            <span class="fs-6"></span>
        </header>

        <legend>Formulario Conversor</legend>
        <form method="post" action="acceso.php">
            <!-- Formulario -->
            <div class="mb-3">
                <label class="form-label" >Nombre</label>
                <input class="form-control" name="nombreUsuario">
            </div>
            <div class="mb-3">
                <label class="form-label" >Correo Electrónico</label>
                <input type="email" class="form-control" aria-describedby="emailHelp" name="email">
                <div id="emailHelp" class="form-text"></div>
            </div>
            <div class="mb-3">
                <label class="form-label" >Contraseña</label>
                <input type="password" class="form-control" name="contrasena">
            </div>
            <div class="mb-3">
                <label class="form-label" >Confirmación Contraseña</label>
                <input type="password" class="form-control" name="contrasenaConfirmada">
            </div>

            <!-- Botones de acción  -->
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input">
                <label class="form-check-label" for="exampleCheck1">Recuérdame</label>
            </div>

            <select class="form-select" aria-label="Default select example" name="perfil">
                <option selected disabled>Seleccione Perfil</option>
                <option value="user">Usuario</option>
                <option value="admin">Administrador</option>
                <option value="publishers">Editor</option>
            </select>
            <br>
            <button type="submit" class="btn btn-primary" formaction="acceso.php">Entrar</button>
            <button type="reset" class="btn btn-secondary">Borrar</button>

        </form>

        <!-- Pié del documento -->
        <?php include 'views/layouts/footer.html' ?>

    </div>

    <!-- javascript bootstrap 532 -->
    <?php include 'views/layouts/javascript.html' ?>
</body>

</html>