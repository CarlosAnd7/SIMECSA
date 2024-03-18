<!DOCTYPE html>
<html lang="es">


<?php
include("./navbar.php");
?>

<body>
    <main>
        <div class="container-fluid">
            <div class="row">
                <h1>Detalles de la orden</h1>
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <p id="total"></p>
                    <p id="fecha"></p>
                    <p id="estado"></p>
                </div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Imagen</th>
                            <th scope="col">Producto</th>
                            <th scope="col">Precio Individual</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Precio Total</th>
                        </tr>
                    </thead>
                    <tbody id="contenidoTabla">
                        
                    </tbody>
                </table>

                <a name="" id="" class="btn btn-danger" href="#" role="button">Cancelar Pedido</a>
            </div>
        </div>
    </main>
</body>



</html>
<script src="./js/ventaIndividual.js"></script>