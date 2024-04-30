<?php
class AdministradorFactory extends AbstractUsuarioFactory {
    public function crearUsuario($datos) {
        return new Administrador(
            $datos['idAdmin'],
            $datos['nombre'],
            $datos['apellidoP'],
            $datos['apellidoM'],
            $datos['pass']
        );
    }
}