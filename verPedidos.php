<!DOCTYPE html>
<html lang="es">


<?php
include("./navbar.php");
?>

<body>
    <h2>Pedidos</h2>
    <main>
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <table id="datatable_users" class="table  table-hover">
                        <thead>
                            <tr>
                                <th class="centered">#</th>                                
                                <th class="centered">Total</th>
                                <th class="centered">Fecha</th>
                                <th class="centered">Estado del pedido</th>
                                <th class="centered">Ver</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody_users"></tbody>
                    </table>
                </div>
            </div>
        </div>
        <script src="./js/main.js"></script>
    </main>
</body>

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

</html>