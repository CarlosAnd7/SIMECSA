<?php
require './conf/ConexionBD.php';

class VentaDAO
{
    private $bd;

    public function __construct() {
        $this->bd = ConexionBD::obtenerInstancia()->obtenerConexion();
    }
    function insertarVenta($idVenta, $total, $fecha, $usuarioCorreo)
    {
        $sentencia = $this->bd->prepare("INSERT INTO venta(idVenta, total, fecha, usuarioCorreo, estado) VALUES(?, ?, ?, ?, ?)");
        return $sentencia->execute([$idVenta, $total, $fecha, $usuarioCorreo, "Por confirmar"]);
    }

    function obtenerVentaPorId($id)
    {
        $sentencia = $this->bd->prepare("SELECT *  FROM venta WHERE idVenta = ?");
        $sentencia->execute([$id]);
        $conteo = $sentencia->fetchObject();
        return $conteo;
    }

    function insertarVentaIndividuales($idVenta, $idProducto, $precioIndividual, $cantidad, $total)
    {
        $sentencia = $this->bd->prepare("INSERT INTO producto_venta(VentaidVenta, ProductoidProducto, precioIndividual, cantidad, total) VALUES(?, ?, ?, ?, ?)");
        return $sentencia->execute([$idVenta, $idProducto, $precioIndividual, $cantidad, $total]);
    }

    public function obtenerVentasEstado($estado) {
        $sentencia = $this->bd->prepare("SELECT * FROM venta WHERE estado = ?");
        $sentencia->execute([$estado]);
        return $sentencia->fetchAll(PDO::FETCH_COLUMN);
    }

    public function cambiarEstadoVenta($idVenta, $estado) {
        $sentencia = $this->bd->prepare("UPDATE venta SET estado = ? WHERE idVenta = ?");
        return $sentencia->execute([$estado, $idVenta]);
    }
}
