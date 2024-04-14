<?php
class DatosContacto {
    private $nombre;
    private $telefono;
    private $whatsapp;
    private $direccion;
    private $correo;
    private $facebook;
    
    public function __construct($nombre, $telefono, $whatsapp, $direccion, $correo, $facebook) {
        $this->nombre = $nombre;
        $this->telefono = $telefono;
        $this->whatsapp = $whatsapp;
        $this->direccion = $direccion;
        $this->correo = $correo;
        $this->facebook = $facebook;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function getWhatsapp() {
        return $this->whatsapp;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function getCorreo() {
        return $this->correo;
    }

    public function getFacebook() {
        return $this->facebook;
    }
}
