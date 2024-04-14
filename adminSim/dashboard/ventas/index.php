<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ventas</title>
    <?php
include "../navbars/navbarLv2.php";
?>
</head>


<body>
    <div class="container-fluid">
        <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3" id="contenidoProductos">
            <div class="card text-center">
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    <?php
                    include_once "../../funciones.php";
                    $conteo = count(obtenerVentasEstado("Por confirmar"));
                    if ($conteo > 0) {
                        printf($conteo);
                    } else {
                        printf("0");
                    }
                    ?>
                    <span class="visually-hidden">Pedidos por confirmar</span>
                </span>
                <div class="card-body">
                    <h5 class="card-title">Pendientes de revisión</h5>
                    <p class="card-text"></p>
                    <a href="./revisaVentas.php?estado=Por confirmar" class="btn btn-primary">Ver</a>
                </div>
            </div>

            <div class="card text-center">
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    <?php
                    include_once "../../funciones.php";
                    $conteo = count(obtenerVentasEstado("Por enviar"));
                    if ($conteo > 0) {
                        printf($conteo);
                    } else {
                        printf("0");
                    }
                    ?>
                    <span class="visually-hidden">Pedidos por enviar</span>
                </span>
                <div class="card-body">
                    <h5 class="card-title">Por enviar</h5>
                    <p class="card-text"></p>
                    <a href="./revisaVentas.php?estado=Por enviar" class="btn btn-primary">Ver</a>
                </div>
            </div>
            <div class="card text-center">
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    <?php
                    include_once "../../funciones.php";
                    $conteo = count(obtenerVentasEstado("Enviado"));
                    if ($conteo > 0) {
                        printf($conteo);
                    } else {
                        printf("0");
                    }
                    ?>
                    <span class="visually-hidden">Pedidos Enviados</span>
                </span>
                <div class="card-body">
                    <h5 class="card-title">Enviados</h5>
                    <p class="card-text"></p>
                    <a href="./revisaVentas.php?estado=Enviado" class="btn btn-primary">Ver</a>
                </div>
            </div>
            <div class="card text-center">
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    <?php
                    include_once "../../funciones.php";
                    $conteo = count(obtenerVentasEstado("Por recoger"));
                    if ($conteo > 0) {
                        printf($conteo);
                    } else {
                        printf("0");
                    }
                    ?>
                    <span class="visually-hidden">Pedidos por recoger</span>
                </span>
                <div class="card-body">
                    <h5 class="card-title">Por recoger en tienda</h5>
                    <p class="card-text"></p>
                    <a href="./revisaVentas.php?estado=Por recoger" class="btn btn-primary">Ver</a>
                </div>
            </div>
            <div class="card text-center">
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    <?php
                    include_once "../../funciones.php";
                    $conteo = count(obtenerVentasEstado("Cancelado"));
                    if ($conteo > 0) {
                        printf($conteo);
                    } else {
                        printf("0");
                    }
                    ?>
                    <span class="visually-hidden">Pedidos cancelados</span>
                </span>
                <div class="card-body">
                    <h5 class="card-title">Cancelados</h5>
                    <p class="card-text"></p>
                    <a href="./revisaVentas.php?estado=Cancelado" class="btn btn-primary">Ver</a>
                </div>
            </div>
            <div class="card text-center">
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    <?php
                    include_once "../../funciones.php";
                    $conteo = count(obtenerVentasEstado("Finalizado"));
                    if ($conteo > 0) {
                        printf($conteo);
                    } else {
                        printf("0");
                    }
                    ?>
                    <span class="visually-hidden">Pedidos Finalizados</span>
                </span>
                <div class="card-body">
                    <h5 class="card-title">Finalizados</h5>
                    <p class="card-text"></p>
                    <a href="./revisaVentas.php?estado=Finalizado" class="btn btn-primary">Ver</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<script src="../js/index.js"></script>