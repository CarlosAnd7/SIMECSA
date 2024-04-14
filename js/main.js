let dataTable;
let dataTableIsInitialized = false;

const dataTableOptions = {
  
  pageLength: 10,
  destroy: true,
  language: {
    url: "https://cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json",
    lengthMenu: "Mostrar _MENU_ registros por página",
    zeroRecords: "Ningún pedido encontrado",
    info: "Mostrando de _START_ a _END_ de un total de _TOTAL_ registros",
    infoEmpty: "Ningún usuario encontrado",
    infoFiltered: "(filtrados desde _MAX_ registros totales)",
    search: "Buscar:",
    loadingRecords: "Cargando...",
    paginate: {
      first: "Primero",
      last: "Último",
      next: "Siguiente",
      previous: "Anterior",
    },
  },
};

const initDataTable = async () => {
  if (dataTableIsInitialized) {
    dataTable.destroy();
  }

  await listProducts();

  dataTable = $("#datatable_users").DataTable(dataTableOptions);

  dataTableIsInitialized = true;
};

const $cuerpoTabla = document.querySelector("#tableBody_users");

const listProducts = async () => {
  try {
    // Es una petición GET, no necesitamos indicar el método ni el cuerpo
    const respuestaRaw = await fetch("./data.php");
    const pedidos = await respuestaRaw.json();
    // Limpiamos la tabla
    $cuerpoTabla.innerHTML = "";
    // Ahora ya tenemos a los pedidos. Los recorremos
    pedidos.forEach((pedido, index) => {
      // Vamos a ir adjuntando elementos a la tabla.
      const $fila = document.createElement("tr");

      const $celdaNumero = document.createElement("td");
      $celdaNumero.innerText = index + 1;
      $fila.appendChild($celdaNumero);      

      const $celdaTotal = document.createElement("td");
      $celdaTotal.innerText = "$"+pedido.total+" mxn";
      $fila.appendChild($celdaTotal);

      const $celdaFecha = document.createElement("td");
      $celdaFecha.innerText = pedido.fecha;
      $fila.appendChild($celdaFecha);

      const $celdaEstado = document.createElement("td");
      $celdaEstado.innerText = pedido.estado;
      $fila.appendChild($celdaEstado);

      const $celdaDireccion = document.createElement("td");
      $celdaDireccion.innerText = pedido.direccion;
      $fila.appendChild($celdaDireccion);

      const $celdaPago = document.createElement("td");
      $celdaPago.innerText = pedido.pago;
      $fila.appendChild($celdaPago);

      // Extraer el id del pedido en el que estamos dentro del ciclo
      const idVenta = pedido.idVenta;
      // Link para eliminar
      const $linkEditar = document.createElement("a");
      $linkEditar.href = "./verPedidoEspecifico.php?id=" + idVenta;
      $linkEditar.innerHTML = `<i class="bi bi-list"></i>`;
      $linkEditar.classList.add("btn", "btn-primary");
      const $celdaLinkEditar = document.createElement("td");
      $celdaLinkEditar.appendChild($linkEditar);
      $fila.appendChild($celdaLinkEditar);


      // Adjuntamos la fila a la tabla
      $cuerpoTabla.appendChild($fila);
    });
  } catch (ex) {
    alert(ex);
  }
  window.addEventListener("load", async () => {
    await initDataTable();
  });
};

// Y cuando se incluya este script, invocamos a la función
listProducts();
