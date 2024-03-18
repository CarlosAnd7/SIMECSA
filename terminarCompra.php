<?php
include_once "funciones.php";
session_start();
date_default_timezone_set('America/Mexico_City');

$i = $_POST["i"];
$total = $_POST["totalCompleto"];
$direccion = $_POST["direccion"];
$pago = $_POST["pago"];
$idVenta = date("dmy//H:i:s").random_string(10);

echo($direccion);
echo($pago);
echo($total);
while($i > 0){
    $id[$i] = $_POST["id".$i];
    $cantidad[$i] = $_POST["cantidad".$i];
    $precioIndividual[$i] = $_POST["precioIndividual".$i];
    $precioIndividualTotal[$i] = $_POST["precioIndividualTotal".$i];
    $i --;    
}
#insertarVenta($idVenta,$total,date("Y/m/d"),$_SESSION["correo"]);
for($j=1; $j<= count($id); $j++){
    #insertarVentaIndividuales($idVenta,$id[$j],$precioIndividual[$j],$cantidad[$j],$precioIndividualTotal[$j]);
    #quitarProductoDelCarrito($id[$j]);
}

function random_string($length) {
    $str = random_bytes($length);
    $str = base64_encode($str);
    $str = str_replace(["+", "/", "="], "", $str);
    $str = substr($str, 0, $length);
    return $str;
}




#header("Location: ./verPedidos.php");
