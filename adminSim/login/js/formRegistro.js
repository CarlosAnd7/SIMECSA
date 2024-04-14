function alertaSeleccionado() {
  var espacio = document.getElementById("espacio");
  espacio.textContent = "";
  var radios = document.getElementsByName("radioTipoCuenta");
  var selected = Array.from(radios).find((radio) => radio.checked);

  if (selected.value == "Empresarial") {
    var nombreDiv = document.createElement("div");
    (nombreDiv.classList = "form-group"), "mb-3";

    var numeroUsuarioDiv = document.createElement("div");
    (numeroUsuarioDiv.classList = "form-group"), "mb-3";

    var nombreLabel = document.createElement("label");
    nombreLabel.classList = "label";
    nombreLabel.for = "nombre";
    nombreLabel.innerText = "Nombre de la Empresa";

    var numeroUsuarioLabel = document.createElement("label");
    numeroUsuarioLabel.classList = "label";
    numeroUsuarioLabel.for = "numeroUsuario";
    numeroUsuarioLabel.innerText = "Número de Usuario de la Empresa";

    var nombreInput = document.createElement("input");
    nombreInput.type = "text";
    nombreInput.classList = "form-control";
    nombreInput.id = "nombre";
    nombreInput.name = "nombre";
    nombreInput.required = true;
    nombreInput.setAttribute("pattern", "[A-Za-z]+" )

    var numeroUsuarioInput = document.createElement("input");
    numeroUsuarioInput.type = "text";
    numeroUsuarioInput.classList = "form-control";
    numeroUsuarioInput.id = "numeroUsuario";
    numeroUsuarioInput.name = "numeroUsuario";
    numeroUsuarioInput.required = true;

    nombreDiv.appendChild(nombreLabel);
    nombreDiv.appendChild(nombreInput);

    numeroUsuarioDiv.appendChild(numeroUsuarioLabel);
    numeroUsuarioDiv.appendChild(numeroUsuarioInput);

    espacio.appendChild(nombreDiv);
    espacio.appendChild(numeroUsuarioDiv);
  } else {
    var nombreDiv = document.createElement("div");
    var apellidoPDiv = document.createElement("div");
    var apellidoMDiv = document.createElement("div");

    (nombreDiv.classList = "form-group"), "mb-3";
    (apellidoPDiv.classList = "form-group"), "mb-3";
    (apellidoMDiv.classList = "form-group"), "mb-3";

    var nombreLabel = document.createElement("label");
    var apellidoPLabel = document.createElement("label");
    var apellidoMLabel = document.createElement("label");

    nombreLabel.classList = "label";
    nombreLabel.for = "nombre";
    apellidoPLabel.classList = "label";
    apellidoPLabel.for = "apellidoP";
    apellidoMLabel.classList = "label";
    apellidoMLabel.for = "apellidoM";

    nombreLabel.innerText = "Nombre";
    apellidoPLabel.innerText = "Apellido Paterno";
    apellidoMLabel.innerText = "Apellido Materno";

    var nombreInput = document.createElement("input");
    var apellidoPInput = document.createElement("input");
    var apellidoMInput = document.createElement("input");

    nombreInput.type = "text";
    nombreInput.classList = "form-control";
    nombreInput.id = "nombre";
    nombreInput.name = "nombre";
    nombreInput.required = true;
    nombreInput.setAttribute("pattern", "^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1 \s]+$")
    nombreInput.setAttribute("title", "No se permite el uso de números" )

    apellidoPInput.type = "text"
    apellidoPInput.classList = "form-control"
    apellidoPInput.id = "apellidoP"
    apellidoPInput.name = "apellidoP"
    apellidoPInput.required = true
    apellidoPInput.setAttribute("pattern", "^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$")
    apellidoPInput.setAttribute("title", "No se permite el uso de números" )

    apellidoMInput.type = "text";
    apellidoMInput.classList = "form-control";
    apellidoMInput.id = "apellidoM";
    apellidoMInput.name = "apellidoM";
    apellidoMInput.required = true;
    apellidoMInput.setAttribute("pattern", "^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$")
    apellidoMInput.setAttribute("title", "No se permite el uso de números" )

    nombreDiv.appendChild(nombreLabel);
    nombreDiv.appendChild(nombreInput);

    apellidoPDiv.appendChild(apellidoPLabel);
    apellidoPDiv.appendChild(apellidoPInput);

    apellidoMDiv.appendChild(apellidoMLabel);
    apellidoMDiv.appendChild(apellidoMInput);

    espacio.appendChild(nombreDiv);
    espacio.appendChild(apellidoPDiv);
    espacio.appendChild(apellidoMDiv);
  }
}

function validarPass() {
  var pass = document.getElementById("pass");
  var passC = document.getElementById("pass_confirmar");
  var submit = document.getElementById("submitButton");

  pass.oninvalid = function (event) {
    event.target.setCustomValidity(
      "La contraseña debe tener al menos 8 caracteres que incluyan una mayúscula, una minúscula y un número"
    );
  };

  if (pass.value == passC.value && passC.lenght != 0) {
    submit.disabled = false;
  } else if (pass.value != passC.value) {
    submit.disabled = true;
  }
}

function cargaLimpia() {
  var radios = document.getElementsByName("radioTipoCuenta");
  var submit = document.getElementById("submitButton");
  radios.textContent = "";
  submit.disabled = true;
}
