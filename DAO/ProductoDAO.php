<?php
require './CarritoUsuariosDAO.php';
class ProductoDAO
{
    private $bd;

    public function __construct()
    {
        $this->bd = ConexionBD::obtenerInstancia()->obtenerConexion();
    }

    function obtenerProductosVenta($id)
    {
        $sentencia = $this->bd->prepare("SELECT * 
    FROM producto_venta 
    INNER JOIN producto 
    ON producto_venta.ProductoidProducto = producto.idProducto
    WHERE VentaidVenta = ?");
        $sentencia->execute([$id]);
        return $sentencia->fetchAll();
    }

    function idDisponible($idConsulta)
    {
        $sentencia = $this->bd->prepare("SELECT idProducto FROM producto WHERE idProducto = ? LIMIT 1;");
        $sentencia->execute([$idConsulta]);
        if ($sentencia->fetchObject() === false) {
            return true;
        } else {
            return false;
        }
    }


    function actualizarProducto($nombre, $precio, $descripcion, $id)
    {
        $sentencia = $this->bd->prepare("UPDATE producto SET nombre = ?, precio = ?, descripcion = ? WHERE idProducto = ?");
        return $sentencia->execute([$nombre, $precio, $descripcion, $id]);
    }

    function obtenerProductoPorId($id)
    {
        $sentencia = $this->bd->prepare("SELECT * FROM producto WHERE idProducto = ?");
        $sentencia->execute([$id]);
        $conteo = $sentencia->fetchObject();
        return $conteo;
    }

    function contarProductos($categoria)
    {
        if ($categoria == "undefined" || $categoria == "") {
            $sentencia = $this->bd->query("SELECT count(*) AS conteo FROM producto");
        } else {
            $sentencia = $this->bd->query("SELECT count(*) AS conteo FROM producto WHERE Categorianombre = '$categoria'");
        }

        return $sentencia->fetchObject()->conteo;
    }

    function contarProductosBusqueda($busqueda)
    {
        $sentencia = $this->bd->query("SELECT count(*) AS conteo FROM producto WHERE nombre LIKE '%$busqueda%'");
        return $sentencia->fetchObject()->conteo;
    }


    function obtenerProducto()
    {
        $sentencia = $this->bd->query("SELECT * FROM producto");
        return $sentencia->fetchAll();
    }

    function eliminarProducto($id)
    {
        $sentencia = $this->bd->prepare("DELETE FROM producto WHERE idProducto = ?");
        return $sentencia->execute([$id]);
    }

    function guardarProducto($nombre, $precio, $descripcion)
    {
        $sentencia = $this->bd->prepare("INSERT INTO producto(nombre, precio, descripcion) VALUES(?, ?, ?)");
        return $sentencia->execute([$nombre, $precio, $descripcion]);
    }



    function obtenerProductosEnCarrito()
    {
        $sentencia = $this->bd->prepare("SELECT producto.idProducto, producto.nombre, producto.descripcion, producto.precio
     FROM producto
     INNER JOIN carrito_usuarios
     ON producto.idProducto = carrito_usuarios.idProducto
     WHERE carrito_usuarios.id_sesion = ?");
        $idSesion = session_id();
        $sentencia->execute([$idSesion]);
        return $sentencia->fetchAll();
    }

    function obtenerProductos()
    {
        $sentencia = $this->bd->query("SELECT idProducto, nombre, descripcion, precio FROM producto");
        return $sentencia->fetchAll();
    }

    function obtenerProductoIndividual($idProducto)
    {
        $sentencia = $this->bd->query("SELECT * FROM producto WHERE idProducto = '$idProducto' LIMIT 1;");
        return $sentencia->fetchAll();
    }



    function restockProducto($idProducto, $stock)
    {
        $sentencia = $this->bd->prepare("UPDATE producto SET stock = ? WHERE idProducto = ?");
        return $sentencia->execute([$stock, $idProducto]);
    }

    function dispoProducto($idProducto, $disponibilidad)
    {
        $sentencia = $this->bd->prepare("UPDATE producto SET disponibilidad = ? WHERE idProducto = ?");
        return $sentencia->execute([$disponibilidad, $idProducto]);
    }
}
