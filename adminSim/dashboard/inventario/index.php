<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario</title>
    <?php
    include "../navbars/navbarLv2.php";
    include_once "../../funciones.php";
    $categorias = obtenerCategoriasDisponibles();
    ?>
</head>


<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <table id="datatable_users" class="table table-dark table-striped-columns table-hover">
                    <thead>
                        <tr>
                            <th class="centered">#</th>
                            <th class="centered">ID Producto</th>
                            <th class="centered">Nombre</th>
                            <th class="centered">Imagen</th>
                            <th class="centered">Descripción</th>
                            <th class="centered">Cantidad Disponible</th>
                            <th class="centered">Precio</th>
                            <th class="centered">Coste</th>
                            <th class="centered">Categoria</th>
                            <th class="centered">Disponible</th>
                            <th class="centered">Aumentar Stock</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody_users"></tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="./js/main.js"></script>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Producto</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                    <label for="" class="form-label">ID</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="idProducto" id="idProducto" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Stock</label>
                        <input type="text" class="form-control" name="stock" id="stock" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Piezas para hacer restock</label>
                        <input type="number" class="form-control" name="cantidad" id="cantidad">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" id="btnGuardar" class="btn btn-success">Guardar</button>
                </div>
            </div>
        </div>
    </div>

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
<script src="./js/formularioControl.js"></script>
<script src="../js/index.js"></script>