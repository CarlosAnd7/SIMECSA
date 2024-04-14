<head>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<?php
include_once "../funciones.php";

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
    #mostrarMensaje("Las contraseñas no coinciden. Intentelo nuevamente con los datos correctos", "error");
} else if (usuarioExiste($correo)) {
    mostrarMensaje("Ya hay un usuario registrado previamente con este correo. Intente con un correo distinto", "error", "./registro.html");
} else if (usuarioExisteTel($telefono)) {
    mostrarMensaje("Ya hay un usuario registrado previamente con este telefono. Intente con un telefono distinto", "error", "./registro.html");
}else {
    if ($tipoUsuario == "Personal") {
        $registradoCorrectamente = registrarUsuarioPersonal($correo, $pass, $nombre, $apellidoP, $apellidoM, $telefono, $tipoUsuario);
    } else {
        $registradoCorrectamente = registrarUsuarioEmpresarial($correo, $pass, $nombre, $telefono, $tipoUsuario);
    }

    if ($registradoCorrectamente) {
        mostrarMensaje("Registro completado correctamente. Ahora puede iniciar sesión", "success", "./login.html");
    } else {
        mostrarMensaje("Hubo un problema al registrar. Intente de nuevo mas tarde", "error");
    }
}

function mostrarMensaje($mensaje, $icono, $redireccion = "") {
    echo '
        <script type="text/javascript">
        window.addEventListener("load", function() {
            Swal.fire({
            icon: "' . $icono . '",
            title: "' . $mensaje . '",
            confirmButtonText: "Continuar"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location= "' . $redireccion . '";
                }
            })
        })
        </script>
    ';
    exit;
}
?>