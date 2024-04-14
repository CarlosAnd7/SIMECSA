let dataTable;
let dataTableIsInitialized = false;
var categoriaBuscada
function recibeCategoria(cat){
  categoriaBuscada = cat;
}
const dataTableOptions = {
  dom: "lBfrtip",
  buttons: [
    {
      extend: "excel",
      text: "<i class='bi bi-file-earmark-spreadsheet-fill'></i> Excel",
      titleAttr: "Exportar a Excel",
      className: "btn btn-success",
      title: categoriaBuscada,
      exportOptions: {
        columns: [1, 2, 4, 5, 6, 7, 8],
      },
    },
    {
      extend: "pdf",
      text: "<i class='bi bi-file-earmark-pdf-fill'></i> PDF",
      titleAttr: "Exportar a Excel",
      className: "btn btn-danger",
      title: categoriaBuscada,
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
    const respuestaRaw = await fetch("./data.php?categoria=" + categoriaBuscada);
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
      $celdaPrecio.innerText = "$"+producto.precio;
      $fila.appendChild($celdaPrecio);

      const $celdaCoste = document.createElement("td");
      $celdaCoste.innerText = "$"+producto.coste;
      $fila.appendChild($celdaCoste);

      const $celdaCategoria = document.createElement("td");
      $celdaCategoria.innerText = producto.Categorianombre;
      $fila.appendChild($celdaCategoria);

      // Extraer el id del producto en el que estamos dentro del ciclo
      const idProducto = producto.idProducto;
      // Link para eliminar
      const $linkEditar = document.createElement("a");
      $linkEditar.href = "./editProduct.php?id=" + idProducto;
      const icon1 = document.createElement("i")
      icon1.classList.add("bi", "bi-pencil-square")
      $linkEditar.appendChild(icon1)
      $linkEditar.classList.add("btn", "btn-primary");
      const $celdaLinkEditar = document.createElement("td");
      $celdaLinkEditar.appendChild($linkEditar);
      $fila.appendChild($celdaLinkEditar);

      // Para el botón de eliminar primero creamos el botón, agregamos su listener y luego lo adjuntamos a su celda
      const $botonEliminar = document.createElement("button");
      $botonEliminar.classList.add("btn", "btn-danger");
      const icon2 = document.createElement("i")
      icon2.classList.add("bi", "bi-trash")
      $botonEliminar.appendChild(icon2)
      $botonEliminar.onclick = async () => {
        const respuestaConfirmacion = await Swal.fire({
          title: "Confirmación",
          text: "¿Eliminar el producto? esto no se puede deshacer",
          icon: "warning",
          showCancelButton: true,
          cancelButtonColor: "#3085d6",
          confirmButtonColor: "#d33",
          confirmButtonText: "Sí, eliminar",
          cancelButtonText: "Cancelar",
        });
        if (respuestaConfirmacion.value) {
          const url = `./eliminar_producto.php?id=${idProducto}`;
          const respuestaRaw = await fetch(url, {
            method: "DELETE",
          });
          const respuesta = await respuestaRaw.json();
          if (respuesta) {
            Swal.fire({
              icon: "success",
              text: "Producto eliminado",
              timer: 700, // <- Ocultar dentro de 0.7 segundos
            });
          } else {
            Swal.fire({
              icon: "error",
              text: "El servidor no respondió con una respuesta exitosa",
            });
          }
          // De cualquier modo, volver a obtener los productos para refrescar la tabla
          listProducts();
        }
      };

      const $celdaBoton = document.createElement("td");
      $celdaBoton.appendChild($botonEliminar);
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
