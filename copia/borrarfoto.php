<?php
require 'conexion.php';

$Foto = $_GET['foto'];

$Query = "UPDATE ventas SET archivo = NULL WHERE archivo = '$Foto';";

$Result = mysqli_query($conexion,$Query);

if($Result){
  header('Location:solicitudes.php');
}else{
    echo "Error al quitar la foto";
}
