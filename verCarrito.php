<?php include_once "./navbar.php" ?>
<link rel="stylesheet" href="./css/verCarrito.css">
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
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Mi carrito de compras</h2>
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <form action="./terminarCompra.php" method="POST">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Cantidad</th>
                                    <th>Stock</th>
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
                                                <input name="cantidad<?php echo $i ?>" id="cantidad<?php echo $i ?>" type="number" value="1" min="1" max="<?php echo $producto->stock ?>" oninput="setTotalIndividual(<?php echo $i ?>)">
                                            </div>
                                        </td>
                                        <td>
                                            <p><?php echo $producto->stock ?> unidades disponibles</p>
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
                </div>
                <h2>Elija una dirección</h2>
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-3" id="contenidoDirecciones">
                    <div class="col">
                        <div class="card" id="sucursal" onclick="setDireccion('sucursal')" value="sucursal">
                            <h5 class="card-title">Retirar en sucursal</h5>
                            <img src="./img/tienda.png" class="card-img-top" alt="...">
                        </div>
                    </div>
                </div>
                <input type="hidden" name="direccion" id="direccion">
                <h2>Elija un método de pago</h2>
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-3" id="contenidoPayment">
                    <div class="col">
                        <div class="card" id="efectivo" onclick="setMetodoPago('efectivo')">
                            <h5 class="card-title">Pago en efectivo (Sucursal o Repartidor)</h5>
                            <img src="./img/dinero-en-efectivo.png" class="card-img-top" alt="...">
                        </div>
                    </div>
                    <div class="col">
                        <div class="card" id="transferencia" onclick="setMetodoPago('transferencia')">
                            <h5 class="card-title">Transferencia Bancaria</h5>
                            <img src="./img/transferencia-movil.png" class="card-img-top" alt="...">
                        </div>
                    </div>
                </div>
                <input type="hidden" name="pago" id="pago" value="">
                <div class="d-grid gap-2 col-6 mx-auto">
                    <button type="submit" class="btn btn-success" id="btnSubmit">Terminar compra</button>
                </div>
                </form>
            </div>
        </div>
    </div>


<?php } ?>

<script src="./js/direccionesAlmacenadas.js"></script>
<script src="./js/calcularCompras.js"></script>