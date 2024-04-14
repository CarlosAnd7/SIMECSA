<?php
class DatosContactoDAO {
    private $bd;

    public function __construct() {
        $this->bd = ConexionBD::obtenerInstancia()->obtenerConexion();
    }

    public function obtenerDatosEmpresa() {
        $sentencia = $this->bd->prepare("SELECT * FROM datoscontacto");
        $sentencia->execute();
        return $sentencia->fetchAll();
    }

    public function actualizarDatosEmpresa($telefono, $whatsapp, $direccion, $correo, $facebook) {
        $sentencia = $this->bd->prepare("UPDATE datoscontacto SET telefono = ?, whatsapp = ?, direccion = ?, correo = ?, facebook = ? WHERE nombre = 'simecsa'");
        return $sentencia->execute([$telefono, $whatsapp, $direccion, $correo, $facebook]);
    }
}