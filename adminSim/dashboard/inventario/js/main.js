let dataTable;
let dataTableIsInitialized = false;

const dataTableOptions = {
  dom: "lBfrtip",
  buttons: [
    {
      extend: "excel",
      text: "<i class='bi bi-file-earmark-spreadsheet-fill'></i> Excel",
      titleAttr: "Exportar a Excel",
      className: "btn btn-success",
      title: "bajoStock",
      exportOptions: {
        columns: [1, 2, 4, 5, 6, 7, 8],
      },
    },
    {
      extend: "pdf",
      text: "<i class='bi bi-file-earmark-pdf-fill'></i> PDF",
      titleAttr: "Exportar a Excel",
      className: "btn btn-danger",
      title: "bajoStock",
      exportOptions: {
        columns: [1, 2, 4, 5, 6, 7, 8],
      },
    },
    {
      extend: "copy",
      text: "<i class='bi bi-clipboard-fill'></i> Copiar",
      className: "btn btn-warning",
      exportOptions: {
        columns: [1, 2, 4, 5, 6, 7, 8],
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
    { className: "centered", targets: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9] },
    { orderable: false, targets: [3, 4, 8, 9, 10] },
    { searchable: false, targets: [0, 9, 10] },
  ],
  pageLength: 10,
  destroy: true,
  language: {
    url: "https://cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json",
    lengthMenu: "Mostrar _MENU_ registros por página",
    zeroRecords: "Ningún producto encontrado",
    info: "Mostrando de _START_ a _END_ de un total de _TOTAL_ registros",
    infoEmpty: "Ningún producto bajo de stock encontrado",
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
    const respuestaRaw = await fetch("./data.php?");
    const productos = await respuestaRaw.json();
    // Limpiamos la tabla
    $cuerpoTabla.textContent = "";
    // Ahora ya tenemos a los productos. Los recorremos
    productos.forEach((producto, index) => {
      // Vamos a ir adjuntando elementos a la tabla.
      const $fila = document.createElement("tr");

      const $celdaNumero = document.createElement("td");
      $celdaNumero.innerText = index + 1;
      $fila.appendChild($celdaNumero);

      const $celdaID = document.createElement("td");
      $celdaID.innerText = producto.idProducto;
      $fila.appendChild($celdaID);

      const $celdaNombre = document.createElement("td");
      $celdaNombre.innerText = producto.nombre;
      $fila.appendChild($celdaNombre);

      const $celdaImg = document.createElement("td");
      const $elementImg = document.createElement("img");
      $elementImg.src = producto.imagen;
      $elementImg.width = 100;
      $celdaImg.appendChild($elementImg);
      $fila.appendChild($celdaImg);

      const $celdaDescripcion = document.createElement("td");
      $celdaDescripcion.innerText = producto.descripcion;
      $fila.appendChild($celdaDescripcion);

      const $celdaCantidad = document.createElement("td");
      $celdaCantidad.innerText = producto.stock;
      $fila.appendChild($celdaCantidad);

      const $celdaPrecio = document.createElement("td");
      $celdaPrecio.innerText = "$" + producto.precio;
      $fila.appendChild($celdaPrecio);

      const $celdaCoste = document.createElement("td");
      $celdaCoste.innerText = "$" + producto.coste;
      $fila.appendChild($celdaCoste);

      const $celdaCategoria = document.createElement("td");
      $celdaCategoria.innerText = producto.Categorianombre;
      $fila.appendChild($celdaCategoria);

      const checkDisponible = document.createElement("input");
      checkDisponible.classList.add("form-check-input");
      checkDisponible.type = "checkbox";
      checkDisponible.id = producto.idProducto + "chck";
      checkDisponible.value = producto.idProducto;
      checkDisponible.setAttribute(
        "onClick",
        "updateDispo('" + producto.idProducto + "chck','"+producto.disponibilidad+"')"
      );
      if (producto.disponibilidad == "1") {
        checkDisponible.checked = true;
      }
      const $celdacheckDisponible = document.createElement("td");
      $celdacheckDisponible.appendChild(checkDisponible);
      $fila.appendChild($celdacheckDisponible);

      var array = [producto.idProducto, producto.nombre, producto.stock];
      // Para el botón de eliminar primero creamos el botón, agregamos su listener y luego lo adjuntamos a su celda
      const $botonRestock = document.createElement("button");
      $botonRestock.classList.add("btn", "btn-success");
      $botonRestock.setAttribute("data-bs-toggle", "modal");
      $botonRestock.setAttribute("data-bs-target", "#exampleModal");
      $botonRestock.setAttribute(
        "onClick",
        "llenaModal('" + JSON.stringify(array) + "')"
      );
      const icon1 = document.createElement("i");
      icon1.classList.add("bi", "bi-upload");
      $botonRestock.appendChild(icon1);

      const $celdaBoton = document.createElement("td");
      $celdaBoton.appendChild($botonRestock);
      $fila.appendChild($celdaBoton);
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

function llenaModal(arrayProd) {
  var array = JSON.parse(arrayProd);
  let idProducto = document.querySelector("#idProducto");
  idProducto.value = array[0];

  let nombre = document.querySelector("#nombre");
  nombre.value = array[1];

  let stock = document.querySelector("#stock");
  stock.value = array[2];
}

function updateDispo(check,disponibilidad) {
  

  const updateAvailability = async (disponibilidad) => {
    try {
      if (!checkField.value) {
        throw new Error("No hay un ID correcto");
      }

      // Payload to be sent to PHP
      const cargaUtil = {
        idProducto: checkField.value,
        disponibilidad: disponibilidad,
      };

      // Encoding payload
      const cargaUtilCodificada = JSON.stringify(cargaUtil);

      // Sending data to PHP
      const respuestaRaw = await fetch("./updateDisp.php", {
        method: "POST",
        body: cargaUtilCodificada,
      });

      // Server responds with JSON
      const respuesta = await respuestaRaw.json();

      if (respuesta) {
        // If we reach here, everything went well
        Swal.fire({
          icon: "success",
          text: "Disponibilidad actualizada",
          timer: 2700,
        }).then(() => {
          // Reload the page
          location.reload();
        });
        // Assuming $cantidad is defined somewhere in your code
        // $cantidad.value = "";
      } else {
        throw new Error("Error en el servidor. Intenta más tarde");
      }
    } catch (e) {
      // In case of an error
      Swal.fire({
        icon: "error",
        title: "Error",
        text: e.message,
      });
    }
  };
  const checkField = document.getElementById(check);
  if (disponibilidad==1) {
    // If checked, update availability to 0
    console.log(checkField.checked)
    updateAvailability(0);
  } else {
    console.log(checkField.checked)
    // If not checked, update availability to 1
    updateAvailability(1);
  }
}

