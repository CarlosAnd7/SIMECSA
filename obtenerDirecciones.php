<?php
session_start();
include_once "./funciones.php";
$direcciones = obtenerDirecciones();
echo json_encode($direcciones);
