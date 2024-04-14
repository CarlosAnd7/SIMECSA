function login() {
    const correo = document.querySelector("#correo").value;
    const password = document.querySelector("#password").value;
  
    if (correo === "" || password === "") {
      showError("Datos de inicio de sesión incorrectos. Revise su correo o contraseña");
    } else {
      const data = new FormData();
      data.append("correo", correo);
      data.append("pass", password);
  
      fetch("./login.php", {
        method: "POST",
        body: data,
      })
        .then(response => {
          if (response.ok) {
            return response.text();
          } else {
            throw "Error en la llamada Ajax";
          }
        })
        .then(texto => {
          if (texto === "1") {
            window.location = "../index.php";
          } else {
            showError("Datos de inicio de sesión incorrectos. Revise su correo o contraseña");
          }
        })
        .catch(err => {
          console.log(err);
        });
    }
  }
  
  function showError(message) {
    Swal.fire({
      icon: "error",
      title: message,
      confirmButtonText: "Regresar",
    }).then(result => {
      if (result.isConfirmed) {
        window.location = "./login.html";
      }
    });
  }
  