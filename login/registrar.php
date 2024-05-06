<?php
require "../DAO/UsuarioDAO.php";

$usuarioDAO = new UsuarioDAO();
$correo = $_POST["correo"];
$tipoUsuario = $_POST["radioTipoCuenta"];
$telefono = $_POST["telefono"];
$nombre = $_POST["nombre"];
$pass = $_POST["pass"];
$pass_confirmar = $_POST["pass_confirmar"];
$apellidoP = null;
$apellidoM = null;
 if ($pass !== $pass_confirmar) {
        mostrarMensaje("Las contraseñas no coinciden. Intentelo nuevamente con los datos correctos", "error");
    } else if ($usuarioDAO->usuarioExiste($correo)) {
        mostrarMensaje("Ya hay un usuario registrado previamente con este correo. Intente con un correo distinto", "error", "./registro.html");
    } else if ($usuarioDAO->usuarioExiste($telefono)) {
        mostrarMensaje("Ya hay un usuario registrado previamente con este telefono. Intente con un telefono distinto", "error", "./registro.html");
    } else {
         if ($tipoUsuario == "Personal") {
             $apellidoP = $_POST["apellidoP"];
             $apellidoM = $_POST["apellidoM"];

             // Registrar el usuario utilizando el DAO
             $registradoCorrectamente = $usuarioDAO->registrarUsuarioPersonal($correo, $pass, $nombre, $apellidoP, $apellidoM, $telefono, $tipoUsuario);
         }
         else{
            // Registrar el usuario utilizando el DAO
            $registradoCorrectamente = $usuarioDAO->registrarUsuarioEmpresarial($correo, $pass, $nombre, $apellidoP, $apellidoM);
        }
    }

 if ($registradoCorrectamente) {
     mostrarMensaje("Registro completado correctamente. Ahora puede iniciar sesión", "success", "./login.html");
 } else {
     mostrarMensaje("Hubo un problema al registrar. Intente de nuevo mas tarde", "error");

}

function mostrarMensaje($mensaje, $tipo, $redireccion = null)
{
    echo "<script>";
    echo "swal({
            title: '" . htmlspecialchars($mensaje) . "',
            icon: '" . htmlspecialchars($tipo) . "',
            });";
    if ($redireccion) {
        echo "setTimeout(function() {
                window.location.href = '" . htmlspecialchars($redireccion) . "';
            }, 3000);"; // Redirecciona después de 3 segundos (opcional)
    }
    echo "</script>";
}
