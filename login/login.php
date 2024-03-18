<head>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<?php
# Nota: no estamos haciendo validaciones
$correo = $_POST["correo"];
$pass = $_POST["pass"];

# Luego de haber obtenido los valores, ya podemos comprobar
# Incluimos a las funciones, mira funciones.php
include_once "../funciones.php";
$logueadoConExito = login($correo, $pass);
if ($logueadoConExito) {
    # Redirigir a secreta
    header("Location: ../");
    # Y salir
    exit;
} else {
    # Si no, entonces indicarlo
    echo ('
        <script type="text/javascript">
        window.addEventListener("load", function() {
            Swal.fire({
            icon: "error",
            title: "Datos de inicio de sesion incorrectos. Revise su correo o contraseña",
            confirmButtonText: "Regresar"
    
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location= "./login.html"
                }
            })
        })
        </script>
        ');
}
