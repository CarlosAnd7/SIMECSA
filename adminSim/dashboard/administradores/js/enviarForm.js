function enviarForm() {
  // Con esto establecemos la acción por defecto de nuestro botón de enviar.
  // Campos de texto
  if ($("#correo").val() == "") {
    Swal.fire({
      icon: "error",
      text: "El campo Correo no puede estar vacío.",
    });
    $("#nombre").focus(); // Esta función coloca el foco de escritura del usuario en el campo Nombre directamente.
    return false;
  }
  if ($("#nombre").val() == "") {
    Swal.fire({
      icon: "error",
      text: "El campo Nombre no puede estar vacío.",
    });
    $("#nombre").focus(); // Esta función coloca el foco de escritura del usuario en el campo Nombre directamente.
    return false;
  }
  if ($("#apellidoP").val() == "") {
    Swal.fire({
      icon: "error",
      text: "El campo Apellido Paterno no puede estar vacío.",
    });
    $("#apellidoP").focus();
    return false;
  }
  if ($("#apellidoM").val() == "") {
    Swal.fire({
      icon: "error",
      text: "El campo Apellido Materno no puede estar vacío.",
    });
    $("#apellidoM").focus();
    return false;
  }
  if ($("#pass").val() == "") {
    Swal.fire({
      icon: "error",
      text: "El campo Contraseña no puede estar vacío.",
    });
    $("#apellidoM").focus();
    return false;
  } else {
    $.post("./insertarAdmin.php", $("#formdata").serialize(), function (res) {
      
      if (res == 0) {
        // Y si llegamos hasta aquí, todo ha ido bien
        Swal.fire({
          title: "Listo",
          text: "Administrador creado con éxito!",
          icon: "success",
        }).then(function () {
          location.reload();
        });
      } else {
        Swal.fire({
          icon: "error",
          text: "Error en el servidor. Intente nuevamente mas tarde",
        });
      }
    });
  }
}
