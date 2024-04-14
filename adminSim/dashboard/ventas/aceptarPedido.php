<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<?php
if (!isset($_GET["idVenta"])) {
    http_response_code(500);
    exit();
}

include_once "../../funciones.php";

if ($_GET["direccion"] == "Entrega en sucursal") {
    $respuesta = cambiarEstadoVenta($_GET["idVenta"], "Por Recoger");
    if ($respuesta == 1) {
        echo ('
        <script type="text/javascript">
        window.addEventListener("load", function() {
            Swal.fire({
            icon: "success",
            title: "Pedido confirmado para recoger en sucursal",
            confirmButtonText: "Continuar"
    
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location= "./revisaVentas.php?estado=Por%20recoger"
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
                title: "El pedido no pudo ser confirmado con exito. Intentelo de nuevo mas tarde",
                confirmButtonText: "Regresar"
        
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location= "./revisaVentas.php?estado=Por%20confirmar"
                    }
                })
            })
            </script>
            ');
    }
} else {
    $respuesta = cambiarEstadoVenta($_GET["idVenta"], "Por Enviar");
    if ($respuesta == 1) {
        echo ('
        <script type="text/javascript">
        window.addEventListener("load", function() {
            Swal.fire({
            icon: "success",
            title: "Pedido confirmado para enviar",
            confirmButtonText: "Continuar"
    
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location= "./revisaVentas.php?estado=Por%20enviar"
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
                title: "El pedido no pudo ser confirmado con exito. Intentelo de nuevo mas tarde",
                confirmButtonText: "Regresar"
        
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location= "./revisaVentas.php?estado=Por%20confirmar"
                    }
                })
            })
            </script>
            ');
    }
}
