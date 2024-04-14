<?php
class CategoriaDAO
{
    private $bd;

    public function __construct() {
        $this->bd = ConexionBD::obtenerInstancia()->obtenerConexion();
    }

    function obtenerCategoriasDisponibles()
    {
        $sentencia = $this->bd->query("SELECT nombre FROM categoria");
        return $sentencia->fetchAll();
    }
}
