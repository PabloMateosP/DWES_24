<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Incluir head -->
    <title>Actividad 01 - Tema 03 </title>

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

            <form>
                <!-- Formulario -->
                <div class="mb-3">
                    <label class="form-label" name=""nombreUsuario>Nombre</label>
                    <input type="email" class="form-control" aria-describedby="emailHelp"
                        name="usuario">
                    <div id="emailHelp" class="form-text">Entre 6 y 16 carácteres.</div>
                </div>
                <div class="mb-3">
                    <label class="form-label" name="email">Correo Electrónico</label>
                    <input type="email" class="form-control"  aria-describedby="emailHelp"
                        name="correo">
                    <div id="emailHelp" class="form-text">Entre </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" name="contasena">Contraseña</label>
                    <input type="password" class="form-control" >
                </div>
                <div class="mb-3">
                    <label class="form-label" name="contasenaConfirmada">Confirmación Contraseña</label>
                    <input type="password" class="form-control" >
                </div>

                <!-- Botones de acción  -->
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" >
                    <label class="form-check-label" for="exampleCheck1">Recuérdame</label>
                </div>

                <select class="form-select" aria-label="Default select example" name="perfil">
                    <option selected disabled>Seleccione Perfil</option>
                    <option value="user">Usuario</option>
                    <option value="admin">Administrador</option>
                    <option value="publishers">Editor</option>
                </select>
                <br>
                <button type="submit" class="btn btn-primary" formaction="">Entrar</button>
                <button type="reset" class="btn btn-secondary">Borrar</button>
            </form>

        </form>

        <!-- Pié del documento -->
        <?php include 'views/layouts/footer.html' ?>

    </div>

    <!-- javascript bootstrap 532 -->
    <?php include 'views/layouts/javascript.html' ?>
</body>

</html>