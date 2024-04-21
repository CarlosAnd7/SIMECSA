<?php
require './conf/ConexionBD.php';

class AdministradorDAO extends UsuarioDAO
{
    private $bd;

    public function obtenerDatosAdmin()
    {
        $sentencia = $this->bd->prepare("SELECT * FROM administrador WHERE idAdmin = ?");
        $sentencia->execute([$_SESSION["correo"]]);
        return $sentencia->fetchAll();
    }

    public function eliminarAdmin($idAdmin)
    {
        $sentencia = $this->bd->prepare("DELETE FROM administrador WHERE idAdmin = ?");
        return $sentencia->execute([$idAdmin]);
    }

    public function insertarAdmin($correo, $nombre, $apellidoP, $apellidoM, $pass)
    {
        $passNuevaHashed = $this->hashearpassword($pass);
        $sentencia = $this->bd->prepare("INSERT INTO administrador (idAdmin, nombre, apellidoP, apellidoM, pass) VALUES (?,?,?,?,?)");
        return $sentencia->execute([$correo, $nombre, $apellidoP, $apellidoM, $passNuevaHashed]);
    }

    public function obtenerAdmins()
    {
        $sentencia = $this->bd->prepare("SELECT * FROM administrador WHERE idAdmin != ?");
        $sentencia->execute([$_SESSION["correo"]]);
        return $sentencia->fetchAll();
    }

    public function actualizarDatosAdmin($nombre, $apellidoP, $apellidoM)
    {
        $sentencia = $this->bd->prepare("UPDATE administrador SET nombre = ?, apellidoP = ?, apellidoM = ? WHERE idAdmin = ?");
        return $sentencia->execute([$nombre, $apellidoP, $apellidoM, $_SESSION["correo"]]);
    }

    private function hashearpassword($password)
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    private function coincidenPalabrasSecretas($password, $passwordBD)
    {
        return password_verify($password, $passwordBD);
    }


    function obtenerAdminPorCorreo($correo)
    {
        $sentencia = $this->bd->prepare("SELECT idAdmin, pass FROM administrador WHERE idAdmin = ? LIMIT 1;");
        $sentencia->execute([$correo]);
        return $sentencia->fetchObject();
    }
       

    public function actualizarPasswordAdmin($passActual, $passNueva) {
        $passNuevaHashed = $this->hashearpassword($passNueva);
        $posibleAdminRegistrado = $this->obtenerAdminPorCorreo($_SESSION["correo"]);
        $passwordBD = $posibleAdminRegistrado->pass;
        $coinciden = $this->coincidenPalabrasSecretas($passActual, $passwordBD);
        $sentencia = $this->bd->prepare("UPDATE administrador SET pass = ? WHERE idAdmin = ?");
        return $sentencia->execute([$passNuevaHashed, $_SESSION["correo"]]);
    }
}
