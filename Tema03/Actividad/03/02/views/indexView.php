<!DOCTYPE html>
<html lang="es">

<head>
    <?php include "layouts/header.html" ?>
</head>

<body>
    <!-- Capa principal -->
    <div class="container">
        <!-- cabecera documento -->
        <header class="pb-3 mb-4 border-bottom">
            <i class="bi bi-bootstrap-reboot"></i>
            <span class="fs-6">Actividad 3.3 apartado 2 </span>
        </header>
        <!-- Tablas de multiplicar -->
        <h1>Tablas de Multiplicar</h1>
        <table class="table table-dark table-striped-columns">
            <tbody>
                <?php for ($ind = 1; $ind <= 10; $ind++) :?>
                    <tr>
                    <?php for ($ind2 = 1; $ind2 <= 10; $ind2++) :?>
                        <td> <?=($ind * $ind2)?></td>
                    <?php endfor; ?>
                    </tr>
                <?php endfor; ?>
            </tbody>
        </table>
        <!-- Pié del documento -->
        <?php include 'layouts/footer.html' ?>
    </div>
    <!-- javascript bootstrap 532 -->
    <?php include 'layouts/javascript.html' ?>
</body>

</html>