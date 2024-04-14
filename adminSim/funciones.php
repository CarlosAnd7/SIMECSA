<?php
function obtenerDatosEmpresa()
{
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("SELECT * FROM datoscontacto");
    $sentencia->execute();
    return $sentencia->fetchAll();
}

function actualizarDatosEmpresa($telefono, $whatsapp, $direccion, $correo, $facebook)
{
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("UPDATE datoscontacto SET telefono = ?, whatsapp = ?, direccion = ?, correo = ?, facebook = ?  WHERE nombre = 'simecsa'");
    return $sentencia->execute([$telefono, $whatsapp, $direccion, $correo, $facebook]);
}

function obtenerDatosAdmin()
{
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("SELECT * FROM administrador WHERE idAdmin = ?");
    $sentencia->execute([$_SESSION["correo"]]);
    return $sentencia->fetchAll();
}

function eliminarAdmin($idAdmin)
{
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("DELETE FROM administrador WHERE administrador.idAdmin = ?");
    return $sentencia->execute([$idAdmin]);
}

function insertarAdmin($correo, $nombre, $apellidoP, $apellidoM, $pass)
{
    $passNuevaHashed = hashearpassword($pass);
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("INSERT INTO administrador (idAdmin, nombre, apellidoP, apellidoM, pass) VALUES (?,?,?,?,?)");
    return $sentencia->execute([$correo, $nombre, $apellidoP, $apellidoM, $passNuevaHashed]);
}


