<head>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<?php
$correo = $_POST["correo"];
$tipoUsuario = $_POST["radioTipoCuenta"];
$telefono = $_POST["telefono"];
$nombre = $_POST["nombre"];
$pass = $_POST["pass"];
$pass_confirmar = $_POST["pass_confirmar"];

if ($tipoUsuario == "Personal") {
    $apellidoP = $_POST["apellidoP"];
    $apellidoM = $_POST["apellidoM"];
}


# Si no coinciden ambas contraseñas, lo indicamos y salimos
if ($pass !== $pass_confirmar) {
    echo ('
        <script type="text/javascript">  
        window.addEventListener("load", function() {  
            Swal.fire({
            icon: "error",
            title: "Las contraseñas no coinciden. Intentelo nuevamente con los datos correctos",
            confirmButtonText: "Regresar"
    
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location= "./registro.html"
                }
            })
        })
        </script>
        ');
    exit;
}

# Incluimos las funciones, mira funciones.php para una mejor idea
include_once "../funciones.php";

# Primero debemos saber si existe o no
$existe = usuarioExiste($correo);

if ($existe) {
    echo ('
    <script type="text/javascript">   
    window.addEventListener("load", function() { 
        Swal.fire({
        icon: "error",
        title: "Ya hay un usuario registrado previamente con este correo. Intente con un correo distinto",
        confirmButtonText: "Regresar"

        }).then((result) => {
            if (result.isConfirmed) {
                window.location= "./registro.html"
            }
        })
    })
    </script>
    ');
    exit; # Salir para no ejecutar el siguiente código
}

# Si no existe, se ejecuta esta parte
# Ahora intentamos registrarlo
if ($tipoUsuario == "Personal") {
    $registradoCorrectamente = registrarUsuarioPersonal($correo, $pass, $nombre, $apellidoP, $apellidoM, $telefono, $tipoUsuario);
} else {
    $registradoCorrectamente = registrarUsuarioEmpresarial($correo, $pass, $nombre, $telefono, $tipoUsuario);
}
if ($registradoCorrectamente) {
    echo ('
        <script type="text/javascript">
        window.addEventListener("load", function() {
            Swal.fire({
            icon: "success",
            title: "Registro completado correctamente. Ahora puede iniciar sesión",
            confirmButtonText: "Continuar"
    
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location= "./login.html"
                }
            })
        })
        </script>
        ');
} else {
    echo ('
        <script type="text/javascript"> 
        window.addEventListener("load", function() {   
            Swal.fire({
            icon: "error",
            title: "Hubo un problema al registrar. Intente de nuevo mas tarde",
            confirmButtonText: "Regresar"
    
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location= "./registro.html"
                }
            })
        })
        </script>
        ');
}
?>