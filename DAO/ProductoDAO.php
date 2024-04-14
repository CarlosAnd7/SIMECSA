<?php
class ProductoDAO
{
    private $bd;

    public function __construct() {
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
}
