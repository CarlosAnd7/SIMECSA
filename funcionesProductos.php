function obtenerProductosVenta($id)
{
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("SELECT * 
    FROM producto_venta 
    INNER JOIN producto 
    ON producto_venta.ProductoidProducto = producto.idProducto
    WHERE VentaidVenta = ?");
    $sentencia->execute([$id]);
    return $sentencia->fetchAll();
}

function actualizarProducto($nombre, $precio, $descripcion, $id)
{
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("UPDATE producto SET nombre = ?, precio = ?, descripcion = ? WHERE idProducto = ?");
    return $sentencia->execute([$nombre, $precio, $descripcion, $id]);
}

function obtenerProductoPorId($id)
{
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("SELECT * FROM producto WHERE idProducto = ?");
    $sentencia->execute([$id]);
    $conteo = $sentencia->fetchObject();
    return $conteo;
}

function contarProductos($categoria)
{
    $bd = obtenerConexion();
    if ($categoria == "undefined" || $categoria == "") {
        $sentencia = $bd->query("SELECT count(*) AS conteo FROM producto");
    } else {
        $sentencia = $bd->query("SELECT count(*) AS conteo FROM producto WHERE Categorianombre = '$categoria'");
    }

    return $sentencia->fetchObject()->conteo;
}

function contarProductosBusqueda($busqueda)
{
    $bd = obtenerConexion();
    $sentencia = $bd->query("SELECT count(*) AS conteo FROM producto WHERE nombre LIKE '%$busqueda%'");
    return $sentencia->fetchObject()->conteo;
}


function obtenerProducto()
{
    $bd = obtenerConexion();
    $sentencia = $bd->query("SELECT * FROM producto");
    return $sentencia->fetchAll();
}

function eliminarProducto($id)
{
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("DELETE FROM producto WHERE idProducto = ?");
    return $sentencia->execute([$id]);
}

function guardarProducto($nombre, $precio, $descripcion)
{
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("INSERT INTO producto(nombre, precio, descripcion) VALUES(?, ?, ?)");
    return $sentencia->execute([$nombre, $precio, $descripcion]);
}
