function enviarForm() {
  // Con esto establecemos la acción por defecto de nuestro botón de enviar.
  // Campos de texto
  if ($("#nombre").val() == "") {
    alert("El campo Nombre no puede estar vacío.");
    $("#nombre").focus(); // Esta función coloca el foco de escritura del usuario en el campo Nombre directamente.
    return false;
  }
  if ($("#apellidoP").val() == "") {
    alert("El campo Apellido Paterno no puede estar vacío.");
    $("#apellidoP").focus();
    return false;
  }
  if ($("#apellidoM").val() == "") {
    alert("El campo Apellido Materno no puede estar vacío.");
    $("#apellidoM").focus();
    return false;
  }
  if ($("#telefono").val() == "") {
    alert("El campo Teléfono no puede estar vacío.");
    $("#telefono").focus();
    return false;
  } else {
    $.post(
      "updateDatosCliente.php",
      $("#formdata").serialize(),
      function (res) {
        if (res == 1) {
          $("#exito").delay(500).fadeIn("slow"); // Si hemos tenido éxito, hacemos aparecer el div "exito" con un efecto fadeIn lento tras un delay de 0,5 segundos.
        } else {
          $("#fracaso").delay(500).fadeIn("slow"); // Si no, lo mismo, pero haremos aparecer el div "fracaso"
        }
      }
    );
  }
}
