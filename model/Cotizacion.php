<?php
// Clase Cotizacion
class Cotizacion {
    private $idCotizacion;
    private $fecha;
    private $plano;
    private $indicacion;
    private $usuarioCorreo;
    private $coste;
    private $aceptado;

    public function __construct($idCotizacion, $fecha, $plano, $indicacion, $usuarioCorreo, $coste, $aceptado) {
        $this->idCotizacion = $idCotizacion;
        $this->fecha = $fecha;
        $this->plano = $plano;
        $this->indicacion = $indicacion;
        $this->usuarioCorreo = $usuarioCorreo;
        $this->coste = $coste;
        $this->aceptado = $aceptado;
    }

    // Métodos getters y setters
}
