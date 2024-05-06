<?php

class UsuarioDTO implements UsuarioRepository {
    private $usuarioDAO;

    public function __construct($usuarioDAO)
    {
        $this->usuarioDAO = $usuarioDAO;
    }

    public function usuarioExiste($correo)
    {
        return $this->usuarioDAO->usuarioExiste($correo);
    }

    public function obtenerUsuarioPorCorreo($correo)
    {
        return $this->usuarioDAO->obtenerUsuarioPorCorreo($correo);
    }

    public function registrarUsuarioPersonal($correo, $password, $nombre, $apellidoP, $apellidoM, $telefono, $tipoUsuario)
    {
        return $this->usuarioDAO->registrarUsuarioPersonal($correo, $password, $nombre, $apellidoP, $apellidoM, $telefono, $tipoUsuario);
    }

    public function registrarUsuarioEmpresarial($correo, $password, $nombre, $telefono, $tipoUsuario)
    {
        return $this->usuarioDAO->registrarUsuarioEmpresarial($correo, $password, $nombre, $telefono, $tipoUsuario);
    }

    public function actualizarPassword($correo, $passActual, $passNueva)
    {
        return $this->usuarioDAO->actualizarPassword($correo, $passActual, $passNueva);
    }

    public function login($correo, $password)
    {
        return $this->usuarioDAO->login($correo, $password);
    }
}