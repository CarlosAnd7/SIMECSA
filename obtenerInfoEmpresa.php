<?php
include_once "./funciones.php";
$infoEmpresa = obtenerInfoEmpresa();
echo json_encode($infoEmpresa);
