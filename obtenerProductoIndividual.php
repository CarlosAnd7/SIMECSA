<?php
require "DAO/ProductoDAO.php";
require "repository/ProductoRepository.php";
require "DTO/ProductoDTO.php";

// Dependiendo de cómo estés manejando las dependencias, podrías necesitar instanciar el ProductoDAO aquí.
$productoDAO = new ProductoDAO();
$productoDTO = new ProductoDTO($productoDAO);

if (!isset($_GET["id"])) {
    http_response_code(500);
    exit();
}

$producto = $productoDTO->obtenerPorId($_GET["id"]);
echo json_encode($producto);

