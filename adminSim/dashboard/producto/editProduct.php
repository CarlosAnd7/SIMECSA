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
    if (!isset($_GET["id"])) {
        http_response_code(500);
        exit();
    }
    $idProductoReq = $_GET["id"];
    include "../navbars/navbarLv2.php";
    include_once "../../funciones.php";
    $categorias = obtenerCategoriasDisponibles();
    $infoProducto = obtenerProductoIndividual($idProductoReq);
    ?>
</head>



<?php
foreach ($infoProducto as $producto) {
    $idProducto = $producto->idProducto;
    $nombre = $producto->nombre;
    $descripcion = $producto->descripcion;
    $cantidad = $producto->stock;
    $precio = $producto->precio;
    $coste = $producto->coste;
    $imagen = $producto->imagen;
    $categoriaProd = $producto->Categorianombre;
}
?>

<body>
    <div>
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./index.php">Productos</a></li>
                <li class="breadcrumb-item"><a href="./mainProducts.php?categoria=<?php echo($categoriaProd);?>"><?php echo($categoriaProd); ?></a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar Producto</li>
            </ol>
        </nav>
    </div>
    <div class="container-fluid">
        <div class="mb-3">
            <label for="" class="form-label">Categoria actual del producto</label>
            <input type="text" class="form-control" value="<?php echo ($categoriaProd) ?>" name="categoria" id="categoria" readonly>
        </div>
        <label for="" class="form-label">ID</label>
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="idProducto" id="idProducto" aria-describedby="addOnID" value="<?php echo ($idProducto) ?>" readonly>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo ($nombre) ?>">
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Descripción</label>
            <input type="text" class="form-control" name="descripcion" id="descripcion" value="<?php echo ($descripcion) ?>">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Cantidad Disponible</label>
            <input type="number" class="form-control" name="cantidad" id="cantidad" value="<?php echo ($cantidad) ?>">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Precio</label>
            <input type="number" class="form-control" name="precio" id="precio" value="<?php echo ($precio) ?>">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Coste</label>
            <input type="number" class="form-control" name="coste" id="coste" value="<?php echo ($coste) ?>">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Link de la imagen</label>
            <input id="imagen" type="text" class="form-control" name="imagen" value="<?php echo ($imagen) ?>" onmouseleave="muestraImg()">
        </div>

        <div class="mb-3">
            <img id="vistaPrevia" class="img-fluid rounded mx-auto d-block" width="400px" src="" alt="">
        </div>
    </div>
    <a name="" id="" class="btn btn-danger" href="./mainProducts.php?categoria=<?php echo ($categoriaProd) ?>" role="button">Cerrar</a>
    <button type="button" id="btnActualizar" class="btn btn-success">Actualizar</button>
    </div>
</body>
<script src="./js/formularioActualizacion.js"></script>
<script src="../js/index.js"></script>