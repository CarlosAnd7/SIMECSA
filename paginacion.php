<?php
include_once "./funciones.php";
$productos = obtenerCantidadProductos();
print($productos);
echo json_encode($productos);