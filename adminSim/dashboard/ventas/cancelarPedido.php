<head>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<?php
if (!isset($_GET["idVenta"])) {
    http_response_code(500);
    exit();
}

include_once "../../funciones.php";
$respuesta = cambiarEstadoVenta($_GET["idVenta"], "Cancelado");
if($respuesta == 1){
    echo ('
    <script type="text/javascript">
    window.addEventListener("load", function() {
        Swal.fire({
        icon: "success",
        title: "Pedido cancelado con exito",
        confirmButtonText: "Continuar"

        }).then((result) => {
            if (result.isConfirmed) {
                window.location= "./revisaVentas.php?estado=Cancelado"
            }
        })
    })
    </script>
    ');
}
else{
echo ('
        <script type="text/javascript">
        window.addEventListener("load", function() {
            Swal.fire({
            icon: "error",
            title: "El pedido no pudo ser cancelado con exito. Intentelo de nuevo mas tarde",
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
