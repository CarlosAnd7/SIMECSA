btnGuardar.onclick = async () => {
  const calle = document.querySelector("#calle").value,
    ne = document.querySelector("#ne").value;
  ni = document.querySelector("#ni").value;
  cp = document.querySelector("#cp").value;
  colonia = document.querySelector("#colonia").value;
  ciudad = document.querySelector("#ciudad").value;

  if (!calle) {
    return Swal.fire({
      icon: "error",
      text: "Escribe el nombre de la calle",
      timer: 2700, // <- Ocultar dentro de 0.7 segundos
    });
  }
  if (!ne) {
    return Swal.fire({
      icon: "error",
      text: "Escribe el numero exterior de tu domicilio",
      timer: 2700, // <- Ocultar dentro de 0.7 segundos
    });
  }
  if (!cp) {
    return Swal.fire({
      icon: "error",
      text: "Escribe el código postal correspondiente a tu domicilio",
      timer: 2700, // <- Ocultar dentro de 0.7 segundos
    });
  }
  if (!colonia) {
    return Swal.fire({
      icon: "error",
      text: "Escribe el nombre de la colonia",
      timer: 2700, // <- Ocultar dentro de 0.7 segundos
    });
  }
  if (!ciudad) {
    return Swal.fire({
      icon: "error",
      text: "Escribe el nombre de la ciudad",
      timer: 2700, // <- Ocultar dentro de 0.7 segundos
    });
  }
  // Lo que vamos a enviar a PHP
  const cargaUtil = {
    calle: calle,
    ne: ne,
    ni: ni,
    cp: cp,
    colonia: colonia,
    ciudad: ciudad,
  };
  // Codificamos...
  const cargaUtilCodificada = JSON.stringify(cargaUtil);
  // Enviamos
  try {
    const respuestaRaw = await fetch("./addDireccion.php", {
      method: "POST",
      body: cargaUtilCodificada,
    });
    // El servidor nos responderá con JSON
    const respuesta = await respuestaRaw.json();
    if (respuesta) {
      // Y si llegamos hasta aquí, todo ha ido bien
      Swal.fire({
        title: "Dirección",
        text: "Dirección registrada con éxito!",
        icon: "success",
      }).then(function () {
        location.reload();
      });
    } else {
      Swal.fire({
        icon: "error",
        text: "Error en el registro, intente nuevamente mas tarde",
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