<?php session_start(); ?>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/cards.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<div id="menuHolder">
    <div role="navigation" class="sticky-top border-bottom border-top" id="mainNavigation">
        <div class="flexMain">
            <div class="flex2">
                <button class="whiteLink siteLink" style="border-right:1px solid #eaeaea" onclick="menuToggle()"><i class="fs-3 bi bi-list"></i></button>
            </div>
            <div class="flex3 text-center" id="siteBrand">
                SIMECSA
            </div>

            <div class="flex2 text-end d-none d-md-block">
                <div class="dropdown">
                    <button class="blackLink siteLink" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fs-3 bi bi-person-circle"></i>
                        <strong class="d-none d-sm-block ms-1 dropdown-toggle"><?php echo ($_SESSION["correo"]); ?></strong>

                    </button>
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li><a class="dropdown-item" href="../dashboard/editarDatos/">Editar Datos</a></li>
                                <li><a class="dropdown-item" href="../login/logout.php">Cerrar Sesión</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div id="menuDrawer">
        <div class="p-4 border-bottom">
            <div class='row'>
                <div class="col">
                    <i class="fs-3 bi bi-caret-left-fill" role="btn" onclick="menuToggle()"></i>
                </div>
            </div>
        </div>
        <div>
            <a href="./index.php" class="nav-menu-item"><i class="fs-3 bi bi-house-fill"></i>&nbsp;&nbsp;Inicio</a>
            <a href="./producto/" class="nav-menu-item"><i class="fs-3 bi bi-box-fill"></i>&nbsp;Productos</a>
            <a href="./ventas/" class="nav-menu-item"><i class="fs-3 bi bi-shop"></i>&nbsp;&nbsp;Ventas</a>
            <a href="./servicios/" class="nav-menu-item"><i class="fs-3 bi bi-gear-wide"></i>&nbsp;&nbsp;Servicios</a>
            <a href="./inventario/" class="nav-menu-item"><i class="fs-3 bi bi-clipboard2-data-fill"></i>&nbsp;&nbsp;Inventario</a>
            <a href="./contacto/" class="nav-menu-item"><i class="fs-3 bi bi-telephone-fill"></i>&nbsp;&nbsp;Contacto</a>
            <a href="./administradores/" class="nav-menu-item"><i class="fs-3 bi bi-person-fill-add"></i>&nbsp;&nbsp;Administradores</a>
        </div>
    </div>
</div>