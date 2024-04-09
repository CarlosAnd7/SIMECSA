<?php
class ProductoVenta {
    private $ProductoidProducto;
    private $VentaidVenta;
    private $precioIndividual;
    private $cantidad;
    private $total;
    
    public function __construct($ProductoidProducto, $VentaidVenta, $precioIndividual, $cantidad, $total) {
        $this->ProductoidProducto = $ProductoidProducto;
        $this->VentaidVenta = $VentaidVenta;
        $this->precioIndividual = $precioIndividual;
        $this->cantidad = $cantidad;
        $this->total = $total;
    }

    public function getProductoidProducto() {
        return $this->ProductoidProducto;
    }

    public function getVentaidVenta() {
        return $this->VentaidVenta;
    }

    public function getPrecioIndividual() {
        return $this->precioIndividual;
    }

    public function getCantidad() {
        return $this->cantidad;
    }

    public function getTotal() {
        return $this->total;
    }
}