<?php
require "../DAO/ProductoDAO.php";
require "../repository/ProductoRepository.php";
require "../DTO/ProductoDTO.php";

class ProductoController
{
    public function obtenerProductoPorId()
    {
        $productoDAO = new ProductoDAO();
        $productoRepository = new ProductoDTO($productoDAO);

        if (!isset($_GET["id"])) {
            http_response_code(500);
            exit();
        }

        $producto = $productoRepository->obtenerPorId($_GET["id"]);
        echo json_encode($producto);
    }

    public function obtenerProductos()
    {
        $productoDAO = new ProductoDAO();
        $productoRepository = new ProductoDTO($productoDAO);

        $productos = $productoRepository->obtenerProductos();
        echo json_encode($productos);
    }
}


