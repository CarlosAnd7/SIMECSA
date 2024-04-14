btnGuardarPass.onclick = async () => {
    const passActual = document.querySelector("#passActual").value,
    passNueva = document.querySelector("#passNueva").value;
    passNuevaRep = document.querySelector("#passNuevaRep").value;
  
    if (!passActual) {
      return Swal.fire({
        icon: "error",
        text: "Escribe la contraseña que tienes actualmente",
        timer: 2700, // <- Ocultar dentro de 0.7 segundos
      });
    }
    if (!passNueva) {
      return Swal.fire({
        icon: "error",
        text: "Escribe tu nueva contraseña",
        timer: 2700, // <- Ocultar dentro de 0.7 segundos
      });
    }
    if (!passNuevaRep) {
      return Swal.fire({
        icon: "error",
        text: "Repite tu nueva contraseña",
        timer: 2700, // <- Ocultar dentro de 0.7 segundos
      });
    }
    if (passNuevaRep != passNueva) {
      return Swal.fire({
        icon: "error",
        text: "Las nuevas contraseñas no coinciden",
        timer: 2700, // <- Ocultar dentro de 0.7 segundos
      });
    }
  
    if (passActual == passNueva) {
      return Swal.fire({
        icon: "error",
        text: "La contraseña actual y la nueva no deben coincidir",
        timer: 2700, // <- Ocultar dentro de 0.7 segundos
      });
    }
    // Lo que vamos a enviar a PHP
    const cargaUtil = {
      passActual: passActual,
      passNueva: passNueva,
      passNuevaRep: passNuevaRep,
    };
    // Codificamos...
    const cargaUtilCodificada = JSON.stringify(cargaUtil);
    // Enviamos
    try {
      const respuestaRaw = await fetch("./updatePass.php", {
        method: "POST",
        body: cargaUtilCodificada,
      });
      // El servidor nos responderá con JSON
      const respuesta = await respuestaRaw.json();
      if (respuesta) {
        // Y si llegamos hasta aquí, todo ha ido bien
        Swal.fire({
          title: "Contraseña",
          text: "Contraseña actualizada con éxito!",
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
  