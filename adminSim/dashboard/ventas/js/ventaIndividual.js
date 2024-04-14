const total = document.querySelector("#total");
const fecha = document.querySelector("#fecha");
const pago = document.querySelector("#pago");
const direccion = document.querySelector("#direccion");
const estado = document.querySelector("#estado");
const tablaProductos = document.querySelector("#contenidoTabla");
const areaBotones = document.querySelector("#areaBotones");
// Una global para establecerla al rellenar el formulario y leerla al enviarlo
let idVenta;
let estadoVenta;
const rellenarFormulario = async () => {
  const urlSearchParams = new URLSearchParams(window.location.search);
  idVenta = urlSearchParams.get("id"); // <-- Actualizar el ID global
  estadoVenta = urlSearchParams.get("estado");
  console.log(estadoVenta);
  // Obtener la venta desde PHP
  const ventaRaw = await fetch(`obtenerVentaIndividual.php?id=${idVenta}`);
  const venta = await ventaRaw.json();

  total.innerText = "$" + venta.total + " mxn";
  fecha.innerText = venta.fecha;
  estado.innerText = venta.estado;
  direccion.innerText = venta.direccion;
  pago.innerText = venta.pago;

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
    precioIndividual.innerText = "$" + producto.precioIndividual + " mxn";
    const cantidad = document.createElement("td");
    cantidad.innerText = producto.cantidad;
    const precioTotal = document.createElement("td");
    precioTotal.innerText = "$" + producto.total + " mxn";

    trProducto.appendChild(num);
    trProducto.appendChild(imagen);
    trProducto.appendChild(productoNombre);
    trProducto.appendChild(precioIndividual);
    trProducto.appendChild(cantidad);
    trProducto.appendChild(precioTotal);

    tablaProductos.appendChild(trProducto);
  }

  if (estadoVenta == "Por enviar") {
    botonEnviar = document.createElement("a");
    botonEnviar.classList.add("btn", "btn-success");
    botonEnviar.href =
      "enviarPedido.php?idVenta=" + idVenta;
    botonEnviar.innerText = "Enviar Pedido";

    botonCancelar = document.createElement("a");
    botonCancelar.classList.add("btn", "btn-danger");
    botonCancelar.href = "cancelarPedido.php?idVenta=" + idVenta;
    botonCancelar.innerText = "Cancelar Pedido";

    areaBotones.appendChild(botonEnviar);
    areaBotones.appendChild(botonCancelar);
  }
  if (estadoVenta == "Por recoger") {
    botonFinalizar = document.createElement("a");
    botonFinalizar.classList.add("btn", "btn-primary");
    botonFinalizar.href = "finalizarPedido.php?idVenta=" + idVenta;
    botonFinalizar.innerText = "Finalizar Pedido";
    
    botonCancelar = document.createElement("a");
    botonCancelar.classList.add("btn", "btn-danger");
    botonCancelar.href = "cancelarPedido.php?idVenta=" + idVenta;
    botonCancelar.innerText = "Cancelar Pedido";

    areaBotones.appendChild(botonFinalizar);
    areaBotones.appendChild(botonCancelar);
  } 
  if (estadoVenta == "Enviado") {
    botonFinalizar = document.createElement("a");
    botonFinalizar.classList.add("btn", "btn-primary");
    botonFinalizar.href = "finalizarPedido.php?idVenta=" + idVenta;
    botonFinalizar.innerText = "Finalizar Pedido";

    areaBotones.appendChild(botonFinalizar);
  }
  if(estadoVenta == "Por confirmar"){
    botonEnviar = document.createElement("a");
    botonEnviar.classList.add("btn", "btn-success");
    botonEnviar.href =
      "aceptarpedido.php?idVenta=" + idVenta + "&direccion="+venta.direccion;
    botonEnviar.innerText = "Aceptar Pedido";

    botonCancelar = document.createElement("a");
    botonCancelar.classList.add("btn", "btn-danger");
    botonCancelar.href = "cancelarPedido.php?idVenta=" + idVenta;
    botonCancelar.innerText = "Cancelar Pedido";

    areaBotones.appendChild(botonEnviar);
    areaBotones.appendChild(botonCancelar);
  }else {
    
  }
};

// Al incluir este script, llamar a la función inmediatamente
rellenarFormulario();
