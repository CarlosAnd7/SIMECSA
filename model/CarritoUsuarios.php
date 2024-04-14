<?php
class CarritoUsuarios {
    private $idSesion;
    private $idProducto;
    
    public function __construct($idSesion, $idProducto) {
        $this->idSesion = $idSesion;
        $this->idProducto = $idProducto;
    }

    public function getIdSesion() {
        return $this->idSesion;
    }

    public function getIdProducto() {
        return $this->idProducto;
    }
}