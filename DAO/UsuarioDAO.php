<?php
require './conf/ConexionBD.php';

class UsuarioDAO
{
    private $bd;

    public function __construct()
    {
        $this->bd = ConexionBD::obtenerInstancia()->obtenerConexion();
    }

    public function usuarioExiste($correo)
    {
        $sentencia = $this->bd->prepare("SELECT correo FROM usuario WHERE correo = ? LIMIT 1");
        $sentencia->execute([$correo]);
        return $sentencia->rowCount() > 0;
    }

    public function obtenerUsuarioPorCorreo($correo)
    {
        $sentencia = $this->bd->prepare("SELECT correo, pass FROM usuario WHERE correo = ? LIMIT 1");
        $sentencia->execute([$correo]);
        return $sentencia->fetchObject();
    }

    public function registrarUsuarioPersonal($correo, $password, $nombre, $apellidoP, $apellidoM, $telefono, $tipoUsuario)
    {
        $password = $this->hashearpassword($password);
        $sentencia = $this->bd->prepare("INSERT INTO usuario(correo, pass, nombre, apellidoP, apellidoM, telefono, tipoUsuario) VALUES (?, ?, ?, ?, ?, ?, ?)");
        return $sentencia->execute([$correo, $password, $nombre, $apellidoP, $apellidoM, $telefono, $tipoUsuario]);
    }

    public function registrarUsuarioEmpresarial($correo, $password, $nombre, $telefono, $tipoUsuario)
    {
        $password = $this->hashearpassword($password);
        $sentencia = $this->bd->prepare("INSERT INTO usuario(correo, pass, nombre, telefono, tipoUsuario) VALUES (?, ?, ?, ?, ?)");
        return $sentencia->execute([$correo, $password, $nombre, $telefono, $tipoUsuario]);
    }

    public function actualizarPassword($correo, $passActual, $passNueva)
    {
        $passNuevaHashed = $this->hashearpassword($passNueva);
        $posibleUsuarioRegistrado = $this->obtenerUsuarioPorCorreo($correo);
        $passwordBD = $posibleUsuarioRegistrado->pass;
        $coinciden = $this->coincidenPalabrasSecretas($passActual, $passwordBD);
        if ($coinciden) {
            $sentencia = $this->bd->prepare("UPDATE usuario SET pass = ? WHERE correo = ?");
            return $sentencia->execute([$passNuevaHashed, $correo]);
        } else {
            return false;
        }
    }

    public function login($correo, $password)
    {
        $posibleUsuarioRegistrado = $this->obtenerUsuarioPorCorreo($correo);
        if ($posibleUsuarioRegistrado === false) {
            return false;
        }
        $passwordBD = $posibleUsuarioRegistrado->pass;
        $coinciden = $this->coincidenPalabrasSecretas($password, $passwordBD);
        if (!$coinciden) {
            return false;
        }
        $this->iniciarSesion($posibleUsuarioRegistrado);
        return true;
    }

    private function iniciarSesion($usuario)
    {
        session_start();
        $_SESSION["correo"] = $usuario->correo;
    }

    private function coincidenPalabrasSecretas($password, $passwordBD)
    {
        return password_verify($password, $passwordBD);
    }

    private function hashearpassword($password)
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }
}
