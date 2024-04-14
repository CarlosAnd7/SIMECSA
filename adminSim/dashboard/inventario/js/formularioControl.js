const $idProducto = document.querySelector("#idProducto"),
      $stock = document.querySelector("#stock"),
      $cantidad = document.querySelector("#cantidad"),
      $btnGuardar = document.querySelector("#btnGuardar");
var aux = document.querySelector("#aux");
$btnGuardar.onclick = async () => {
  var idProducto = $idProducto.value,
    cantidad = parseInt($cantidad.value) + parseInt($stock.value);
  // Pequeña validación, aunque debería hacerse del lado del servidor igualmente, aquí es pura estética
  if (!idProducto) {
    return Swal.fire({
      icon: "error",
      text: "No hay un ID correcto",
      timer: 2700, // <- Ocultar dentro de 0.7 segundos
    });
  }
  if (!cantidad || cantidad <= 0) {
    return Swal.fire({
      icon: "error",
      text: "Escribe la cantidad para hacer restock",
      timer: 2700, // <- Ocultar dentro de 0.7 segundos
    });
  }
  // Lo que vamos a enviar a PHP
  const cargaUtil = {
    idProducto: idProducto,
    cantidad: cantidad,
  };
  // Codificamos...
  const cargaUtilCodificada = JSON.stringify(cargaUtil);
  // Enviamos
  try {
    const respuestaRaw = await fetch("./updateBD.php", {
      method: "POST",
      body: cargaUtilCodificada,
    });
    // El servidor nos responderá con JSON
    const respuesta = await respuestaRaw.json();
    if (respuesta) {
      // Y si llegamos hasta aquí, todo ha ido bien
      Swal.fire({
        icon: "success",
        text: "Restock exitoso",
        timer: 2700, // <- Ocultar dentro de 0.7 segundos
        location: location.reload
      });
        $cantidad.value =
          "";
    } else {
      Swal.fire({
        icon: "error",
        text: "Error en el servidor. Intenta mas tarde",
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
