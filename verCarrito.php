<?php include_once "./navbar.php" ?>
<?php
include_once "funciones.php";
$productos = obtenerProductosEnCarrito();
if (count($productos) <= 0) {
?>
    <section class="hero is-info">
        <div class="container-fluid">
            <div class="hero-body">
                <div class="container">
                    <h1 class="title">
                        Todavía no hay productos
                    </h1>
                    <h2 class="subtitle">
                        Visita la tienda para agregar productos a tu carrito
                    </h2>
                    <a href="./index.php" class="btn btn-success"><i class="bi bi-shop"> Ver tienda</i></a>
                </div>
            </div>
        </div>
    </section>
<?php } else { ?>
    <div class="container-fluid">
        <div class="columns">
            <div class="column">
                <h2>Mi carrito de compras</h2>
                <table class="table table-striped table-hover">
                    <form action="./terminarCompra.php" method="POST">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Cantidad</th>
                                <th>Descripción</th>
                                <th>Precio Individual</th>
                                <th>Precio Total</th>
                                <th>Quitar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $total = 0;
                            $i = 0;
                            foreach ($productos as $producto) {
                                $total += $producto->precio;
                                $i += 1;
                            ?>
                                <tr>
                                    <input type="hidden" name="id<?php echo $i ?>" value="<?php echo $producto->idProducto ?>">
                                    <td><?php echo $i ?></td>
                                    <td><?php echo $producto->nombre ?></td>
                                    <td>
                                        <div class="form-group">
                                            <input name="cantidad<?php echo $i ?>" id="cantidad<?php echo $i ?>" type="number" value="1" min="1" oninput="setTotalIndividual(<?php echo $i ?>)">
                                        </div>
                                    </td>
                                    <td><?php echo $producto->descripcion ?></td>
                                    <td><input name="precioIndividual<?php echo $i ?>" id="precioIndividual<?php echo $i ?>" value="<?php echo ($producto->precio) ?>" readonly></td>
                                    <td><input name="precioIndividualTotal<?php echo $i ?>" id="precioIndividualTotal<?php echo $i ?>" value="<?php echo ($producto->precio) ?>" readonly></td>
                                    <td>
                                        <a class="btn btn-danger" href="./eliminarCarrito.php?id=<?php echo $producto->idProducto ?>&redireccionar_carrito">
                                            <i class="bi bi-x-circle-fill"></i>
                                        </a>
                                    </td>
                                <?php } ?>
                                </tr>
                                <input type="hidden" name="i" value="<?php echo $i ?>">
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3" class="is-size-4 has-text-right"><strong>Total</strong></td>
                                <td colspan="3" class="is-size-4" id="total">
                                    <input name="totalCompleto" id="totalCompleto" value="<?php echo ($total) ?>" readonly>
                                </td>
                            </tr>
                        </tfoot>
                </table>
                <div>
                    <h2>Elija una dirección</h2>

                    <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3" id="contenidoDirecciones">

                        <div class="card" id="sucursal" onclick="setDireccion('sucursal')">
                            <h5 class="card-title">Retirar en sucursal</h5>
                            <img src="./img/tienda.png" class="card-img-top" alt="...">
                        </div>
                    </div>
                    <input type="hidden" name="direccion" id="direccion">
                </div>

                <div>
                    <h2>Elija un metodo de pago</h2>
                    <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3" id="contenidoPayment">

                        <div class="card" id="efectivo" onclick="setMetodoPago('efectivo')">
                            <h5 class="card-title">Pago en efectivo en la sucursal</h5>
                            <img src="./img/dinero-en-efectivo.png" class="card-img-top" alt="...">
                        </div>
                        <div class="card" id="transferencia" onclick="setMetodoPago('transferencia')">
                            <h5 class="card-title">Transferencia Bancaria</h5>
                            <img src="./img/transferencia-movil.png" class="card-img-top" alt="...">
                        </div>
                    </div>
                    <input type="hidden" name="pago" id="pago" value="">
                </div>

                <div class="d-grid gap-2 col-6 mx-auto">
                    <button type="submit" class="btn btn-success" id="btnSubmit"> Terminar compra</button>
                </div>
                </form>
            </div>
        </div>

    </div>

<?php } ?>
<script src="./js/direccionesAlmacenadas.js"></script>
<script>
    function setTotalIndividual(i) {
        var cantidad = document.querySelector("#cantidad" + i)
        if (cantidad.value <= 0) {
            cantidad.value = 1
        }
        var precioIndividual = document.querySelector("#precioIndividual" + i)
        var precioIndividualTotal = document.querySelector("#precioIndividualTotal" + i)
        precioIndividualTotal.value = (cantidad.value * precioIndividual.value)
        setTotal()
    }

    function setTotal() {
        var total = document.querySelector("#totalCompleto")
        var t = 0
        i = 1
        while (document.querySelector("#precioIndividualTotal" + i) != null) {
            t += parseFloat(document.querySelector("#precioIndividualTotal" + i).value)
            i++

        }
        total.value = t
    }

    checkFields()

</script>