<?php
class Variacion {
    private $descripcion;
    private $precio;
    private $ProductoidProducto;
    
    public function __construct($descripcion, $precio, $ProductoidProducto) {
        $this->descripcion = $descripcion;
        $this->precio = $precio;
        $this->ProductoidProducto = $ProductoidProducto;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function getProductoidProducto() {
        return $this->ProductoidProducto;
    }
}