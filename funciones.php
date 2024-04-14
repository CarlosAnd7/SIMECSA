<?php
function obtenerDatosCliente()
{
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("SELECT * FROM usuario WHERE correo = ?");
    $sentencia->execute([$_SESSION["correo"]]);
    return $sentencia->fetchAll();
}

function obtenerDireccionEspecifica($cp, $numeroExt, $numeroInt)
{
    $bd = obtenerConexion();
    $sql = "SELECT * FROM direcciones WHERE Usuariocorreo = ? AND cp = ? AND numeroExt = ?";
    
    if ($numeroInt !== null) {
        $sql .= " AND numeroInt = ?";
        $params = [$_SESSION["correo"], $cp, $numeroExt, $numeroInt];
    } else {
        $params = [$_SESSION["correo"], $cp, $numeroExt];
    }

    $sentencia = $bd->prepare($sql);
    $sentencia->execute($params);
    return $sentencia->fetch(PDO::FETCH_ASSOC);
}

function actualizarDatosCliente($nombre, $apellidoP, $apellidoM, $telefono)
{
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("UPDATE usuario SET nombre = ?, apellidoP = ?, apellidoM = ? WHERE correo = ?");
    return $sentencia->execute([$nombre, $apellidoP, $apellidoM, $_SESSION["correo"]]);
}

function obtenerDirecciones()
{
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("SELECT *
     FROM direcciones
     WHERE Usuariocorreo = ?");
    $sentencia->execute([$_SESSION["correo"]]);
    return $sentencia->fetchAll();
}

function agregarDireccion($calle, $ne, $ni, $cp, $colonia, $ciudad)
{
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("INSERT INTO direcciones(Usuariocorreo, numeroExt, numeroInt, calle, cp, colonia, ciudad) VALUES(?, ?, ?, ?, ?, ?, ?)");
    return $sentencia->execute([$_SESSION["correo"], $ne, $ni, $calle, $cp, $colonia, $ciudad]);
}

function eliminarDireccion($ne, $cp, $colonia)
{
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("DELETE FROM direcciones WHERE Usuariocorreo = ? AND numeroExt = ? AND cp = ? AND colonia = ?");
    return $sentencia->execute([$_SESSION["correo"], $ne, $cp, $colonia]);
}

function insertarVenta($idVenta, $total, $fecha, $usuarioCorreo, $direccion, $pago)
{
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("INSERT INTO venta(idVenta, total, fecha, usuarioCorreo, estado, direccion, pago) VALUES(?, ?, ?, ?, ?, ?, ?)");
    return $sentencia->execute([$idVenta, $total, $fecha, $usuarioCorreo, "Por confirmar", $direccion, $pago]);
}

function obtenerCategoriasDisponibles()
{
    $bd = obtenerConexion();
    $sentencia = $bd->query("SELECT nombre FROM categoria");
    return $sentencia->fetchAll();
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

function insertarVentaIndividuales($idVenta, $idProducto, $precioIndividual, $cantidad, $total)
{
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("INSERT INTO producto_venta(VentaidVenta, ProductoidProducto, precioIndividual, cantidad, total) VALUES(?, ?, ?, ?, ?)");
    return $sentencia->execute([$idVenta, $idProducto, $precioIndividual, $cantidad, $total]);
}

function actualizarStock($idProducto, $cantidad, $cantidadActual)
{
    $bd = obtenerConexion();
    $cantidadAbs = $cantidadActual - $cantidad;
    $sentencia = $bd->prepare("UPDATE producto SET stock = ? WHERE idProducto = ?");
    return $sentencia->execute([$cantidadAbs, $idProducto]);
}

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

function paginarLimit($limit, $offset, $categoria, $busqueda)
{
    $bd = obtenerConexion();
    if ($categoria == "undefined" || $categoria == "") {
        $sentencia = $bd->prepare("SELECT * FROM producto WHERE disponibilidad = 1 AND stock != 0 LIMIT ? OFFSET ?");
        $sentencia->execute([$limit, $offset]);
    } else {
        $sentencia = $bd->prepare("SELECT * FROM producto WHERE disponibilidad = 1 AND stock != 0 AND  Categorianombre = ? LIMIT ? OFFSET ?");
        $sentencia->execute([$categoria, $limit, $offset]);
    }
    if ($busqueda != "") {
        $sentencia = $bd->prepare("SELECT * FROM producto WHERE disponibilidad = 1 AND stock != 0 AND nombre LIKE '%$busqueda%' LIMIT ? OFFSET ?");
        $sentencia->execute([$limit, $offset]);
    }
    return $sentencia->fetchAll(PDO::FETCH_OBJ);
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

function obtenerInfoEmpresa(){
    $bd = obtenerConexion();
    $sentencia = $bd->query("SELECT * FROM datoscontacto");
    return $sentencia->fetchObject();
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

function usuarioExisteTel($telefono)
{
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("SELECT telefono FROM usuario WHERE telefono = '$telefono' LIMIT 1;");
    $sentencia->execute();
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
    return password_hash($password, PASSWORD_ARGON2I);
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
