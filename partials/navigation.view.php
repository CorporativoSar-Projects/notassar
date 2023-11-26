<nav class="navbar navbar-expand-lg bg-body-tertiary px-4 d-flex justify-content-between">
    <div class="container-fluid" <a class="navbar-brand" href="#">
        <img src="img/logo.png<?php //echo $logo_empresa; ?>" width="100" height="100" alt="Logo de la empresa">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto text-center">
                <li class="nav-item" id="mInicio">
                    <a class="nav-link" href="principal.php">Inicio</a>
                </li>
                <li class="nav-item" id="mInicio">
                    <a class="nav-link" href="notas.php">Notas</a>
                </li>
                <li class="nav-item" id="mManageServices">
                    <a class="nav-link" href="gestionarservicios.php">Gestionar servicios</a>
                </li>
                <li class="nav-item" id="mManageServices">
                    <a class="nav-link" href="historial_notas.php">Historial de Notas</a>
                </li>
                <li class="nav-item" id="mLeads">
                    <a class="nav-link" href="prospeccion.php">Prospección</a>
                </li>
                <li class="nav-item" id="mWebSite">
                    <a class="nav-link" href="https://www.corporativosaarme.com">Ir al sitio web</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user"></i> <?php echo $userSession->getUser()->getFullName(); ?>
                    </a>
                    <ul class="dropdown-menu text-center" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li class="px-2">
                            <a class="btn btn-danger" href="logout.php">
                                <i class="fas fa-sign-out-alt"></i>
                                Cerrar sesión</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>