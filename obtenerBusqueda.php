<?php
if (!isset($_GET["limit"])) {
    http_response_code(500);
    exit();
}

include_once "./funciones.php";

$productos = paginarLimit($_GET["limit"], $_GET["offset"],"",$_GET["busqueda"]);
echo json_encode($productos);
