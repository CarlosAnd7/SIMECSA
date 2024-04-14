var contenidoAdmins = document.querySelector("#contenidoAdmins");
i = 0;

const cargarAdmins = async () => {
  const respuestaRaw = await fetch(`obtenerAdmins.php`);
  const admins = await respuestaRaw.json();

  for (const admin of admins) {
    i++;

    var botonEliminar = document.createElement("button");
    botonEliminar.classList.add("btn-close", "d-flex", "justify-content-end");
    botonEliminar.onclick = async () => {
      const respuestaConfirmacion = await Swal.fire({
        title: "Confirmación",
        text: "¿Eliminar administrador?. Esto no se puede deshacer",
        icon: "warning",
        showCancelButton: true,
        cancelButtonColor: "#3085d6",
        confirmButtonColor: "#d33",
        confirmButtonText: "Sí, eliminar",
        cancelButtonText: "Cancelar",
      });
      if (respuestaConfirmacion.value) {
        const url = `./eliminarAdmin.php?id=${admin.idAdmin}`;
        const respuestaRaw = await fetch(url, {
          method: "DELETE",
        });
        const respuesta = await respuestaRaw.json();
        if (respuesta) {
          Swal.fire({
            icon: "success",
            text: "Administrador eliminado",
            timer: 2700, // <- Ocultar dentro de 0.7 segundos
          }).then(function () {
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

    var cardComponent = document.createElement("div");
    cardComponent.classList.add("card");
    cardComponent.id = "Adm" + (i + 1);
    cardComponent.value = admin.idAdmin;
    var cardBody = document.createElement("div");
    cardBody.classList.add("card-body");
    cardComponent.appendChild(botonEliminar);

    var cardTitle = document.createElement("h5");
    cardTitle.classList.add("card-title");
    cardTitle.innerText = "ID: " + admin.idAdmin;
    var cardText = document.createElement("p");
    cardText.classList.add("card-text");
    cardText.innerText =
      "Nombre: " + admin.nombre + " " + admin.apellidoP + " " + admin.apellidoM;

    cardBody.appendChild(cardTitle);
    cardBody.appendChild(cardText);
    cardComponent.appendChild(cardBody);

    contenidoAdmins.appendChild(cardComponent);
  }
};

cargarAdmins();
