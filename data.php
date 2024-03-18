<?php
session_start();
$correo = $_SESSION["correo"];
$DBhost = "localhost";
$DBuser = "root";
$DBpass = "";
$DBname = "simecsadb";
try{
 
 $DBcon = new PDO("mysql:host=$DBhost;dbname=$DBname",$DBuser,$DBpass);
 $DBcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
}catch(PDOException $ex){
 
 die($ex->getMessage());
}

// SQL para obtener los datos
$query = "SELECT * FROM venta WHERE Usuariocorreo = '$correo'";
// Ejeuctar el SQL
$stmt = $DBcon->prepare($query);
$stmt->execute();

$userData = array();

while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
 
 $userData[] = $row;
}

echo json_encode($userData);