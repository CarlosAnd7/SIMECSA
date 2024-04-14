
function obtenerCategoriasDisponibles()
{
    $bd = obtenerConexion();
    $sentencia = $bd->query("SELECT nombre FROM categoria");
    return $sentencia->fetchAll();
}

