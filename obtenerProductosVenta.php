<?php
if (!isset($_GET["id"])) {
    http_response_code(500);
    exit();
}

include_once "./funciones.php";
$producto = obtenerProductosVenta($_GET["id"]);
echo json_encode($producto);
