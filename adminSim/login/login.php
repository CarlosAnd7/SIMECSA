<?php
$correo = $_POST["correo"];
$pass = $_POST["pass"];


include_once "../funciones.php";
$logueadoConExito = login($correo, $pass);
echo($logueadoConExito);
