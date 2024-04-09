<?php
class Usuario {
    private $correo;
    private $pass;
    private $nombre;
    private $apellidoP;
    private $apellidoM;
    private $telefono;
    private $numeroUsuario;
    private $tipoRegistro;
    private $tipoUsuario;
    
    public function __construct($correo, $pass, $nombre, $apellidoP, $apellidoM, $telefono, $numeroUsuario, $tipoRegistro, $tipoUsuario) {
        $this->correo = $correo;
        $this->pass = $pass;
        $this->nombre = $nombre;
        $this->apellidoP = $apellidoP;
        $this->apellidoM = $apellidoM;
        $this->telefono = $telefono;
        $this->numeroUsuario = $numeroUsuario;
        $this->tipoRegistro = $tipoRegistro;
        $this->tipoUsuario = $tipoUsuario;
    }

    public function getCorreo() {
        return $this->correo;
    }

    public function getPass() {
        return $this->pass;
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

    public function getTelefono() {
        return $this->telefono;
    }

    public function getNumeroUsuario() {
        return $this->numeroUsuario;
    }

    public function getTipoRegistro() {
        return $this->tipoRegistro;
    }

    public function getTipoUsuario() {
        return $this->tipoUsuario;
    }
}
