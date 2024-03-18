const total = document.querySelector("#total");
const fecha = document.querySelector("#fecha");
const estado = document.querySelector("#estado");
const tablaProductos = document.querySelector("#contenidoTabla");
// Una global para establecerla al rellenar el formulario y leerla al enviarlo
let idVenta;

const rellenarFormulario = async () => {
  const urlSearchParams = new URLSearchParams(window.location.search);
  idVenta = urlSearchParams.get("id"); // <-- Actualizar el ID global
  console.log(idVenta);
  // Obtener la venta desde PHP
  const ventaRaw = await fetch(`obtenerVentaIndividual.php?id=${idVenta}`);
  const venta = await ventaRaw.json();

  total.innerText = '$'+venta.total+' mxn';
  fecha.innerText = venta.fecha;
  estado.innerText = venta.estado;

  const productoVentaRaw = await fetch(
    `obtenerProductosVenta.php?id=${idVenta}`
  );
  const productosVenta = await productoVentaRaw.json();
  var i = 1;
  for (const producto of productosVenta) {
    const trProducto = document.createElement("tr");

    const num = document.createElement("th");
    num.innerText = i++;
    const imagen = document.createElement("td");

    const elementImg = document.createElement("img");
    elementImg.src = producto.imagen;
    elementImg.width = 100;
    imagen.appendChild(elementImg);

    const productoNombre = document.createElement("td");
    productoNombre.innerText = producto.nombre;
    const precioIndividual = document.createElement("td");
    precioIndividual.innerText = '$'+producto.precioIndividual+' mxn';
    const cantidad = document.createElement("td");
    cantidad.innerText = producto.cantidad;
    const precioTotal = document.createElement("td");
    precioTotal.innerText = '$'+producto.total+' mxn';

    trProducto.appendChild(num);
    trProducto.appendChild(imagen);
    trProducto.appendChild(productoNombre);
    trProducto.appendChild(precioIndividual);
    trProducto.appendChild(cantidad);
    trProducto.appendChild(precioTotal);

    tablaProductos.appendChild(trProducto);
  }
};

// Al incluir este script, llamar a la función inmediatamente
rellenarFormulario();
