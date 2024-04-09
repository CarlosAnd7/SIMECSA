<?php

// Clase Venta
class Venta
{
    private $idVenta;
    private $total;
    private $fecha;
    private $usuarioCorreo;

    public function __construct($idVenta, $total, $fecha, $usuarioCorreo)
    {
        $this->idVenta = $idVenta;
        $this->total = $total;
        $this->fecha = $fecha;
        $this->usuarioCorreo = $usuarioCorreo;
    }



    /**
     * Get the value of idVenta
     */
    public function getIdVenta()
    {
        return $this->idVenta;
    }

    /**
     * Set the value of idVenta
     */
    public function setIdVenta($idVenta): self
    {
        $this->idVenta = $idVenta;

        return $this;
    }

    /**
     * Get the value of total
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set the value of total
     */
    public function setTotal($total): self
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Get the value of fecha
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set the value of fecha
     */
    public function setFecha($fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get the value of usuarioCorreo
     */
    public function getUsuarioCorreo()
    {
        return $this->usuarioCorreo;
    }

    /**
     * Set the value of usuarioCorreo
     */
    public function setUsuarioCorreo($usuarioCorreo): self
    {
        $this->usuarioCorreo = $usuarioCorreo;

        return $this;
    }

    function insertarVenta(Venta $venta)
    {
        $bd = obtenerConexion();
        $sentencia = $bd->prepare("INSERT INTO venta(idVenta, total, fecha, usuarioCorreo, estado) VALUES(?, ?, ?, ?, ?)");
        return $sentencia->execute([$venta->getIdVenta(), $venta->getTotal(), $venta->getFecha(), $venta->getUsuarioCorreo(), "Por confirmar"]);
    }

    function obtenerVentaPorId($id)
    {
        $bd = obtenerConexion();
        $sentencia = $bd->prepare("SELECT *  FROM venta WHERE idVenta = ?");
        $sentencia->execute([$id]);
        $ventaData = $sentencia->fetch();
        if ($ventaData) {
            return new Venta($ventaData['idVenta'], $ventaData['total'], $ventaData['fecha'], $ventaData['usuarioCorreo']);
        }
        return null;
    }

    function insertarVentaIndividuales(Venta $venta, $idProducto, $precioIndividual, $cantidad, $total)
    {
        $bd = obtenerConexion();
        $sentencia = $bd->prepare("INSERT INTO producto_venta(VentaidVenta, ProductoidProducto, precioIndividual, cantidad, total) VALUES(?, ?, ?, ?, ?)");
        return $sentencia->execute([$venta->getIdVenta(), $idProducto, $precioIndividual, $cantidad, $total]);
    }
}
