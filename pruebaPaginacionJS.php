<html lang="es">
<head>
	<meta charset="UTF-8"/>
	<title>Paginador</title>
	
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body>
<h1>Paginador</h1>
<section>
	<!-- Lugar donde generaremos todos los articulos por página -->
	<div id="listado-articulos"></div>
	<!-- Controles del paginador -->
	<div>
	<!-- Botón para ir a la página anterior -->
	<button id="atras"><i class="bi bi-arrow-left-circle-fill"></i></button>
	<!-- Información de la página actual -->
	<span id="informacion-pagina"></span>
	<!-- Botón para ir a la página siguiente -->
	<button id="siguiente"><i class="bi bi-arrow-right-circle-fill"></i></button>
	</div>
</section>
<!-- Plantilla del artículo -->
<template id="plantilla-articulo">
	<article>
	<h2 id="titulo"></h2>
	<p id="cuerpo"></p>
	</article>
</template>
	
	<script>
	 // --
	 // Variables
	 // --
	 const listadoArticulosDOM = document.querySelector("#listado-articulos");
	 const botonAtrasDOM = document.querySelector("#atras");
	 const informacionPaginaDOM = document.querySelector("#informacion-pagina");
	 const botonSiguienteDOM = document.querySelector("#siguiente");
	 const plantillaArticulo = document.querySelector("#plantilla-articulo").content.firstElementChild;
	 const elementosPorPagina = 3;
	 let paginaActual = 1;
	 const baseDeDatos = [
	     {
		 "userId": 1,
		 "id": 1,
		 "title": "sunt aut facere repellat provident occaecati excepturi optio reprehenderit",
		 "body": "quia et suscipit\nsuscipit recusandae consequuntur expedita et cum\nreprehenderit molestiae ut ut quas totam\nnostrum rerum est autem sunt rem eveniet architecto"
	     },
	     {
		 "userId": 1,
		 "id": 2,
		 "title": "qui est esse",
		 "body": "est rerum tempore vitae\nsequi sint nihil reprehenderit dolor beatae ea dolores neque\nfugiat blanditiis voluptate porro vel nihil molestiae ut reiciendis\nqui aperiam non debitis possimus qui neque nisi nulla"
	     },
	     {
		 "userId": 1,
		 "id": 3,
		 "title": "ea molestias quasi exercitationem repellat qui ipsa sit aut",
		 "body": "et iusto sed quo iure\nvoluptatem occaecati omnis eligendi aut ad\nvoluptatem doloribus vel accusantium quis pariatur\nmolestiae porro eius odio et labore et velit aut"
	     },
	     {
		 "userId": 1,
		 "id": 4,
		 "title": "eum et est occaecati",
		 "body": "ullam et saepe reiciendis voluptatem adipisci\nsit amet autem assumenda provident rerum culpa\nquis hic commodi nesciunt rem tenetur doloremque ipsam iure\nquis sunt voluptatem rerum illo velit"
	     },
	     {
		 "userId": 1,
		 "id": 5,
		 "title": "nesciunt quas odio",
		 "body": "repudiandae veniam quaerat sunt sed\nalias aut fugiat sit autem sed est\nvoluptatem omnis possimus esse voluptatibus quis\nest aut tenetur dolor neque"
	     },
	     {
		 "userId": 1,
		 "id": 6,
		 "title": "dolorem eum magni eos aperiam quia",
		 "body": "ut aspernatur corporis harum nihil quis provident sequi\nmollitia nobis aliquid molestiae\nperspiciatis et ea nemo ab reprehenderit accusantium quas\nvoluptate dolores velit et doloremque molestiae"
	     },
	     {
		 "userId": 1,
		 "id": 7,
		 "title": "magnam facilis autem",
		 "body": "dolore placeat quibusdam ea quo vitae\nmagni quis enim qui quis quo nemo aut saepe\nquidem repellat excepturi ut quia\nsunt ut sequi eos ea sed quas"
	     },
	     {
		 "userId": 1,
		 "id": 8,
		 "title": "dolorem dolore est ipsam",
		 "body": "dignissimos aperiam dolorem qui eum\nfacilis quibusdam animi sint suscipit qui sint possimus cum\nquaerat magni maiores excepturi\nipsam ut commodi dolor voluptatum modi aut vitae"
	     },
	     {
		 "userId": 1,
		 "id": 9,
		 "title": "nesciunt iure omnis dolorem tempora et accusantium",
		 "body": "consectetur animi nesciunt iure dolore\nenim quia ad\nveniam autem ut quam aut nobis\net est aut quod aut provident voluptas autem voluptas"
	     },
	     {
		 "userId": 1,
		 "id": 10,
		 "title": "optio molestias id quia eum",
		 "body": "quo et expedita modi cum officia vel magni\ndoloribus qui repudiandae\nvero nisi sit\nquos veniam quod sed accusamus veritatis error"
	     }
	 ];

	 // --
	 // Funciones
	 // --

	 /**
	  * Función que pasa a la siguiente página
	  * @return void
	  */
	 function avanzarPagina() {
	     // Incrementar "paginaActual"
	     paginaActual = paginaActual + 1;
	     // Redibujar
	     renderizar();
	 }

	 /**
	  * Función que retrocedea la página anterior
	  * @return void
	  */
	 function retrocederPagina() {
	     // Disminuye "paginaActual"
	     paginaActual = paginaActual - 1;
	     // Redibujar
	     renderizar();
	 }

	 /**
	  * Función que devuelve los datos de la página deseada
	  * @param {Int) pagina - Número de página
	  * @return {Array<JSON>}
	  */
	 function obtenerRebanadaDeBaseDeDatos(pagina = 1) {
	     const corteDeInicio = (paginaActual - 1) * elementosPorPagina;
	     const corteDeFinal = corteDeInicio + elementosPorPagina;
	     return baseDeDatos.slice(corteDeInicio, corteDeFinal);
	 }

	 /**
	  * Función que devuelve el número total de páginas disponibles
	  * @return {Int}
	  */
	 function obtenerPaginasTotales() {
	     return Math.ceil(baseDeDatos.length / elementosPorPagina);
	 }

	 /**
	  * Función que gestiona los botones del paginador habilitando o
	  * desactivando dependiendo de si nos encontramos en la primera
	  * página o en la última.
	  * @return void
	  */
	 function gestionarBotones() {
	     // Comprobar que no se pueda retroceder
	     if (paginaActual === 1) {
		 botonAtrasDOM.setAttribute("disabled", true);
	     } else {
		 botonAtrasDOM.removeAttribute("disabled");
	     }
	     // Comprobar que no se pueda avanzar
	     if (paginaActual === obtenerPaginasTotales()) {
		 botonSiguienteDOM.setAttribute("disabled", true);
	     } else {
		 botonSiguienteDOM.removeAttribute("disabled");
	     }
	 }

	 /**
	  * Función que se encarga de dibujar el nuevo DOM a partir de las variables
	  * @return void
	  */
	 function renderizar() {
	     // Limpiamos los artículos anteriores del DOM
	     listadoArticulosDOM.innerHTML = "";
	     // Obtenemos los artículos paginados
	     const rebanadaDatos = obtenerRebanadaDeBaseDeDatos(paginaActual);
	     //// Dibujamos
	     // Deshabilitar botones pertinentes (retroceder o avanzar página)
	     gestionarBotones();
	     // Informar de página actual y páginas disponibles
	     informacionPaginaDOM.textContent = `${paginaActual}/${obtenerPaginasTotales()}`;
	     // Crear un artículo para cada elemento que se encuentre en la página actual
	     rebanadaDatos.forEach(function (datosArticulo) {
		   // Clonar la plantilla de artículos
		   const miArticulo = plantillaArticulo.cloneNode(true);
		   // Rellenamos los datos del nuevo artículo
		   const miTitulo = miArticulo.querySelector("#titulo");
		   miTitulo.textContent = datosArticulo.title;
		   const miCuerpo = miArticulo.querySelector("#cuerpo");
		   miCuerpo.textContent = datosArticulo.body;
		   // Lo insertamos dentro de "listadoArticulosDOM"
		   listadoArticulosDOM.appendChild(miArticulo);
	     });
	 }

	 // --
	 // Eventos
	 // --
	 botonAtrasDOM.addEventListener("click", retrocederPagina);
	 botonSiguienteDOM.addEventListener("click", avanzarPagina);

	 // --
	 // Inicio
	 // --
	 renderizar(); // Mostramos la primera página nada más que carge la página

	</script>