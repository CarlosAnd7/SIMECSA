<?php
class ProductoDTO implements ProductoRepository {
    private $productoDAO;

    public function __construct($productoDAO) {
        $this->productoDAO = $productoDAO;
    }

    public function obtenerProductosVenta($id) {
        return $this->productoDAO->obtenerProductosVenta($id);
    }

    public function idDisponible($idConsulta) {
        return $this->productoDAO->idDisponible($idConsulta);
    }

    public function actualizarProducto($nombre, $precio, $descripcion, $id) {
        return $this->productoDAO->actualizarProducto($nombre, $precio, $descripcion, $id);
    }

    public function obtenerPorId($id) {
        return $this->productoDAO->obtenerProductoPorId($id);
    }

    public function contarProductos($categoria) {
        return $this->productoDAO->contarProductos($categoria);
    }

    public function contarProductosBusqueda($busqueda) {
        return $this->productoDAO->contarProductosBusqueda($busqueda);
    }

    public function obtenerProducto() {
        return $this->productoDAO->obtenerProducto();
    }

    public function eliminarProducto($id) {
        return $this->productoDAO->eliminarProducto($id);
    }

    public function guardarProducto($nombre, $precio, $descripcion) {
        return $this->productoDAO->guardarProducto($nombre, $precio, $descripcion);
    }

    public function obtenerProductosEnCarrito() {
        return $this->productoDAO->obtenerProductosEnCarrito();
    }

    public function obtenerProductos() {
        return $this->productoDAO->obtenerProductos();
    }

    public function obtenerProductoIndividual($idProducto) {
        return $this->productoDAO->obtenerProductoIndividual($idProducto);
    }

    public function restockProducto($idProducto, $stock) {
        return $this->productoDAO->restockProducto($idProducto, $stock);
    }

    public function dispoProducto($idProducto, $disponibilidad) {
        return $this->productoDAO->dispoProducto($idProducto, $disponibilidad);
    }
}