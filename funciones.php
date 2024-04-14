<?php

function paginarLimit($limit, $offset, $categoria, $busqueda) {
    $conexion = ConexionBD::obtenerInstancia()->obtenerConexion();
    $sentencia = null;
    if ($categoria == "undefined" || $categoria == "") {
        $sentencia = $conexion->prepare("SELECT * FROM producto LIMIT ? OFFSET ?");
        $sentencia->execute([$limit, $offset]);
    } else {
        $sentencia = $conexion->prepare("SELECT * FROM producto WHERE Categorianombre = ? LIMIT ? OFFSET ?");
        $sentencia->execute([$categoria, $limit, $offset]);
    }
    if ($busqueda != "") {
        $sentencia = $conexion->prepare("SELECT * FROM producto WHERE nombre LIKE ? LIMIT ? OFFSET ?");
        $sentencia->execute(["%$busqueda%", $limit, $offset]);
    }
    return $sentencia->fetchAll(PDO::FETCH_OBJ);
}


function obtenerVariableDelEntorno($key)
{
    if (defined("_ENV_CACHE")) {
        $vars = _ENV_CACHE;
    } else {
        $file = "env.php";
        if (!file_exists($file)) {
            throw new Exception("El archivo de las variables de entorno ($file) no existe. Favor de crearlo");
        }
        $vars = parse_ini_file($file);
        define("_ENV_CACHE", $vars);
    }
    if (isset($vars[$key])) {
        return $vars[$key];
    } else {
        throw new Exception("La clave especificada (" . $key . ") no existe en el archivo de las variables de entorno");
    }
}