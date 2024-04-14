var contenidoDirecciones = document.querySelector("#contenidoDirecciones");
i = 0;

const llenaCampos = async () => {
  const respuestaRaw2 = await fetch(`obtenerDirecciones.php`);
  const direcciones = await respuestaRaw2.json();
  for (const direccion of direcciones) {
    i++;
    var cardComponent = document.createElement("div");
    cardComponent.classList.add("card");
    cardComponent.id = "Dir" + (i+1)
    cardComponent.value = direccion.numeroExt + "/" + direccion.numeroInt + "/" + direccion.cp;
    var cardBody = document.createElement("div");
    cardBody.classList.add("card-body");

    var cardTitle = document.createElement("h5");
    cardTitle.classList.add("card-title");
    cardTitle.innerText = "Entregar en Dirección " + i;
    var cardText = document.createElement("p");
    cardText.classList.add("card-text");
    if (direccion.numeroInt == null) {
      cardText.innerText =
        "Numero Exterior: " +
        direccion.numeroExt +
        "\n" +
        "Codigo Postal: " +
        direccion.cp +
        "\n" +
        "Calle: " +
        direccion.calle +
        "\n" +
        "Colonia: " +
        direccion.colonia +
        "\n" +
        "Ciudad: " +
        direccion.ciudad +
        "\n";
    } else {
      cardText.innerText =
        "Numero Interior: " +
        direccion.numeroInt +
        "\n" +
        "Numero Exterior: " +
        direccion.numeroExt +
        "\n" +
        "Codigo Postal: " +
        direccion.cp +
        "\n" +
        "Calle: " +
        direccion.calle +
        "\n" +
        "Colonia: " +
        direccion.colonia +
        "\n" +
        "Ciudad: " +
        direccion.ciudad +
        "\n";
    }

    cardBody.appendChild(cardTitle);
    cardBody.appendChild(cardText);
    cardComponent.appendChild(cardBody);
    cardComponent.setAttribute(
      "onClick",
      "setDireccion('" + cardComponent.id + "')"
    );
    contenidoDirecciones.appendChild(cardComponent);
  }
};

llenaCampos();

function setDireccion(id) {
  if(id != "sucursal"){
    setMetodoPago("transferencia")
  }
  const direccion = document.querySelector("#direccion");
  var cards = document.querySelectorAll("div.card.border-primary");
  cards.forEach((card) => {
    card.classList = "";
    card.classList.add("card");
  });
  
  var cardSelected = document.querySelector("#" + id);
  cardSelected.classList = "";
  cardSelected.classList.add("card", "border-primary", "mb-3");
  direccion.value = cardSelected.value;
  checkFields()
}

function setMetodoPago(id) {
  if(document.querySelector("#direccion").value != "undefined"){
    id = "transferencia"
  }
  var pago = document.querySelector("#pago");
  var cards = document.querySelectorAll("div.card.border-success");
  cards.forEach((card) => {
    card.classList = "";
    card.classList.add("card");
  });
  pago.value = id;
  var cardSelected = document.querySelector("#" + id);
  cardSelected.classList = "";
  cardSelected.classList.add("card", "border-success", "mb-3");
  checkFields()
}

function checkFields() {
  if (
    document.querySelector("#pago").value != "" &&
    document.querySelector("#direccion").value != ""
  ) {
    document.querySelector("#btnSubmit").disabled = false;
  } else {
    document.querySelector("#btnSubmit").disabled = true;
  }
}
