async function llenarCategorias() {
  var contenidoProductos = document.querySelector("#contenidoProductos");

  var columna = document.createElement("div");
  columna.classList.add("col");

  var espacioCategoria = document.createElement("div");
  espacioCategoria.classList.add("card", "h-100", "shadow-sm");

  var imgCategoria = document.createElement("img");
  imgCategoria.classList.add("card-img-top");
  imgCategoria.src = "../img/" + "<?php echo ($categoriaNombre) ?>" + ".png";

  var categoriaBody = document.createElement("div");
  categoriaBody.classList.add("card-body");

  var titulo = document.createElement("h5");
  titulo.classList.add("card-title", "text-center");
  titulo.textContent = "<?php echo ($categoriaNombre) ?>";

  var divBoton = document.createElement("div");
  divBoton.classList.add("text-center", "my-4");

  var boton = document.createElement("a");
  boton.classList.add("btn", "btn-warning");
  boton.href =
    "./mainProducts.php?categoria=" + "<?php echo ($categoriaNombre) ?>";
  boton.textContent = "Ver Más";

  categoriaBody.appendChild(titulo);
  espacioCategoria.appendChild(imgCategoria);
  divBoton.appendChild(boton);
  categoriaBody.appendChild(divBoton);
  espacioCategoria.appendChild(categoriaBody);

  columna.appendChild(espacioCategoria);

  contenidoProductos.appendChild(columna);
}
