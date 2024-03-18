<?php
session_start();
include_once "funciones.php";
if (!isset($_GET["id"])) {
    exit("No hay idProducto");
}
quitarProductoDelCarrito($_GET["id"]);
# Saber si redireccionamos a tienda o al carrito, esto es porque
# llamamos a este archivo desde la tienda y desde el carrito
if (isset($_GET["redireccionar_carrito"])) {
    header("Location: ./verCarrito.php");
} 
elseif(!isset($_GET["pagina"])){
    header("Location: ./verProducto.php?id=".$_GET["id"]);
}
else {
    if(!isset($_GET["busqueda"])){
        header("Location: ./index.php?pagina=".$_GET["pagina"]."&categoria=".$_GET["categoria"]);
    }
    else{
        header("Location: ./paginaBusqueda.php?pagina=".$_GET["pagina"]."&busqueda=".$_GET["busqueda"]);
    }
}
