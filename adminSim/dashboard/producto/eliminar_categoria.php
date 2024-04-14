<?php
if (!isset($_GET["id"])) {
    http_response_code(500);
    exit();
}

include_once "../../funciones.php";
$respuesta = eliminarCategoria($_GET["id"]);
echo json_encode($respuesta);
