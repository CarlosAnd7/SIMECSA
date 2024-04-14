<?php
session_start();
include_once "../../funciones.php";
$empresa = obtenerDatosEmpresa();
echo json_encode($empresa);
