<?php
interface VentaRepository {
    public function insertarVenta($idVenta, $total, $fecha, $usuarioCorreo);
    public function obtenerVentaPorId($id);
    public function insertarVentaIndividuales($idVenta, $idProducto, $precioIndividual, $cantidad, $total);
    public function obtenerVentasEstado($estado);
    public function cambiarEstadoVenta($idVenta, $estado);
}