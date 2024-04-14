function insertarVenta($idVenta, $total, $fecha, $usuarioCorreo)
{
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("INSERT INTO venta(idVenta, total, fecha, usuarioCorreo, estado) VALUES(?, ?, ?, ?, ?)");
    return $sentencia->execute([$idVenta, $total, $fecha, $usuarioCorreo, "Por confirmar"]);
}

function obtenerVentaPorId($id)
{
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("SELECT *  FROM venta WHERE idVenta = ?");
    $sentencia->execute([$id]);
    $conteo = $sentencia->fetchObject();
    return $conteo;
}

function insertarVentaIndividuales($idVenta, $idProducto, $precioIndividual, $cantidad, $total)
{
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("INSERT INTO producto_venta(VentaidVenta, ProductoidProducto, precioIndividual, cantidad, total) VALUES(?, ?, ?, ?, ?)");
    return $sentencia->execute([$idVenta, $idProducto, $precioIndividual, $cantidad, $total]);
}