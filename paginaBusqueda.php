<!DOCTYPE html>
<html lang="es">
<?php
include("./navbar.php");
$busqueda = $_GET["busqueda"];
?>
<body>

    <main>
        <div class="container-fluid">
            <div class="container-fluid bg-trasparent my-4 p-3">
                <div class="input-group mb-3" id="busqueda">
                    <input type="text" class="form-control" id="campoBusqueda" placeholder="Buscar" value="<?php echo($busqueda); ?>">
                    <button class="btn btn-primary" type="button" id="button-addon1" onclick="buscar()"><i class="bi bi-search"></i></button>
                </div>
                

                <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3" id="contenidoProductos">

                </div>
                <div id="paginacionProductos">
                </div>
            </div>
        </div>
    </main>
</body>

</html>
<script>
    function buscar(){
        window.location.href = "./paginaBusqueda.php?busqueda="+document.querySelector("#campoBusqueda").value
    }
</script>
<script src="./js/panelBusqueda.js"></script>