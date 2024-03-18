<?php
include_once "funciones.php";
if (!isset($_GET["busqueda"])) {
    exit("No hay busqueda");
}
echo json_encode(contarProductosBusqueda($_GET["busqueda"]));
