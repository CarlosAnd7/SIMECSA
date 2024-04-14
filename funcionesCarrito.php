function obtenerProductosEnCarrito()
{
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("SELECT *
     FROM producto
     INNER JOIN carrito_usuarios
     ON producto.idProducto = carrito_usuarios.idProducto
     WHERE carrito_usuarios.idSesion = ?");
    $idSesion = session_id();
    $sentencia->execute([$idSesion]);
    return $sentencia->fetchAll();
}
function quitarProductoDelCarrito($idProducto)
{
    $bd = obtenerConexion();
    $idSesion = session_id();
    $sentencia = $bd->prepare("DELETE FROM carrito_usuarios WHERE idSesion = ? AND idProducto = ?");
    return $sentencia->execute([$idSesion, $idProducto]);
}

function productoYaEstaEnCarrito($idProducto)
{
    $ids = obtenerIdsDeProductosEnCarrito();
    foreach ($ids as $id) {
        if ($id == $idProducto) return true;
    }
    return false;
}

function obtenerIdsDeProductosEnCarrito()
{
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("SELECT idProducto FROM carrito_usuarios WHERE idSesion = ?");
    $idSesion = session_id();
    $sentencia->execute([$idSesion]);
    return $sentencia->fetchAll(PDO::FETCH_COLUMN);
}

function agregarProductoAlCarrito($idProducto)
{
    // Ligar el id del producto con el usuario a través de la sesión
    $bd = obtenerConexion();
    $idSesion = session_id();
    $sentencia = $bd->prepare("INSERT INTO carrito_usuarios(idSesion, idProducto) VALUES (?, ?)");
    return $sentencia->execute([$idSesion, $idProducto]);
}

