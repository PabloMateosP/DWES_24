<!DOCTYPE html>
<html lang="es">
<head>
    <?php include "layouts/header.html" ?>
</head>
<body>
    <!-- Capa Principal -->
    <div class="container">
        <header class="pb-3 mb-4 border-bottom">
            <i class="bi bi-app-indicator"></i>        
            <span class="fs-4">Tabla 1 - 100</span>
        </header>
        <div class="table-responsive">
            <table class="table table-primary">         
                <tbody>
                    <!-- Tabla 1 - 100 -->
                    <?php 
                        $a = 1;
                        $b = 1;
                    ?>
                    <tr>
                        <?php while ($a<= 100):
                                if ($b == 11):
                                    $b=1; ?>
                                    </tr>
                                    <tr>
                                <?php endif; ?> 
                            <td><?=$a ?>
                            
                        <?php
                            $a++;
                            $b++;
                        endwhile;?>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pie del documento -->
    <?php include 'layouts/footer.html'; ?>

    <!-- Bootstrap Javascript y popper -->
    <?php include 'layouts/javascript.html' ?>
 
</body>
</html>