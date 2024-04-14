<?php
$cargaUtil = json_decode(file_get_contents("php://input"));
// Si no hay datos, salir inmediatamente indicando un error 500
if (!$cargaUtil) {
    // https://parzibyte.me/blog/2021/01/17/php-enviar-codigo-error-500/
    http_response_code(500);
    exit;
}
// Extraer valores
$nombre = $cargaUtil->nombre;
$descripcion = $cargaUtil->descripcion;

include_once "../../funciones.php";

$respuesta = crearCategoria($nombre, $descripcion);
// Devolver al cliente la respuesta de la función
echo json_encode($respuesta);
