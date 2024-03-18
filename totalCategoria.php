<?php
include_once "funciones.php";
if (!isset($_GET["categoria"])) {
    exit("No hay categoria");
}
echo json_encode(contarProductos($_GET["categoria"]));
