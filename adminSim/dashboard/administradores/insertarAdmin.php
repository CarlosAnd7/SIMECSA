<?php
include("../../funciones.php");
$correo = $_POST["correo"];
$nombre = $_POST["nombre"];
$apellidoP = $_POST["apellidoP"];
$apellidoM = $_POST["apellidoM"];
$pass = $_POST["pass"];


if(insertarAdmin($correo, $nombre, $apellidoP,$apellidoM,$pass)){
    echo 0;
}
else{
    echo 1;
}

