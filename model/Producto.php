<?php
// Clase Producto
class Producto {
    private $idProducto;
    private $nombre;
    private $descripcion;
    private $cantidad;
    private $precio;
    private $costo;
    private $imagen;
    private $categoriaNombre;

    public function __construct($idProducto, $nombre, $descripcion, $cantidad, $precio, $costo, $imagen, $categoriaNombre) {
        $this->idProducto = $idProducto;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->cantidad = $cantidad;
        $this->precio = $precio;
        $this->costo = $costo;
        $this->imagen = $imagen;
        $this->categoriaNombre = $categoriaNombre;
    }

    // Métodos getters y setters
}