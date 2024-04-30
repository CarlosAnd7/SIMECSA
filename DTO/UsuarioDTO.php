<?php

class UsuarioDTO implements UsuarioRepository {

    

    public function usuarioExiste($correo)
    {
        // TODO: Implement usuarioExiste() method.
    }

    public function obtenerUsuarioPorCorreo($correo)
    {
        // TODO: Implement obtenerUsuarioPorCorreo() method.
    }

    public function registrarUsuarioPersonal($correo, $password, $nombre, $apellidoP, $apellidoM, $telefono, $tipoUsuario)
    {
        // TODO: Implement registrarUsuarioPersonal() method.
    }

    public function registrarUsuarioEmpresarial($correo, $password, $nombre, $telefono, $tipoUsuario)
    {
        // TODO: Implement registrarUsuarioEmpresarial() method.
    }

    public function actualizarPassword($correo, $passActual, $passNueva)
    {
        // TODO: Implement actualizarPassword() method.
    }

    public function login($correo, $password)
    {
        // TODO: Implement login() method.
    }
}