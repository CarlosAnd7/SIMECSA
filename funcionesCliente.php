function obtenerDatosCliente()
{
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("SELECT *
     FROM usuario
     WHERE correo = ?");
    $sentencia->execute([$_SESSION["correo"]]);
    return $sentencia->fetchAll();
}


function actualizarDatosCliente($nombre, $apellidoP, $apellidoM, $telefono)
{
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("UPDATE usuario SET nombre = ?, apellidoP = ?, apellidoM = ?, telefono = ? WHERE correo = ?");
    return $sentencia->execute([$nombre, $apellidoP, $apellidoM, $telefono, $_SESSION["correo"]]);
}