<?php
session_start();
if (!isset($_GET["ne"])) {
    http_response_code(500);
    exit();
}

include_once "./funciones.php";
$respuesta = eliminarDireccion($_GET["ne"],$_GET["cp"],$_GET["colonia"]);
echo json_encode($respuesta);
