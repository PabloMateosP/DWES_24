<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?=URL?>movimientos">Movimientos</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?=URL?>movimientos/nuevo">Nuevo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active <?= in_array($_SESSION['id_rol'], $GLOBALS['movimientos']['export']) ?: 'disabled' ?>"
                        href="<?= URL ?>movimientos/exportar">Exportar CSV</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active <?= in_array($_SESSION['id_rol'], $GLOBALS['movimientos']['import']) ?: 'disabled' ?>"
                        href="#" data-bs-toggle="modal" data-bs-target="#importar">Importar CSV</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active <?= in_array($_SESSION['id_rol'], $GLOBALS['movimientos']['export']) ?: 'disabled' ?>"
                        href="<?= URL ?>movimientos/pdf">Exportar PDF</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Ordenar
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="<?=URL?>movimientos/ordenar/1">Id</a></li>
                        <li><a class="dropdown-item" href="<?=URL?>movimientos/ordenar/2">Nº de cuenta</a></li>
                        <li><a class="dropdown-item" href="<?=URL?>movimientos/ordenar/8">Titular</a></li>
                        <li><a class="dropdown-item" href="<?=URL?>movimientos/ordenar/4">Fecha</a></li>
                        <li><a class="dropdown-item" href="<?=URL?>movimientos/ordenar/5">Fecha Ult. Mov.</a></li>
                        <li><a class="dropdown-item" href="<?=URL?>movimientos/ordenar/6">Nº Movimientos</a></li>
                        <li><a class="dropdown-item" href="<?=URL?>movimientos/ordenar/7">saldo</a></li>
                    </ul>
                </li>

            </ul>
            <form class="d-flex" method="get" action="<?=URL?>movimientos/buscar">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                    name="expresion">
                <button class="btn btn-outline-secondary" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>