function obtenerAdmins()
{
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("SELECT *
     FROM administrador
     WHERE idAdmin != ?");
    $sentencia->execute([$_SESSION["correo"]]);
    return $sentencia->fetchAll();
}

function actualizarDatosAdmin($nombre, $apellidoP, $apellidoM)
{
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("UPDATE administrador SET nombre = ?, apellidoP = ?, apellidoM = ? WHERE idAdmin = ?");
    return $sentencia->execute([$nombre, $apellidoP, $apellidoM, $_SESSION["correo"]]);
}

function crearCategoria($nombre, $descripcion)
{
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("INSERT INTO categoria(nombre, descripcion) VALUES(?, ?)");
    return $sentencia->execute([$nombre, $descripcion]);
}

function obtenerVentasEstado($estado)
{
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("SELECT * FROM venta WHERE estado = '$estado'");
    $sentencia->execute();
    return $sentencia->fetchAll(PDO::FETCH_COLUMN);
}

function cambiarEstadoVenta($idVenta, $estado)
{
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("UPDATE venta SET estado = ? WHERE idVenta = ?");
    return $sentencia->execute([$estado, $idVenta]);
}

function eliminarCategoria($nombre)
{
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("DELETE FROM categoria WHERE nombre = ?");
    return $sentencia->execute([$nombre]);
}

function obtenerVentaPorId($id)
{
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("SELECT *  FROM venta WHERE idVenta = ?");
    $sentencia->execute([$id]);
    $conteo = $sentencia->fetchObject();
    return $conteo;
}

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

function obtenerCategoriasDisponibles()
{
    $bd = obtenerConexion();
    $sentencia = $bd->query("SELECT nombre FROM categoria");
    return $sentencia->fetchAll();
}

function idDisponible($idConsulta)
{
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("SELECT idProducto FROM producto WHERE idProducto = ? LIMIT 1;");
    $sentencia->execute([$idConsulta]);
    if ($sentencia->fetchObject() === false) {
        return true;
    } else {
        return false;
    }
}

function obtenerProductosEnCarrito()
{
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("SELECT producto.idProducto, producto.nombre, producto.descripcion, producto.precio
     FROM producto
     INNER JOIN carrito_usuarios
     ON producto.idProducto = carrito_usuarios.idProducto
     WHERE carrito_usuarios.id_sesion = ?");
    $idSesion = session_id();
    $sentencia->execute([$idSesion]);
    return $sentencia->fetchAll();
}
function quitarProductoDelCarrito($idProducto)
{
    $bd = obtenerConexion();
    $idSesion = session_id();
    $sentencia = $bd->prepare("DELETE FROM carrito_usuarios WHERE id_sesion = ? AND idProducto = ?");
    return $sentencia->execute([$idSesion, $idProducto]);
}

function obtenerProductos()
{
    $bd = obtenerConexion();
    $sentencia = $bd->query("SELECT idProducto, nombre, descripcion, precio FROM producto");
    return $sentencia->fetchAll();
}

function obtenerProductoIndividual($idProducto)
{
    $bd = obtenerConexion();
    $sentencia = $bd->query("SELECT * FROM producto WHERE idProducto = '$idProducto' LIMIT 1;");
    return $sentencia->fetchAll();
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
    $sentencia = $bd->prepare("SELECT idProducto FROM carrito_usuarios WHERE id_sesion = ?");
    $idSesion = session_id();
    $sentencia->execute([$idSesion]);
    return $sentencia->fetchAll(PDO::FETCH_COLUMN);
}

function agregarProductoAlCarrito($idProducto)
{
    // Ligar el id del producto con el usuario a través de la sesión
    $bd = obtenerConexion();
    $idSesion = session_id();
    $sentencia = $bd->prepare("INSERT INTO carrito_usuarios(id_sesion, idProducto) VALUES (?, ?)");
    return $sentencia->execute([$idSesion, $idProducto]);
}


function eliminarProducto($id)
{
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("DELETE FROM producto WHERE idProducto = ?");
    return $sentencia->execute([$id]);
}

function guardarProducto($idProducto, $nombre, $descripcion, $stock, $precio, $coste, $imagen, $categoria)
{
    $disponibilidad = 1;
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("INSERT INTO producto(idProducto, nombre, descripcion, stock, precio, coste, imagen, Categorianombre, disponibilidad) VALUES(?, ?, ?, ?, ?, ?, ?, ?,?)");
    return $sentencia->execute([$idProducto, $nombre, $descripcion, $stock, $precio, $coste, $imagen, $categoria,$disponibilidad]);
}
function actualizarProducto($nombre, $descripcion, $stock, $precio, $coste, $imagen, $categoria, $idProducto)
{
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("UPDATE producto SET nombre = ?, descripcion = ?, stock = ?, precio = ?, coste = ?, imagen = ?, Categorianombre = ? WHERE idProducto = ?");
    return $sentencia->execute([$nombre, $descripcion, $stock, $precio, $coste, $imagen, $categoria, $idProducto]);
}

function restockProducto($idProducto, $stock)
{
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("UPDATE producto SET stock = ? WHERE idProducto = ?");
    return $sentencia->execute([$stock, $idProducto]);
}

function dispoProducto($idProducto, $disponibilidad)
{
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("UPDATE producto SET disponibilidad = ? WHERE idProducto = ?");
    return $sentencia->execute([$disponibilidad, $idProducto]);
}

function login($correo, $password)
{
    $posibleUsuarioRegistrado = obtenerAdminPorCorreo($correo);
    if ($posibleUsuarioRegistrado === false) {
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

function obtenerAdminPorCorreo($correo)
{
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("SELECT idAdmin, pass FROM administrador WHERE idAdmin = ? LIMIT 1;");
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
    // Se encarga de poner los datos dentro de la sesión
    session_start();
    # Y poner los datos, no recomiendo poner la contraseña
    $_SESSION["correo"] = $usuario->idAdmin;
}


function coincidenPalabrasSecretas($password, $passwordBD)
{
    return password_verify($password, $passwordBD);
}

function hashearpassword($password)
{
    return password_hash($password, PASSWORD_ARGON2I);
}

function actualizarPassword($passActual, $passNueva)
{
    $bd = obtenerConexion();
    $passNuevaHashed = hashearpassword($passNueva);
    $posibleUsuarioRegistrado = obtenerUsuarioPorCorreo($_SESSION["correo"]);
    $passwordBD = $posibleUsuarioRegistrado->pass;
    $coinciden = coincidenPalabrasSecretas($passActual, $passwordBD);
    $sentencia = $bd->prepare("UPDATE administrador SET pass = ? WHERE idAdmin = ?");
    return $sentencia->execute([$passNuevaHashed, $_SESSION["correo"]]);
}


function obtenerVariableDelEntorno($key)
{
    if (defined("_ENV_CACHE")) {
        $vars = _ENV_CACHE;
    } else {
        $file = "env.ejemplo.php";
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
