<header class="main-header">
    <a href="#" class="logo">
        <span class="logo-mini"><b>IT</b></span>
        <span class="logo-lg"><b><?= TITLE ?></b></span>
    </a>
    <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="hidden-xs">Bienvenido, <?= $_SESSION['nombre'] ?></span>
                    </a>
                </li>
                <li class="dropdown user user-menu">
                    <a href="<?= BASE_URL ?>cerrar.php" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="hidden-xs">Cerrar Sesion</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header>