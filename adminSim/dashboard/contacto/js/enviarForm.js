function enviarForm() {
    // Con esto establecemos la acción por defecto de nuestro botón de enviar.
    // Campos de texto
    if ($("#telefono").val() == "") {
      Swal.fire({
        icon: "error",
        text: "El campo telefono no puede estar vacío.",
      });
      $("#telefono").focus(); // Esta función coloca el foco de escritura del usuario en el campo Nombre directamente.
      return false;
    }
    if ($("#whatsapp").val() == "") {
      Swal.fire({
        icon: "error",
        text: "El campo whatsapp no puede estar vacío.",
      });
      $("#whatsapp").focus();
      return false;
    }
    if ($("#direccion").val() == "") {
      Swal.fire({
        icon: "error",
        text: "El campo dirección no puede estar vacío.",
      });
      $("#direccion").focus();
      return false;
    } 
    if ($("#horario").val() == "") {
      Swal.fire({
        icon: "error",
        text: "El campo horario no puede estar vacío.",
      });
      $("#direccion").focus();
      return false;
    } else {
      $.post(
        "updateDatosAdmin.php",
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
  