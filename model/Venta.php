<?php

// Clase Venta
class Venta {
    private $idVenta;
    private $total;
    private $fecha;
    private $usuarioCorreo;

    public function __construct($idVenta, $total, $fecha, $usuarioCorreo) {
        $this->idVenta = $idVenta;
        $this->total = $total;
        $this->fecha = $fecha;
        $this->usuarioCorreo = $usuarioCorreo;
    }

    // Métodos getters y setters
}