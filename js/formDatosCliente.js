var nombre = document.querySelector("#nombre");
var apellidoP = document.querySelector("#apellidoP");
var apellidoM = document.querySelector("#apellidoM");
var telefono = document.querySelector("#telefono");
var contenidoDirecciones = document.querySelector("#contenidoDirecciones");

const llenaCampos = async () => {
  const respuestaRaw = await fetch(`obtenerDatosCliente.php`);
  const clientes = await respuestaRaw.json();

  for (const cliente of clientes) {
    nombre.value = cliente.nombre;
    apellidoP.value = cliente.apellidoP;
    apellidoM.value = cliente.apellidoM;
    telefono.value = cliente.telefono;
  }

  const respuestaRaw2 = await fetch(`obtenerDirecciones.php`);
  const direcciones = await respuestaRaw2.json();
  i=0
  for (const direccion of direcciones) {
    i++

    var botonEliminar = document.createElement("button");
    botonEliminar.classList.add("btn-close");
    botonEliminar.onclick = async () => {
        const respuestaConfirmacion = await Swal.fire({
            title: "Confirmación",
            text: "¿Deseas eliminar esta dirección?",
            icon: "warning",
            showCancelButton: true,
            cancelButtonColor: "#3085d6",
            confirmButtonColor: "#d33",
            confirmButtonText: "Sí, eliminar",
            cancelButtonText: "Cancelar",
        });
        if (respuestaConfirmacion.value) {
            const url = `./eliminarDireccion.php?ne=${direccion.numeroExt}&cp=${direccion.cp}&colonia=${direccion.colonia}`;
            const respuestaRaw = await fetch(url, {
                method: "DELETE",
            });
            const respuesta = await respuestaRaw.json();
            if (respuesta) {
                Swal.fire({
                    icon: "success",
                    text: "Dirección eliminada",
                    timer: 2700, // <- Ocultar dentro de 0.7 segundos
                }).then(function() {
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
    var cardBody = document.createElement("div");
    cardBody.classList.add("card-body");
    
    var cardTitle = document.createElement("h5");
    cardTitle.classList.add("card-title");
    cardTitle.innerText = "Dirección " + i
    var cardText = document.createElement("p");
    cardText.classList.add("card-text");
    if(direccion.numeroInt == null){
        cardText.innerText =
        "Numero Exterior: "+direccion.numeroExt + "\n"
        + "Codigo Postal: " +direccion.cp + "\n"
        + "Calle: "+direccion.calle + "\n"
        + "Colonia: "+direccion.colonia + "\n"
        + "Ciudad: " +direccion.ciudad + "\n"
    }
    else{
        cardText.innerText =
        "Numero Interior: "+direccion.numeroInt + "\n"
        + "Numero Exterior: "+direccion.numeroExt + "\n"
        + "Codigo Postal: " +direccion.cp + "\n"
        + "Calle: "+direccion.calle + "\n"
        + "Colonia: "+direccion.colonia + "\n"
        + "Ciudad: " +direccion.ciudad + "\n"
    }
    
    cardBody.appendChild(botonEliminar)
    cardBody.appendChild(cardTitle);
    cardBody.appendChild(cardText);
    cardComponent.appendChild(cardBody);
    contenidoDirecciones.appendChild(cardComponent);
  }
};

llenaCampos();
