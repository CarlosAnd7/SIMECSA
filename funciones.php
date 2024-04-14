<?php

function paginarLimit($limit, $offset, $categoria, $busqueda)
{
    $bd = obtenerConexion();
    if ($categoria == "undefined" || $categoria == "") {
        $sentencia = $bd->prepare("SELECT * FROM producto LIMIT ? OFFSET ?");
        $sentencia->execute([$limit, $offset]);
    } else {
        $sentencia = $bd->prepare("SELECT * FROM producto WHERE Categorianombre = ? LIMIT ? OFFSET ?");
        $sentencia->execute([$categoria, $limit, $offset]);
    }
    if ($busqueda != "") {
        $sentencia = $bd->prepare("SELECT * FROM producto WHERE nombre LIKE '%$busqueda%' LIMIT ? OFFSET ?");
        $sentencia->execute([$limit, $offset]);
    }
    return $sentencia->fetchAll(PDO::FETCH_OBJ);
}

function login($correo, $password)
{
    # Primero obtener usuario...
    $posibleUsuarioRegistrado = obtenerUsuarioPorCorreo($correo);
    if ($posibleUsuarioRegistrado === false) {
        # Si no existe, salimos y regresamos false
        return false;
    }
    # Esto se ejecuta en caso de que exista
    # Comprobar contraseñas
    # Sacar el hash que tenemos en la BD
    $passwordBD = $posibleUsuarioRegistrado->pass;
    $coinciden = coincidenPalabrasSecretas($password, $passwordBD);
    # Si no coinciden, salimos de una vez
    if (!$coinciden) {
        return false;
    }

    # En caso de que sí hayan coincidido iniciamos sesión pasando el objeto
    iniciarSesion($posibleUsuarioRegistrado);
    # Y regresamos true ;)
    return true;
}

function usuarioExiste($correo)
{
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("SELECT correo FROM usuario WHERE correo = ? LIMIT 1;");
    $sentencia->execute([$correo]);
    return $sentencia->rowCount() > 0;
}

function obtenerUsuarioPorCorreo($correo)
{
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("SELECT correo, pass FROM usuario WHERE correo = ? LIMIT 1;");
    $sentencia->execute([$correo]);
    return $sentencia->fetchObject();
}

function registrarUsuarioPersonal($correo, $password, $nombre, $apellidoP, $apellidoM, $telefono, $tipoUsuario)
{
    $password = hashearpassword($password);
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("INSERT INTO usuario(correo, pass, nombre, apellidoP, apellidoM, telefono, tipoUsuario) values(?,?,?,?,?,?,?)");
    return $sentencia->execute([$correo, $password, $nombre, $apellidoP, $apellidoM, $telefono, $tipoUsuario]);
}

function registrarUsuarioEmpresarial($correo, $password, $nombre, $telefono, $tipoUsuario)
{
    $password = hashearpassword($password);
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("INSERT INTO usuario(correo, pass, nombre, telefono, tipoUsuario) values(?,?,?,?,?,)");
    return $sentencia->execute([$correo, $password, $nombre, $telefono, $tipoUsuario]);
}


function iniciarSesion($usuario)
{
    session_start();
    $_SESSION["correo"] = $usuario->correo;
}


function coincidenPalabrasSecretas($password, $passwordBD)
{
    return password_verify($password, $passwordBD);
}
function hashearpassword($password)
{
    return password_hash($password, PASSWORD_BCRYPT);
}

function actualizarPassword($passActual, $passNueva)
{
    $bd = obtenerConexion();
    $passNuevaHashed = hashearpassword($passNueva);
    $posibleUsuarioRegistrado = obtenerUsuarioPorCorreo($_SESSION["correo"]);
    $passwordBD = $posibleUsuarioRegistrado->pass;
    $coinciden = coincidenPalabrasSecretas($passActual, $passwordBD);
    $sentencia = $bd->prepare("UPDATE usuario SET pass = ? WHERE correo = ?");
    return $sentencia->execute([$passNuevaHashed, $_SESSION["correo"]]);
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
function obtenerConexion()
{
    $password = obtenerVariableDelEntorno("MYSQL_PASSWORD");
    $user = obtenerVariableDelEntorno("MYSQL_USER");
    $dbName = obtenerVariableDelEntorno("MYSQL_DATABASE_NAME");
    $database = new PDO('mysql:host=localhost;dbname=' . $dbName, $user, $password);
    $database->query("set names utf8;");
    $database->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
    $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $database->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    return $database;
}
