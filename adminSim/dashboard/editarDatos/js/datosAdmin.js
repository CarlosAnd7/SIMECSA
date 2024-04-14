var nombre = document.querySelector("#nombre");
var apellidoP = document.querySelector("#apellidoP");
var apellidoM = document.querySelector("#apellidoM");
var telefono = document.querySelector("#telefono");
var contenidoDirecciones = document.querySelector("#contenidoDirecciones");

const llenaCampos = async () => {
  const respuestaRaw = await fetch(`obtenerDatosAdmin.php`);
  const admins = await respuestaRaw.json();

  for (const admin of admins) {
    nombre.value = admin.nombre;
    apellidoP.value = admin.apellidoP;
    apellidoM.value = admin.apellidoM;
  }

};

llenaCampos();
