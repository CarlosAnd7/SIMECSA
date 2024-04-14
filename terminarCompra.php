<?php
include_once "funciones.php";
session_start();
date_default_timezone_set('America/Mexico_City');

$i = $_POST["i"];
$total = $_POST["totalCompleto"];
$direccion = $_POST["direccion"];
$pago = $_POST["pago"];
$idVenta = date("dmy//H:i:s") . random_string(10);


while ($i > 0) {
    $id[$i] = $_POST["id" . $i];
    $cantidad[$i] = $_POST["cantidad" . $i];
    $stock[$i] = $_POST["stock" . $i];
    $precioIndividual[$i] = $_POST["precioIndividual" . $i];
    $precioIndividualTotal[$i] = $_POST["precioIndividualTotal" . $i];
    $i--;
}

if ($direccion == "undefined") {
    insertarVenta($idVenta,$total,date("Y/m/d"),$_SESSION["correo"], "Entrega en sucursal", $pago);
} else {
    $dirExp = explode("/", $direccion);

    if ($dirExp[1] == "") {
        $direccionBD = obtenerDireccionEspecifica($dirExp[2], $dirExp[0], null);
        $direccionStr = "Calle ".$direccionBD["calle"]." Numero Exterior ".$direccionBD["numeroExt"]." Numero Interior ".$direccionBD["numeroInt"]." Codigo Postal ".$direccionBD["cp"]." Colonia ".$direccionBD["colonia"]." ".$direccionBD["ciudad"];
    } else {
        $direccionBD = obtenerDireccionEspecifica($dirExp[2], $dirExp[0], $dirExp[1]);
        $direccionStr = "Calle ".$direccionBD["calle"]." Numero Exterior ".$direccionBD["numeroExt"]." Codigo Postal ".$direccionBD["cp"]." Colonia ".$direccionBD["colonia"]." ".$direccionBD["ciudad"];
    }

    insertarVenta($idVenta,$total,date("Y/m/d"),$_SESSION["correo"], $direccionStr, $pago);
}

for ($j = 1; $j <= count($id); $j++) {
    insertarVentaIndividuales($idVenta,$id[$j],$precioIndividual[$j],$cantidad[$j],$precioIndividualTotal[$j]);
    actualizarStock($id[$j],$cantidad[$j], $stock[$j]);
    quitarProductoDelCarrito($id[$j]);
}

function random_string($length)
{
    $str = random_bytes($length);
    $str = base64_encode($str);
    $str = str_replace(["+", "/", "="], "", $str);
    $str = substr($str, 0, $length);
    return $str;
}


if($pago == "efectivo"){
    header("Location: ./verPedidos.php");
}
else{
    header("Location: ./verPedidos.php");
}


