<?php
session_start();
include_once "../../funciones.php";
$admin = obtenerDatosAdmin();
echo json_encode($admin);
