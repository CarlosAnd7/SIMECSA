function muestraImg() {
    var imagen = document.getElementById("imagen");
    var img = document.getElementById("vistaPrevia");
  
    console.log(imagen.value);
    img.src = imagen.value;
  }

const $idProducto = document.querySelector("#idProducto"),
  $nombre = document.querySelector("#nombre"),
  $descripcion = document.querySelector("#descripcion"),
  $cantidad = document.querySelector("#cantidad"),
  $precio = document.querySelector("#precio"),
  $coste = document.querySelector("#coste"),
  $categoria = document.querySelector("#categoria"),
  $imagen = document.querySelector("#imagen"),
  $btnActualizar = document.querySelector("#btnActualizar");
$btnActualizar.onclick = async () => {
  var idProducto = $idProducto.value,
    nombre = $nombre.value,
    descripcion = $descripcion.value,
    cantidad = $cantidad.value,
    precio = parseFloat($precio.value),
    coste = parseFloat($coste.value),
    categoria = $categoria.value,
    imagen = $imagen.value;
  // Pequeña validación, aunque debería hacerse del lado del servidor igualmente, aquí es pura estética
  if (!idProducto) {
    return Swal.fire({
      icon: "error",
      text: "Escribe un ID",
      timer: 2700, // <- Ocultar dentro de 0.7 segundos
    });
  }
  if (!nombre) {
    return Swal.fire({
      icon: "error",
      text: "Escribe el nombre",
      timer: 2700, // <- Ocultar dentro de 0.7 segundos
    });
  }
  if (!descripcion) {
    return Swal.fire({
      icon: "error",
      text: "Escribe la descripción",
      timer: 2700, // <- Ocultar dentro de 0.7 segundos
    });
  }
  if (!cantidad) {
    return Swal.fire({
      icon: "error",
      text: "Escribe la cantidad",
      timer: 2700, // <- Ocultar dentro de 0.7 segundos
    });
  }
  if (!precio) {
    return Swal.fire({
      icon: "error",
      text: "Escribe el precio",
      timer: 2700, // <- Ocultar dentro de 0.7 segundos
    });
  }
  if (!coste) {
    return Swal.fire({
      icon: "error",
      text: "Escribe el coste",
      timer: 2700, // <- Ocultar dentro de 0.7 segundos
    });
  }
  if (!categoria) {
    return Swal.fire({
      icon: "error",
      text: "Elige una categoria",
      timer: 2700, // <- Ocultar dentro de 0.7 segundos
    });
  }
  if (!imagen) {
    return Swal.fire({
      icon: "error",
      text: "Coloca un link para la imagen",
      timer: 2700, // <- Ocultar dentro de 0.7 segundos
    });
  }
  // Lo que vamos a enviar a PHP
  const cargaUtil = {
    idProducto: idProducto,
    nombre: nombre,
    descripcion: descripcion,
    cantidad: cantidad,
    precio: precio,
    coste: coste,
    categoria: categoria,
    imagen: imagen,
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
        text: "Producto actualizado",
        timer: 2700, // <- Ocultar dentro de 0.7 segundos
      }).then(() => {
        // Redirigir a la dirección deseada después de que el usuario haya cerrado el mensaje
        window.location.href = "./mainProducts.php?categoria="+$categoria.value;
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