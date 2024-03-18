<?php
include_once "./funciones.php";
$categorias = obtenerCategoriasDisponibles();
echo json_encode($categorias);
