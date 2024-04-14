var telefono = document.querySelector("#telefono");
var whatsapp = document.querySelector("#whatsapp");
var direccion = document.querySelector("#direccion");
var correo = document.querySelector("#correo");
var facebook = document.querySelector("#facebook");

const llenaCampos = async () => {
  const respuestaRaw = await fetch(`obtenerDatosEmpresa.php`);
  const datos = await respuestaRaw.json();

  for (const dato of datos) {
    telefono.value = dato.telefono;
    whatsapp.value = dato.whatsapp;
    direccion.value = dato.direccion;
    correo.value = dato.correo;
    facebook.value = dato.facebook;
    
  }

};

llenaCampos();
