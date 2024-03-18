<?php
include("./funciones.php");
session_start();
$nombre = $_POST["nombre"];
$apellidoP = $_POST["apellidoP"];
$apellidoM = $_POST["apellidoM"];
$telefono = $_POST["telefono"];


if(actualizarDatosCliente($nombre, $apellidoP,$apellidoM,$telefono)){
    echo 0;
}
echo 1;
