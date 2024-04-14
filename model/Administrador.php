<?php
class Administrador {
    private $idAdmin;
    private $nombre;
    private $apellidoP;
    private $apellidoM;
    private $pass;
    
    public function __construct($idAdmin, $nombre, $apellidoP, $apellidoM, $pass) {
        $this->idAdmin = $idAdmin;
        $this->nombre = $nombre;
        $this->apellidoP = $apellidoP;
        $this->apellidoM = $apellidoM;
        $this->pass = $pass;
    }

    public function getIdAdmin() {
        return $this->idAdmin;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getApellidoP() {
        return $this->apellidoP;
    }

    public function getApellidoM() {
        return $this->apellidoM;
    }

    public function getPass() {
        return $this->pass;
    }
}
