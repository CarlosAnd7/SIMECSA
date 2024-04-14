<?php
include("../../funciones.php");
session_start();
$nombre = $_POST["nombre"];
$apellidoP = $_POST["apellidoP"];
$apellidoM = $_POST["apellidoM"];


if(actualizarDatosAdmin($nombre, $apellidoP,$apellidoM)){
    echo 0;
}
echo 1;
