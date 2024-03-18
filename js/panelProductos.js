const contenidoProductos = document.querySelector("#contenidoProductos")
var limit = parseInt(document.querySelector("#limit").textContent)
var offset = parseInt(document.querySelector("#offset").textContent)
console.log(limit)
console.log(offset)

const obtenerProductos = async () => {
    const respuestaRaw = await fetch(`obtenerProductos.php?limit=${limit}&offset=${offset}`)
    const productos = await respuestaRaw.json()
    contenidoProductos.innerHTML= ""
    for (const producto of productos) {

        const columnaItem = document.createElement("div")
        columnaItem.classList.add("col")

        const cardItem = document.createElement("div")
        cardItem.classList.add("card","h-100","shadow-sm")

        const imgItem = document.createElement("img")
        imgItem.classList.add("card-img-top")
        imgItem.src = producto.imagen 

        const cardBody = document.createElement("div")
        cardBody.classList.add("card-body")

        const tags = document.createElement("div")
        tags.classList.add("clearfix","mb-3")

        const brandPill = document.createElement("span")
        brandPill.classList.add("float-start", "badge", "rounded-pill", "text-bg-dark")
        brandPill.innerHTML = "$"+producto.precio + " mxn"
        
        const button = document.createElement("div")
        button.classList.add("text-center", "my-2")

        const button2 = document.createElement("div")
        button2.classList.add("text-center", "my-2")
        
        const idProducto = producto.idProducto;
        const verMas = document.createElement("a")
        verMas.href = "./verProducto.php?id="+idProducto
        verMas.classList.add("btn", "btn-warning", "btn-sm")
        verMas.innerText="Ver Más"

        const agregar = document.createElement("a")
        agregar.href = "./agregarCarrito.php?id="+idProducto
        agregar.classList.add("btn", "btn-success")
        agregar.innerText="Agregar al carrito"

        const i = document.createElement("i")
        i.classList.add("fa", "fa-cart-plus")

        agregar.appendChild(i)

        const headerNombre = document.createElement("h5")
        headerNombre.innerText = producto.nombre
        headerNombre.classList.add("card-title")

        
        cardItem.appendChild(imgItem)
        cardItem.appendChild(cardBody)
        
        
        tags.appendChild(brandPill)
        cardBody.appendChild(tags)
        cardBody.appendChild(headerNombre)
        cardBody.appendChild(button2)
        cardBody.appendChild(button)
        
        button2.appendChild(verMas)
        button.appendChild(agregar)        
        columnaItem.appendChild(cardItem)

        contenidoProductos.appendChild(columnaItem)
    }
}



// Y cuando se incluya este script, invocamos a la función
obtenerProductos()