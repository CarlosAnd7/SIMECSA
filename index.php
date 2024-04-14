<!DOCTYPE html>
<html lang="es">
    
<link rel="stylesheet" href="./css/footer.css">
<?php
include("./navbar.php");
?>

<body>

    <main>
        <div class="container-fluid">
            <div class="container-fluid bg-trasparent my-4 p-3">
                <div class="input-group mb-3" id="busqueda">
                    <input type="text" class="form-control" id="campoBusqueda" placeholder="Buscar">
                    <button class="btn btn-primary" type="button" id="button-addon1" onclick="buscar()"><i class="bi bi-search"></i></button>
                </div>
                <div>
                    <section id="radioCategorias" onload="creaRadio()">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="Todo" value="Todo" onchange="cargarCategorias('')">
                            <label class="form-check-label" for="Todo">Todo</label>
                        </div>
                    </section>
                </div>

                <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3" id="contenidoProductos">

                </div>

                <div id="paginacionProductos">
                </div>
            </div>
        </div>
    </main>
    <?php
    include("./footer.php");
    ?>
</body>

</html>

<script>
    function buscar(){
        window.location.href = "./paginaBusqueda.php?busqueda="+document.querySelector("#campoBusqueda").value
    }
    $('#campoBusqueda').keypress(function(e) {
        var keycode = (e.keyCode ? e.keyCode : e.which);
        if (keycode == '13') {
            buscar();
            return false;
        }
    });
</script>

<script src="./js/panelMod.js"></script>