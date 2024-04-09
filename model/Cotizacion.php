<?php
class Cotizacion {
    private $idCotizacion;
    private $fecha;
    private $plano;
    private $indicacion;
    private $Usuariocorreo;
    private $coste;
    private $aceptado;
    
    public function __construct($idCotizacion, $fecha, $plano, $indicacion, $Usuariocorreo, $coste, $aceptado) {
        $this->idCotizacion = $idCotizacion;
        $this->fecha = $fecha;
        $this->plano = $plano;
        $this->indicacion = $indicacion;
        $this->Usuariocorreo = $Usuariocorreo;
        $this->coste = $coste;
        $this->aceptado = $aceptado;
    }

    public function getIdCotizacion() {
        return $this->idCotizacion;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getPlano() {
        return $this->plano;
    }

    public function getIndicacion() {
        return $this->indicacion;
    }

    public function getUsuariocorreo() {
        return $this->Usuariocorreo;
    }

    public function getCoste() {
        return $this->coste;
    }

    public function getAceptado() {
        return $this->aceptado;
    }
}