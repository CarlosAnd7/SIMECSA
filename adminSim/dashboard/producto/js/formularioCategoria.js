const $nombre = document.querySelector("#nombre"),
  $descripcion = document.querySelector("#descripcion");

btnGuardar.onclick = async () => {
  var nombre = $nombre.value,
    descripcion = $descripcion.value;
  // Pequeña validación, aunque debería hacerse del lado del servidor igualmente, aquí es pura estética
  if (!nombre) {
    return Swal.fire({
      icon: "error",
      text: "Escribe el nombre",
      timer: 2700, // <- Ocultar dentro de 0.7 segundos
    });
  }
  // Lo que vamos a enviar a PHP
  const cargaUtil = {
    nombre: nombre,
    descripcion: descripcion,
  };
  // Codificamos...
  const cargaUtilCodificada = JSON.stringify(cargaUtil);
  // Enviamos
  try {
    const respuestaRaw = await fetch("./insertarCategoria.php", {
      method: "POST",
      body: cargaUtilCodificada,
    });
    // El servidor nos responderá con JSON
    const respuesta = await respuestaRaw.json();
    if (respuesta) {
      // Y si llegamos hasta aquí, todo ha ido bien
      Swal.fire({
        title: "Categorias",
        text: "Registro actualizado!",
        icon: "success",
      }).then(function () {
        $nombre.value = $descripcion.value = "";
        location.reload();
      });
    } else {
      Swal.fire({
        icon: "error",
        text: "Error en el ID, coloca un ID valido (que no este registrado aun)",
      });
    }
  } catch (e) {
    // En caso de que haya un error
    Swal.fire({
      icon: "error",
      title: "Error de servidor",
      text: "Inténtalo de nuevo. El error es: " + e,
    });
  }
};
