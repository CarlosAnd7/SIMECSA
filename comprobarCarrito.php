<?php
session_start();
include_once "funciones.php";
if (!isset($_GET["id"])) {
    exit("No hay idProducto");
}
