<?php
class ProductoVentaDAO {
    private $bd;

    public function __construct() {
        $this->bd = ConexionBD::obtenerInstancia()->obtenerConexion();
    }

    public function obtenerProductosVenta($id) {
        $sentencia = $this->bd->prepare("SELECT * 
            FROM producto_venta 
            INNER JOIN producto 
            ON producto_venta.ProductoidProducto = producto.idProducto
            WHERE VentaidVenta = ?");
        $sentencia->execute([$id]);
        return $sentencia->fetchAll();
    }
}
