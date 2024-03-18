<?php
session_start();
include_once "funciones.php";
if (!isset($_GET["id"])) {
    exit("No hay idProducto");
}
agregarProductoAlCarrito($_GET["id"]);

if(!isset($_GET["busqueda"])&&isset($_GET["pagina"])){
    header("Location: ./index.php?pagina=".$_GET["pagina"]."&categoria=".$_GET["categoria"]);
}
elseif(!isset($_GET["pagina"])){
    header("Location: ./verProducto.php?id=".$_GET["id"]);
}
else{
    header("Location: ./paginaBusqueda.php?pagina=".$_GET["pagina"]."&busqueda=".$_GET["busqueda"]);
}

