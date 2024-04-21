<?php
interface ProductoRepository {
    public function obtenerProductosVenta($id);
    public function idDisponible($idConsulta);
    public function actualizarProducto($nombre, $precio, $descripcion, $id);
    public function obtenerPorId($id);
    public function contarProductos($categoria);
    public function contarProductosBusqueda($busqueda);
    public function obtenerProducto();
    public function eliminarProducto($id);
    public function guardarProducto($nombre, $precio, $descripcion);
    public function obtenerProductosEnCarrito();
    public function obtenerProductos();
    public function obtenerProductoIndividual($idProducto);
    public function restockProducto($idProducto, $stock);
    public function dispoProducto($idProducto, $disponibilidad);
}