<?php
include("../../funciones.php");
session_start();
$telefono = $_POST["telefono"];
$whatsapp = $_POST["whatsapp"];
$direccion = $_POST["direccion"];
$correo = $_POST["correo"];
$facebook = $_POST["facebook"];

if(actualizarDatosEmpresa($telefono, $whatsapp,$direccion,$correo,$facebook)){
    echo 0;
}
echo 1;
