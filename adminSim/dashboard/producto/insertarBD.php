<?php
$cargaUtil = json_decode(file_get_contents("php://input"));
// Si no hay datos, salir inmediatamente indicando un error 500
if (!$cargaUtil) {
    http_response_code(500);
    exit;
}
// Extraer valores
$idProducto = $cargaUtil->idProducto;
$nombre = $cargaUtil->nombre;
$descripcion = $cargaUtil->descripcion;
$cantidad = $cargaUtil->cantidad;
$precio = $cargaUtil->precio;
$coste = $cargaUtil->coste;
$imagen = $cargaUtil->imagen;
$categoria = $cargaUtil->categoria;
$disponibilidad = 1;

include_once "../../funciones.php";
if (idDisponible($idProducto)) {
    $respuesta = guardarProducto($idProducto, $nombre, $descripcion, $cantidad, $precio, $coste, $imagen, $categoria, $disponibilidad);
    // Devolver al cliente la respuesta de la función
    echo json_encode($respuesta);
}
else{
    http_response_code(401);
    exit;
}
