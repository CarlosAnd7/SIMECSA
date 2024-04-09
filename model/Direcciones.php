<?php
class Direcciones {
    private $Usuariocorreo;
    private $numeroExt;
    private $numeroInt;
    private $calle;
    private $cp;
    private $colonia;
    private $ciudad;
    
    public function __construct($Usuariocorreo, $numeroExt, $numeroInt, $calle, $cp, $colonia, $ciudad) {
        $this->Usuariocorreo = $Usuariocorreo;
        $this->numeroExt = $numeroExt;
        $this->numeroInt = $numeroInt;
        $this->calle = $calle;
        $this->cp = $cp;
        $this->colonia = $colonia;
        $this->ciudad = $ciudad;
    }

    public function getUsuariocorreo() {
        return $this->Usuariocorreo;
    }

    public function getNumeroExt() {
        return $this->numeroExt;
    }

    public function getNumeroInt() {
        return $this->numeroInt;
    }

    public function getCalle() {
        return $this->calle;
    }

    public function getCp() {
        return $this->cp;
    }

    public function getColonia() {
        return $this->colonia;
    }

    public function getCiudad() {
        return $this->ciudad;
    }
}
