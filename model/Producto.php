<?php
class Producto {
    private $idProducto;
    private $nombre;
    private $descripcion;
    private $stock;
    private $precio;
    private $coste;
    private $imagen;
    private $Categorianombre;
    private $disponibilidad;
    
    public function __construct($idProducto, $nombre, $descripcion, $stock, $precio, $coste, $imagen, $Categorianombre, $disponibilidad) {
        $this->idProducto = $idProducto;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->stock = $stock;
        $this->precio = $precio;
        $this->coste = $coste;
        $this->imagen = $imagen;
        $this->Categorianombre = $Categorianombre;
        $this->disponibilidad = $disponibilidad;
    }

    public function getIdProducto() {
        return $this->idProducto;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getStock() {
        return $this->stock;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function getCoste() {
        return $this->coste;
    }

    public function getImagen() {
        return $this->imagen;
    }

    public function getCategorianombre() {
        return $this->Categorianombre;
    }

    public function getDisponibilidad() {
        return $this->disponibilidad;
    }
}