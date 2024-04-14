<?php
class DireccionesDao
{
    private $bd;

    public function __construct() {
        $this->bd = ConexionBD::obtenerInstancia()->obtenerConexion();
    }

    function obtenerDirecciones()
    {
        
        $sentencia = $this->bd->prepare("SELECT *
     FROM direcciones
     WHERE Usuariocorreo = ?");
        $sentencia->execute([$_SESSION["correo"]]);
        return $sentencia->fetchAll();
    }

    function agregarDireccion($calle, $ne, $ni, $cp, $colonia, $ciudad)
    {
        $sentencia = $this->bd->prepare("INSERT INTO direcciones(Usuariocorreo, numeroExt, numeroInt, calle, cp, colonia, ciudad) VALUES(?, ?, ?, ?, ?, ?, ?)");
        return $sentencia->execute([$_SESSION["correo"], $ne, $ni, $calle, $cp, $colonia, $ciudad]);
    }

    function eliminarDireccion($ne, $cp, $colonia)
    {
        $sentencia = $this->bd->prepare("DELETE FROM direcciones WHERE Usuariocorreo = ? AND numeroExt = ? AND cp = ? AND colonia = ?");
        return $sentencia->execute([$_SESSION["correo"], $ne, $cp, $colonia]);
    }
}
