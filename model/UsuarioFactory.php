<?php
class UsuarioFactory extends AbstractUsuarioFactory {
    public function crearUsuario($datos) {
        return new Usuario(
            $datos['correo'],
            $datos['pass'],
            $datos['nombre'],
            $datos['apellidoP'],
            $datos['apellidoM'],
            $datos['telefono'],
            $datos['numeroUsuario'],
            $datos['tipoRegistro'],
            $datos['tipoUsuario']
        );
    }
}