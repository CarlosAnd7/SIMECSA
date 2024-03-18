<?php
session_start();
if(empty($_SESSION["correo"])){
    echo json_encode(false);
}
else{
    echo json_encode(true);
}

