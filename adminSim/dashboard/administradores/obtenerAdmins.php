<?php
session_start();
include_once "../../funciones.php";
$direcciones = obtenerAdmins();
echo json_encode($direcciones);
