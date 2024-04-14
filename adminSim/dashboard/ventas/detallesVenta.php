<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/index.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<?php
include "../navbars/navbarLv2.php";
$idVenta = $_GET["id"];
?>

<body>
    <div>
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./index.php">Ventas</a></li>
            </ol>
        </nav>
    </div>
    <main>
        <div class="container-fluid">
            <div class="col-12">
                <h1>Detalles de la orden</h1>
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <p id="total"></p>
                    <p id="pago"></p>
                    <p id="direccion"></p>
                    <p id="fecha"></p>
                    <p id="estado"></p>
                </div>
                <table class="table table-dark table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Imagen</th>
                            <th scope="col">Producto</th>
                            <th scope="col">Precio Individual</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Precio Total</th>
                        </tr>
                    </thead>
                    <tbody id="contenidoTabla">

                    </tbody>
                </table>
                <div class="d-grid gap-2" id="areaBotones">
                    
                </div>
            </div>
        </div>
    </main>
</body>

</html>
<script src="./js/ventaIndividual.js"></script>
<script src="../js/index.js"></script>