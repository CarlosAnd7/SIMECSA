<?php
require Usuario;
$correo = $_POST["correo"];
$tipoUsuario = $_POST["radioTipoCuenta"];
$telefono = $_POST["telefono"];
$nombre = $_POST["nombre"];
$pass = $_POST["pass"];
$pass_confirmar = $_POST["pass_confirmar"];
$apellidoP = null;
$apellidoM = null;

if ($tipoUsuario == "Personal") {
    $apellidoP = $_POST["apellidoP"];
    $apellidoM = $_POST["apellidoM"];
}

if ($pass !== $pass_confirmar) {
    mostrarMensaje("Las contraseñas no coinciden. Intentelo nuevamente con los datos correctos", "error");
} else if (usuarioExiste($correo)) {
    mostrarMensaje("Ya hay un usuario registrado previamente con este correo. Intente con un correo distinto", "error", "./registro.html");
} else if (usuarioExisteTel($telefono)) {
    mostrarMensaje("Ya hay un usuario registrado previamente con este telefono. Intente con un telefono distinto", "error", "./registro.html");
} else {
    // Crear DTO con los datos del formulario
    $usuarioDTO = new UsuarioDTO($correo, $pass, $nombre, $apellidoP, $apellidoM, $telefono, $tipoUsuario);

    // Obtener la instancia del DAO correspondiente utilizando el patrón Singleton
    $usuarioDAO = UsuarioDAOFactory::getUsuarioDAO($tipoUsuario);

    // Registrar el usuario utilizando el DAO
    $registradoCorrectamente = $usuarioDAO->registrarUsuario($usuarioDTO);

    if ($registradoCorrectamente) {
        mostrarMensaje("Registro completado correctamente. Ahora puede iniciar sesión", "success", "./login.html");
    } else {
        mostrarMensaje("Hubo un problema al registrar. Intente de nuevo mas tarde", "error");
    }
}

function mostrarMensaje($mensaje, $icono, $redireccion = "") {
    // Mostrar mensaje con SweetAlert2
}

?>
