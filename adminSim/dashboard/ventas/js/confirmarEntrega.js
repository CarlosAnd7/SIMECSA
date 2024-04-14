let dataTable;
let dataTableIsInitialized = false;
var estado
function recibeCategoria(estadoParam){
  estado = estadoParam;
}

const dataTableOptions = {
  dom: "lBfrtip",
  buttons: [
    {
      extend: "excel",
      text: "<i class='bi bi-file-earmark-spreadsheet-fill'></i> Excel",
      titleAttr: "Exportar a Excel",
      className: "btn btn-success",
      title: "CX",
      exportOptions: {
        columns: [1, 2],
      },
    },
    {
      extend: "pdf",
      text: "<i class='bi bi-file-earmark-pdf-fill'></i> PDF",
      titleAttr: "Exportar a Excel",
      className: "btn btn-danger",
      title: "CX",
      exportOptions: {
        columns: [1, 2],
      },
    },
    {
      extend: "copy",
      text: "<i class='bi bi-clipboard-fill'></i> Copiar",
      className: "btn btn-warning",
      exportOptions: {
        columns: [1, 2],
      },
    },
    {
      extend: "colvis",
      text: "<i class='bi bi-sort-alpha-down'></i> Visualizar",
      className: "btn btn-dark",
    },
  ],
  //scrollX: "2000px",
  lengthMenu: [5, 10, 15, 20, 100, 200, 500],
  columnDefs: [
    { className: "centered", targets: [0, 1, 2,3,4,5,6,7,8] },
    { orderable: false, targets: [7,8] },
    { searchable: false, targets: [0, 7, 8] },
  ],
  pageLength: 10,
  destroy: true,
  language: {
    url: "https://cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json",
    lengthMenu: "Mostrar _MENU_ registros por página",
    zeroRecords: "Ningún venta encontrado",
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
    const respuestaRaw = await fetch("./data.php?estado="+estado);
    const ventas = await respuestaRaw.json();
    // Limpiamos la tabla
    $cuerpoTabla.textContent = "";
    // Ahora ya tenemos a los ventas. Los recorremos
    ventas.forEach((venta, index) => {
      // Vamos a ir adjuntando elementos a la tabla.
      const $fila = document.createElement("tr");

      const numero = document.createElement("td");
      numero.innerText = index + 1;
      $fila.appendChild(numero);

      const celdaID = document.createElement("td");
      celdaID.innerText = venta.idVenta;
      $fila.appendChild(celdaID);

      const total = document.createElement("td");
      total.innerText = "$"+venta.total;
      $fila.appendChild(total);

      const fecha = document.createElement("td");
      fecha.innerText = venta.fecha;
      $fila.appendChild(fecha);

      const direccion = document.createElement("td");
      direccion.innerText = venta.direccion;
      $fila.appendChild(direccion);

      const pago = document.createElement("td");
      pago.innerText = venta.pago;
      $fila.appendChild(pago);

      const nombreCompleto = document.createElement("td");
      nombreCompleto.innerText = venta.nombre + " " + venta.apellidoP + " " +venta.apellidoM;
      $fila.appendChild(nombreCompleto);

      const correoUsuario = document.createElement("td");
      correoUsuario.innerText = venta.Usuariocorreo;
      $fila.appendChild(correoUsuario);

      const telefono = document.createElement("td");
      telefono.innerText = venta.telefono;
      $fila.appendChild(telefono);

      // Extraer el id del venta en el que estamos dentro del ciclo
      const idVenta = venta.idVenta;
      // Link para eliminar
      const $linkEditar = document.createElement("a");
      $linkEditar.href = "./detallesVenta.php?id=" + idVenta;
      $linkEditar.textContent = `<i class="bi bi-list"></i>`;
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
