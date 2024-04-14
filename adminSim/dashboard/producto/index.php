<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producto</title>
    <?php
    include "../navbars/navbarLv2.php";
    include_once "../../funciones.php";
    $categorias = obtenerCategoriasDisponibles();
    ?>
</head>




<body onload="cargarCategorias()">
    <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3" id="contenidoProductos">
</body>

<!-- Modal -->
<div class="modal fade" id="agregarCategoria" tabindex="-1" aria-labelledby="agregarCategoria" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="agregarCategoria">Agregar Categoria</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre" id="nombre">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Descripción</label>
                    <input type="text" class="form-control" name="descripcion" id="descripcion">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" id="btnGuardar" class="btn btn-success">Guardar</button>
            </div>
        </div>
    </div>
</div>

<script>
    const cargarCategorias = async () => {
        <?php
        $categorias = obtenerCategoriasDisponibles();

        foreach ($categorias as $categoria) {
            $categoriaNombre = $categoria->nombre;
        ?>

            var contenidoProductos = document.querySelector("#contenidoProductos")

            var columna = document.createElement("div")
            columna.classList.add("col")

            var espacioHeadCard = document.createElement("div")
            espacioHeadCard.classList.add("card-header")

            var listaHC = document.createElement("ul")
            listaHC.classList.add("nav", "nav-tabs", "card-header-tabs")

            var elementosLista = document.createElement("li")
            elementosLista.classList.add("nav-item")

            var tab = document.createElement("a")
            tab.classList.add("nav-link", "active")
            tab.href = "#"
            tab.textContent = "X"

            var botonEliminar = document.createElement("button");
            botonEliminar.classList.add("btn-close", "d-flex", "justify-content-end");
            botonEliminar.onclick = async () => {
                const respuestaConfirmacion = await Swal.fire({
                    title: "Confirmación",
                    text: "¿Eliminar la categoria?. Esto no se puede deshacer. Los productos pertenecientes a la categoria se colocarán en un apartado denominado sin categoria",
                    icon: "warning",
                    showCancelButton: true,
                    cancelButtonColor: "#3085d6",
                    confirmButtonColor: "#d33",
                    confirmButtonText: "Sí, eliminar",
                    cancelButtonText: "Cancelar",
                });
                if (respuestaConfirmacion.value) {
                    const url = `./eliminar_categoria.php?id=${"<?php echo ($categoriaNombre) ?>"}`;
                    const respuestaRaw = await fetch(url, {
                        method: "DELETE",
                    });
                    const respuesta = await respuestaRaw.json();
                    if (respuesta) {
                        Swal.fire({
                            icon: "success",
                            text: "Categoria eliminada",
                            timer: 2700, // <- Ocultar dentro de 0.7 segundos
                        }).then(function() {
                            location.reload();
                        });
                    } else {
                        Swal.fire({
                            icon: "error",
                            text: "El servidor no respondió con una respuesta exitosa",
                        });
                    }
                }
            };



            var espacioCategoria = document.createElement("div")
            espacioCategoria.classList.add("card", "h-100", "shadow-sm")

            var imgCategoria = document.createElement("img")
            imgCategoria.classList.add("card-img-top")
            imgCategoria.src = "../img/" + "<?php echo ($categoriaNombre) ?>" + ".png"

            var categoriaBody = document.createElement("div")
            categoriaBody.classList.add("card-body")


            var titulo = document.createElement("h5")
            titulo.classList.add("card-title", "text-center")
            titulo.textContent = "<?php echo ($categoriaNombre) ?>"

            var divBoton = document.createElement("div")
            divBoton.classList.add("text-center", "my-4")

            var boton = document.createElement("a")
            boton.classList.add("btn", "btn-warning")
            boton.href = "./mainProducts.php?categoria=" + "<?php echo ($categoriaNombre) ?>"
            boton.textContent = "Ver Más"

            espacioCategoria.appendChild(botonEliminar)
            categoriaBody.appendChild(titulo)
            espacioCategoria.appendChild(imgCategoria)
            divBoton.appendChild(boton)

            categoriaBody.appendChild(divBoton)
            espacioCategoria.appendChild(categoriaBody)

            columna.appendChild(espacioCategoria)

            contenidoProductos.appendChild(columna)

        <?php
        }
        ?>
        var columnaCrear = document.createElement("div")
        columnaCrear.classList.add("col")

        espacioCrearCat = document.createElement("div")
        espacioCrearCat.classList.add("card", "h-100", "shadow-sm")

        var imgCrear = document.createElement("img")
        imgCrear.classList.add("card-img-top")
        imgCrear.src = "../img/add.png"

        var crearBody = document.createElement("div")
        crearBody.classList.add("card-body")

        var tituloCrear = document.createElement("h5")
        tituloCrear.classList.add("card-title", "text-center")
        tituloCrear.textContent = "Crear Nueva Categoria"

        var divBotonCrear = document.createElement("div")
        divBotonCrear.classList.add("text-center", "my-4")

        var botonCrear = document.createElement("button")
        botonCrear.type = "button"

        const attr = document.createAttribute("data-bs-toggle");
        attr.value = "modal";

        const attr2 = document.createAttribute("data-bs-target");
        attr2.value = "#agregarCategoria";

        botonCrear.classList.add("btn", "btn-warning")
        botonCrear.setAttributeNode(attr)
        botonCrear.setAttributeNode(attr2)
        botonCrear.textContent = "Crear"

        crearBody.appendChild(tituloCrear)
        espacioCrearCat.appendChild(imgCrear)
        divBotonCrear.appendChild(botonCrear)
        crearBody.appendChild(divBotonCrear)
        espacioCrearCat.appendChild(crearBody)

        columnaCrear.appendChild(espacioCrearCat)

        contenidoProductos.appendChild(columnaCrear)
    }
</script>



</html>

<script src="./js/formularioCategoria.js"></script>
<script src="../js/index.js"></script>