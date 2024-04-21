<?php
require './conf/ConexionBD.php';

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


    public function crearCategoria($nombre, $descripcion) {
        $sentencia = $this->bd->prepare("INSERT INTO categoria(nombre, descripcion) VALUES(?, ?)");
        return $sentencia->execute([$nombre, $descripcion]);
    }

    public function eliminarCategoria($nombre) {
        $sentencia = $this->bd->prepare("DELETE FROM categoria WHERE nombre = ?");
        return $sentencia->execute([$nombre]);
    }
}
