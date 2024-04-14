const email = document.querySelector("#email");
const ubicacion = document.querySelector("#ubicacion");

const obtenerInfo = async () => {
  const respuestaRaw = await fetch(`obtenerInfoEmpresa.php`);
  const simecsa = await respuestaRaw.json();

  var emailInfo = document.createElement("a");
  emailInfo.href = "mailto:"+simecsa.correo;
  emailInfo.title = "Envianos un correo";
  emailInfo.textContent = simecsa.correo;
  email.appendChild(emailInfo);

  ubicacion.textContent = simecsa.direccion
};
obtenerInfo();


