<?php
session_start();
$cargaUtil = json_decode(file_get_contents("php://input"));
// Si no hay datos, salir inmediatamente indicando un error 500
if (!$cargaUtil) {
    // https://parzibyte.me/blog/2021/01/17/php-enviar-codigo-error-500/
    http_response_code(500);
    exit;
}
// Extraer valores
$calle = $cargaUtil->calle;
$ne = $cargaUtil->ne;
$ni = $cargaUtil->ni;
$cp = $cargaUtil->cp;
$colonia = $cargaUtil->colonia;
$ciudad = $cargaUtil->ciudad;

include_once "./funciones.php";

if($ni == null){
    $respuesta = agregarDireccion($calle, $ne, "", $cp, $colonia, $ciudad);
}
else{
    $respuesta = agregarDireccion($calle, $ne, $ni, $cp, $colonia, $ciudad);
}

// Devolver al cliente la respuesta de la función
echo json_encode($respuesta);