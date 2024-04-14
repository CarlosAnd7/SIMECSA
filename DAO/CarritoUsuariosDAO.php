<?php
class CarritoUsuariosDAO {
    private $bd;

    public function __construct($bd) {
        $this->bd = $bd;
    }

    public function obtenerProductosEnCarrito() {
        $sentencia = $this->bd->prepare("SELECT * FROM producto INNER JOIN carrito_usuarios ON producto.idProducto = carrito_usuarios.idProducto WHERE carrito_usuarios.idSesion = ?");
        $idSesion = session_id();
        $sentencia->execute([$idSesion]);
        return $sentencia->fetchAll();
    }

    public function quitarProductoDelCarrito($idProducto) {
        $idSesion = session_id();
        $sentencia = $this->bd->prepare("DELETE FROM carrito_usuarios WHERE idSesion = ? AND idProducto = ?");
        return $sentencia->execute([$idSesion, $idProducto]);
    }

    public function productoYaEstaEnCarrito($idProducto) {
        $ids = $this->obtenerIdsDeProductosEnCarrito();
        foreach ($ids as $id) {
            if ($id == $idProducto) return true;
        }
        return false;
    }

    public function obtenerIdsDeProductosEnCarrito() {
        $sentencia = $this->bd->prepare("SELECT idProducto FROM carrito_usuarios WHERE idSesion = ?");
        $idSesion = session_id();
        $sentencia->execute([$idSesion]);
        return $sentencia->fetchAll(PDO::FETCH_COLUMN);
    }

    public function agregarProductoAlCarrito($idProducto) {
        $idSesion = session_id();
        $sentencia = $this->bd->prepare("INSERT INTO carrito_usuarios(idSesion, idProducto) VALUES (?, ?)");
        return $sentencia->execute([$idSesion, $idProducto]);
    }
}
