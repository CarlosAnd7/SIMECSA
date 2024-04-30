<?php
abstract class AbstractUsuarioFactory {
    public abstract function crearUsuario($datos);

    public static function obtenerFactory($tipoUsuario) {
        switch ($tipoUsuario) {
            case 'usuario':
                return new UsuarioFactory();
            case 'administrador':
                return new AdministradorFactory();
            default:
                throw new Exception("Tipo de usuario no válido: $tipoUsuario");
        }
    }
}
