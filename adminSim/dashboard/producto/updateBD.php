<?php
$cargaUtil = json_decode(file_get_contents("php://input"));
// Si no hay datos, salir inmediatamente indicando un error 500
if (!$cargaUtil) {
    // https://parzibyte.me/blog/2021/01/17/php-enviar-codigo-error-500/
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



include_once "../../funciones.php";

$respuesta = actualizarProducto($nombre, $descripcion, $cantidad, $precio, $coste, $imagen, $categoria, $idProducto);
// Devolver al cliente la respuesta de la función
echo json_encode($respuesta);
