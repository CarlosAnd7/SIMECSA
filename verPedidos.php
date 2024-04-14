<!DOCTYPE html>
<html lang="es">
<head>
    <title>Pedidos</title>
    <?php include("./navbar.php"); ?>
    <style>
        .table-responsive {
            overflow-x: auto;
        }
    </style>
    <link rel="stylesheet" href="./css//verPedidos.css">
</head>
<body>
    <h2 class="text-center">Pedidos</h2>
    <main>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="table-responsive">
                        <table id="datatable_users" class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="centered">#</th>                                
                                    <th class="centered">Total</th>
                                    <th class="centered">Fecha</th>
                                    <th class="centered">Estado del pedido</th>
                                    <th class="centered">Dirección de entrega</th>
                                    <th class="centered">Tipo de pago</th>
                                    <th class="centered">Ver</th>
                                </tr>
                            </thead>
                            <tbody id="tableBody_users"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="./js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.colVis.min.js"></script>
    
</body>
</html>
