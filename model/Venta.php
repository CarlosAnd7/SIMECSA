<?php
class Venta {
    private $idVenta;
    private $total;
    private $fecha;
    private $Usuariocorreo;
    private $estado;
    private $direccion;
    private $pago;
    
    public function __construct($idVenta, $total, $fecha, $Usuariocorreo, $estado, $direccion, $pago) {
        $this->idVenta = $idVenta;
        $this->total = $total;
        $this->fecha = $fecha;
        $this->Usuariocorreo = $Usuariocorreo;
        $this->estado = $estado;
        $this->direccion = $direccion;
        $this->pago = $pago;
    }

    public function getIdVenta() {
        return $this->idVenta;
    }

    public function getTotal() {
        return $this->total;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getUsuariocorreo() {
        return $this->Usuariocorreo;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function getPago() {
        return $this->pago;
    }
}