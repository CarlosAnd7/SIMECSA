<?php
require './conf/ConexionBD.php';

class ClienteDAO extends UsuarioDAO
{
    private $bd;

    public function __construct() {
        $this->bd = ConexionBD::obtenerInstancia()->obtenerConexion();
    }

    public function obtenerDatosCliente($correo) {
        $sentencia = $this->bd->prepare("SELECT * FROM usuario WHERE correo = ?");
        $sentencia->execute([$correo]);
        return $sentencia->fetchAll();
    }

    public function actualizarDatosCliente($correo, $nombre, $apellidoP, $apellidoM, $telefono) {
        $sentencia = $this->bd->prepare("UPDATE usuario SET nombre = ?, apellidoP = ?, apellidoM = ?, telefono = ? WHERE correo = ?");
        return $sentencia->execute([$nombre, $apellidoP, $apellidoM, $telefono, $correo]);
    }
}
