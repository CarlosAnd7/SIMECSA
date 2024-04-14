<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producto</title>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/cards.css">
    <link rel="stylesheet" href="../css/tableStyle.css">

    <?php
    include "../navbars/navbarLv2.php";
    include_once "../../funciones.php";

    $estado = ($_GET["estado"]);
    ?>
</head>


<body>

    <div>
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./index.php">Ventas</a></li>
                <li class="breadcrumb-item active" aria-current="page">Pedido <?php echo ($estado) ?></li>
            </ol>
        </nav>
    </div>


    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <table id="datatable_users" class="table table-dark table-striped-columns table-hover">
                    <thead>
                        <tr>
                            <th class="centered">#</th>
                            <th class="centered">ID Venta</th>
                            <th class="centered">Total</th>
                            <th class="centered">Fecha</th>
                            <th class="centered">Dirección</th>
                            <th class="centered">Tipo de Pago</th>
                            <th class="centered">Cliente</th>
                            <th class="centered">Correo</th>
                            <th class="centered">Teléfono</th>
                            <th class="centered">Detalles</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody_users"></tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="./js/main.js"></script>

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <!-- JQuery DataTables -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <!-- Bootstrap DataTables -->
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <!-- Buttons DataTables -->
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <!-- JSZip/PDF MAKE (File Conversors) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <!-- Copy to clipboard -->
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    <!-- Order columns -->
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.colVis.min.js"></script>
</body>

</html>
<script>
    var estado = "<?php echo ($estado) ?>";
    recibeCategoria(estado);
</script>
<script src="../js/index.js"></script>