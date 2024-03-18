const espacioImagen = document.querySelector("#espacioImagen")
const espacioNombre = document.querySelector("#espacioNombre")
const precioItem = document.querySelector("#precioItem")
const descripcionItem = document.querySelector("#descripcionItem")
const espacioButton = document.querySelector("#buttonDiv")
const espacioButtonDel = document.querySelector("#buttonDel")

const urlSearchParams = new URLSearchParams(window.location.search);
idProductoSearch = urlSearchParams.get("id");
// Una global para establecerla al rellenar el formulario y leerla al enviarlo
var idProducto

const rellenarFormulario = async () => {

    var agregar = document.createElement("a");
    const i = document.createElement("i");

    var peC = await fetch(`comprobarCarrito.php?id=${idProductoSearch}`);
    var sN = await peC.json();

    const checkSession = await fetch(`comprobarSesion.php`);
    const rq = await checkSession.json();

    const urlSearchParams = new URLSearchParams(window.location.search);
    idProducto = urlSearchParams.get("id"); // <-- Actualizar el ID global
    console.log(idProducto)
    // Obtener el producto desde PHP
    const respuestaRaw = await fetch(`obtenerProductoIndividual.php?id=${idProducto}`);
    const producto = await respuestaRaw.json();
   
    const itemCarousel = document.createElement("div")
    itemCarousel.classList.add("carousel-item", "active")
    
    const imagenItem = document.createElement("img")
    imagenItem.classList.add("d-block","w-100")
    imagenItem.src = producto.imagen
    imagenItem.setAttribute("alt", "...")
    const descripcionItemContent = document.createElement("p")
    descripcionItemContent.classList.add("text-gray-500")
    descripcionItem.textContent = producto.descripcion

    const precioItemContent = document.createElement("span")
    precioItemContent.classList.add("ms-1", "fs-5", "fw-bolder", "text-primary")
    precioItemContent.textContent = "$"+producto.precio
    
    const nombreItem = document.createElement("h3")
    nombreItem.classList.add("mb-2")
    nombreItem.textContent = producto.nombre
    

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
            idProducto;
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
          eliminar.href = "./eliminarCarrito.php?id=" + idProducto;
          eliminar.classList.add("btn", "btn-danger");
          eliminar.innerText = "Quitar";
          const iE = document.createElement("i");
          iE.classList.add("bi", "bi-cart-x-fill");
          eliminar.appendChild(iE);
          button3.appendChild(eliminar);
          espacioButtonDel.appendChild(button3);
        }
      }
      $(document).ready(function () {
        $('[data-bs-toggle="popover"]').popover();
      });




    agregar.appendChild(i);
    espacioButton.appendChild(agregar);

    espacioNombre.appendChild(nombreItem)
    itemCarousel.appendChild(imagenItem)
    espacioImagen.appendChild(itemCarousel)
    precioItem.appendChild(precioItemContent)
};

// Al incluir este script, llamar a la función inmediatamente
rellenarFormulario();
