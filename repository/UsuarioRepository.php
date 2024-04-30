<?php
interface UsuarioRepository
{
    public function usuarioExiste($correo);

    public function obtenerUsuarioPorCorreo($correo);

    public function registrarUsuarioPersonal($correo, $password, $nombre, $apellidoP, $apellidoM, $telefono, $tipoUsuario);

    public function registrarUsuarioEmpresarial($correo, $password, $nombre, $telefono, $tipoUsuario);

    public function actualizarPassword($correo, $passActual, $passNueva);

    public function login($correo, $password);
}

