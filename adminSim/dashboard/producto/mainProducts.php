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
    $categorias = obtenerCategoriasDisponibles();
    $categoriaSolicitada = ($_GET["categoria"]);
    ?>
</head>


<body>

    <div>
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./index.php">Productos</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo ($categoriaSolicitada) ?></li>
            </ol>
        </nav>
    </div>

    <div class="tableHeadBtn">
        <div>
            <h1><?php echo ($categoriaSolicitada) ?></h1>
        </div>
        <div>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="fs-6 bi bi-plus-circle"></i> Agregar Producto
            </button>
        </div>
    </div>
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
                            <th class="centered">Editar</th>
                            <th class="centered">Eliminar</th>
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
                    <div class="mb-3">
                        <label for="" class="form-label">Categoria</label>
                        <select class="form-control" name="categoria" id="categoria" onmouseleave="ajustaPrefijo()">
                            <option value="0">- Seleccione -</option>
                            <?php
                            foreach ($categorias as $categoria) {
                                $categoriaNombre = $categoria->nombre;

                                // Opciones con registros
                                echo "<option value='" . $categoriaNombre . "' >" . $categoriaNombre . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <label for="" class="form-label">ID</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="idProducto" id="idProducto" aria-describedby="addOnID">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Descripción</label>
                        <input type="text" class="form-control" name="descripcion" id="descripcion">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Cantidad Disponible</label>
                        <input type="number" class="form-control" name="cantidad" id="cantidad">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Precio</label>
                        <input type="number" class="form-control" name="precio" id="precio">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Coste</label>
                        <input type="number" class="form-control" name="coste" id="coste">
                    </div>


                    <div class="mb-3">
                        <label for="" class="form-label">Link de la imagen</label>
                        <input id="imagen" type="text" class="form-control" name="imagen" onmouseleave="muestraImg()">
                    </div>

                    <div class="mb-3">
                        <img id="vistaPrevia" class="img-fluid rounded mx-auto d-block" src="" alt="">
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
<script>
    var cat = "<?php echo ($categoriaSolicitada) ?>";
    recibeCategoria(cat);
</script>
<script src="./js/formularioControl.js"></script>
<script src="../js/index.js"></script>