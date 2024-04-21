<?php
class VentaDTO implements VentaRepository {
    private $ventaDAO;

    public function __construct($ventaDAO) {
        $this->ventaDAO = $ventaDAO;
    }

    public function insertarVenta($idVenta, $total, $fecha, $usuarioCorreo) {
        return $this->ventaDAO->insertarVenta($idVenta, $total, $fecha, $usuarioCorreo);
    }

    public function obtenerVentaPorId($id) {
        return $this->ventaDAO->obtenerVentaPorId($id);
    }

    public function insertarVentaIndividuales($idVenta, $idProducto, $precioIndividual, $cantidad, $total) {
        return $this->ventaDAO->insertarVentaIndividuales($idVenta, $idProducto, $precioIndividual, $cantidad, $total);
    }

    public function obtenerVentasEstado($estado) {
        return $this->ventaDAO->obtenerVentasEstado($estado);
    }

    public function cambiarEstadoVenta($idVenta, $estado) {
        return $this->ventaDAO->cambiarEstadoVenta($idVenta, $estado);
    }
}