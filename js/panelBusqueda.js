const contenidoProductos = document.querySelector("#contenidoProductos");
var paginacionProductos = document.querySelector("#paginacionProductos");

const obtenerProductos = async () => {
  paginacionProductos.innerHTML = "";
  const urlSearchParams = new URLSearchParams(window.location.search);
  busqueda = urlSearchParams.get("busqueda");
  paginaActual = urlSearchParams.get("pagina");
  var categoria = urlSearchParams.get("categoria");

  if (paginaActual == null && categoria == null) {
    paginaActual = 1;
    categoria = "";
  }

  const conteoProductos = await fetch(
    `totalBusqueda.php?busqueda=${busqueda}`
  );

  var totalProductos = await conteoProductos.json();

  var itemsPagina = 20;
  offset = (paginaActual - 1) * itemsPagina;
  var paginas = Math.ceil(totalProductos / itemsPagina);

  const respuestaRaw = await fetch(
    `obtenerBusqueda.php?limit=${itemsPagina}&offset=${offset}&categoria=""&busqueda=${busqueda}`
  );
  const productos = await respuestaRaw.json();
  contenidoProductos.innerHTML = "";

  for (const producto of productos) {
    const idProducto = producto.idProducto;
    const peC = await fetch(`comprobarCarrito.php?id=${idProducto}`);
    const sN = await peC.json();

    const checkSession = await fetch(`comprobarSesion.php`);
    const rq = await checkSession.json();

    const columnaItem = document.createElement("div");
    columnaItem.classList.add("col");

    const cardItem = document.createElement("div");
    cardItem.classList.add("card", "h-100", "shadow-sm");
    cardItem.id = producto.idProducto
    cardItem.setAttribute(
      "onClick",
      "verProducto('" + cardItem.id + "')"
    );

    const imgItem = document.createElement("img");
    imgItem.classList.add("card-img-top");
    imgItem.src = producto.imagen;

    const cardBody = document.createElement("div");
    cardBody.classList.add("card-body");

    const tags = document.createElement("div");
    tags.classList.add("clearfix", "mb-3");

    const brandPill = document.createElement("span");
    brandPill.classList.add(
      "float-start",
      "badge",
      "rounded-pill",
      "text-bg-dark"
    );
    brandPill.innerHTML = "$" + producto.precio + " mxn";

    const button = document.createElement("div");
    button.classList.add("text-center", "my-2");

    const button2 = document.createElement("div");
    button2.classList.add("text-center", "my-2");

    const verMas = document.createElement("a");
    verMas.href = "./verProducto.php?id=" + idProducto;
    verMas.classList.add("btn", "btn-warning", "btn-sm");
    verMas.innerText = "Ver Más";

    var agregar = document.createElement("a");
    const i = document.createElement("i");

    const headerNombre = document.createElement("h5");
    headerNombre.innerText = producto.nombre;
    headerNombre.classList.add("card-title");

    cardItem.appendChild(imgItem);
    cardItem.appendChild(cardBody);

    tags.appendChild(brandPill);
    cardBody.appendChild(tags);
    cardBody.appendChild(headerNombre);
    cardBody.appendChild(button2);
    cardBody.appendChild(button);
    button2.appendChild(verMas);
    if (rq == false) {
      agregar = document.createElement("button");
      const attr = document.createAttribute("type");
      attr.value = "button";
      const attr1 = document.createAttribute("data-bs-toggle");
      attr1.value = "popover";
      const attr2 = document.createAttribute("data-bs-title");
      attr2.value = "Aviso";
      const attr3 = document.createAttribute("data-bs-content");
      attr3.value = "Para agregar al carrito debe iniciar sesión";

      agregar.setAttributeNode(attr);

      agregar.classList.add("btn", "btn-outline-success");
      agregar.innerText = "Agregar al carrito";
      agregar.setAttributeNode(attr1);
      agregar.setAttributeNode(attr2);
      agregar.setAttributeNode(attr3);
      i.classList.add("bi", "bi-cart-check-fill");
    } else {
      if (sN == false) {
        agregar.href =
          "./agregarCarrito.php?id=" +
          idProducto +
          "&pagina=" +
          paginaActual +
          "&busqueda=" +
          urlSearchParams.get("busqueda");
        agregar.classList.add("btn", "btn-success");
        agregar.innerText = "Agregar al carrito";
        i.classList.add("fa", "fa-cart-plus");
      } else {
        agregar.href = "./agregarCarrito.php?id=" + idProducto;
        agregar.classList.add("btn", "btn-outline-success", "disabled");
        agregar.innerText = "En el carrito";
        i.classList.add("bi", "bi-cart-check-fill");

        const button3 = document.createElement("div");
        button3.classList.add("text-center", "my-2");

        const eliminar = document.createElement("a");
        eliminar.href = "./eliminarCarrito.php?id=" + idProducto +
        "&pagina=" +
        paginaActual +
        "&busqueda=" +
        urlSearchParams.get("busqueda");
        eliminar.classList.add("btn", "btn-danger");
        eliminar.innerText = "Quitar";
        const iE = document.createElement("i");
        iE.classList.add("bi", "bi-cart-x-fill");
        eliminar.appendChild(iE);
        button3.appendChild(eliminar);
        cardBody.appendChild(button3);
      }
    }
    $(document).ready(function () {
      $('[data-bs-toggle="popover"]').popover();
    });

    agregar.appendChild(i);
    button.appendChild(agregar);
    columnaItem.appendChild(cardItem);

    contenidoProductos.appendChild(columnaItem);
  }

  var nav = document.createElement("nav");
  var div1 = document.createElement("div");
  div1.classList.add("row");

  var div2 = document.createElement("div");
  div2.classList.add("col-xs-12", "col-sm-6");
  var p1 = document.createElement("p");
  if (itemsPagina < totalProductos) {
    p1.innerHTML =
      "Mostrando " +
      itemsPagina +
      " de " +
      totalProductos +
      " productos disponibles";
  }
  else{
    p1.innerHTML =
      "Mostrando " +
      totalProductos +
      " de " +
      totalProductos +
      " productos disponibles";
  }

  div2.appendChild(p1);

  var div3 = document.createElement("div");
  div3.classList.add("col-xs-12", "col-sm-6");
  var p2 = document.createElement("p");
  p2.innerHTML = "Pagina " + paginaActual + " de " + paginas;
  div3.appendChild(p2);

  div1.appendChild(div2);
  div1.appendChild(div3);
  nav.appendChild(div1);

  var ul = document.createElement("ul");
  ul.classList.add("pagination", "pagination-lg", "justify-content-center");

  for (var i = 0; i < paginas; i++) {
    var li = document.createElement("li");
    li.classList.add("page-item");
    var a = document.createElement("a");
    a.id = "pageBTN" + (i + 1);
    a.classList.add("page-link");
    a.innerText = i + 1;
    if (urlSearchParams.get("pagina") == i + 1) {
      a.classList.add("active");
    }
    a.href = "./paginaBusqueda.php?pagina=" + (i + 1)+ "&busqueda="+busqueda;
    li.appendChild(a);
    ul.appendChild(li);
  }

  nav.appendChild(ul);
  paginacionProductos.appendChild(nav);
};
// Y cuando se incluya este script, invocamos a la función
obtenerProductos();

function verProducto(id){
  location.href = "./verProducto.php?id=" + id;
}
