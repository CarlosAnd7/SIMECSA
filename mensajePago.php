<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gracias por comprar con nosotros</title>
    <link rel="stylesheet" href="./css/mensajeCompra.css">
</head>
<?php include("./navbar.php"); ?>

<body>
    <div class="container-fluid">
        <h1>Tu solicitud de compra ha sido registrada exitosamente</h1>
        <p>Si has elegido el pago por transferencia realiza el deposito en las siguientes 24 horas
            los datos para el pago son los siguientes
        </p>
        <div class="table-responsive">
            <table class="table table-light">
                <tbody>
                    
                    <tr class="">
                        <th scope="row" >Banco</th>
                        <td>BBVA</td>
                    </tr>
                    <tr class="">
                        <th scope="row">Número de cuenta</th>
                        <td>7489237498327548392</td>
                    </tr>
                    <tr class="">
                        <th scope="row">Nombre de beneficiario</th>
                        <td>SIMECSA</td>
                    </tr>
                    <tr class="">
                        <th scope="row">Concepto</th>
                        <td>#dasjkndjk</td>
                    </tr>
                    <tr class="">
                        <th scope="row">Cantidad</th>
                        <td>$</td>
                    </tr>
                </tbody>
            </table>

            <div>
                <a name="" id="" class="btn btn-primary" href="./verPedidos.php" role="button">Ver pedidos</a>
                <a name="" id="" class="btn btn-success" href="./index.php" role="button">Seguir comprando</a>
            </div>
        </div>

    </div>

</body>

</html>