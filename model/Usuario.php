<?php
class Usuario {
    private $correo;
    private $nombre;
    private $direccion;
    private $telefono;
    private $numeroUsuario;
    private $tipoRegistro;
    private $tipoUsuario;

    public function __construct($correo, $nombre, $direccion, $telefono, $numeroUsuario, $tipoRegistro, $tipoUsuario) {
        $this->correo = $correo;
        $this->nombre = $nombre;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
        $this->numeroUsuario = $numeroUsuario;
        $this->tipoRegistro = $tipoRegistro;
        $this->tipoUsuario = $tipoUsuario;
    }

    // Métodos getters y setters
}

?>
