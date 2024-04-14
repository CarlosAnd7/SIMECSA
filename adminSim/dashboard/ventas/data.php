<?php
$DBhost = "localhost";
$DBuser = "u837024564_simecsadb";
$DBpass = "ferreteriasSimecsa0611";
$DBname = "u837024564_simecsadb";
$estado = $_GET["estado"];
try{
 
 $DBcon = new PDO("mysql:host=$DBhost;dbname=$DBname",$DBuser,$DBpass);
 $DBcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
}catch(PDOException $ex){
 
 die($ex->getMessage());
}

// SQL para obtener los datos
$query = "SELECT * FROM venta INNER JOIN usuario ON venta.Usuariocorreo = usuario.correo WHERE estado = '$estado'";
// Ejeuctar el SQL
$stmt = $DBcon->prepare($query);
$stmt->execute();

$userData = array();

while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
 
 $userData[] = $row;
}

echo json_encode($userData);
