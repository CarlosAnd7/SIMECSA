<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Articulo</title>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/cards.css">
    <link rel="stylesheet" href="../css/tableStyle.css">
    <!-- Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap Datatables -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap5.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<?php
include "../navbars/navbarLv2.php";
include_once "../../funciones.php";
$categorias = obtenerCategoriasDisponibles();
?>


<body>
    <div>
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./index.php">Productos</a></li>
                <li class="breadcrumb-item"><a href="./mainProducts.php">Articulos de Limpieza</a></li>
                <li class="breadcrumb-item active" aria-current="page">Agregar Productos</li>
            </ol>
        </nav>
    </div>
    <div class="container-fluid">
        <h1>Agregar Producto</h1>
        <div class="mb-3">
            <label for="" class="form-label">Categoria</label>
            <select class="form-control" name="categoria" id="categoria" onclick="ajustarPrefijo()">
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
        <div class="mb-3">
            <label for="" class="form-label">ID</label>
            <input type="text" class="form-control" name="idProducto" id="idProducto" >
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
            <label for="" class="form-label">Vista Previa</label>
            <img id="vistaPrevia" src="" alt="" width="600" height="600">
        </div>


        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" id="btnGuardar" class="btn btn-success">Guardar</button>
    </div>
</body>

</html>

<script src="./js/formularioControl.js"></script>
<script src="../js/index.js"></script>