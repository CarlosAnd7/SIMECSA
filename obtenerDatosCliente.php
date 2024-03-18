<?php
session_start();
include_once "./funciones.php";
$cliente = obtenerDatosCliente();
echo json_encode($cliente);
