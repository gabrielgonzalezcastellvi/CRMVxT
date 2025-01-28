<?php
session_start();
require 'conexion.php';
$Equipo = $_POST['equipo'];

$Query = "INSERT INTO `usuarios`(`equipo`) VALUES ('$Equipo')";

$Result = mysqli_query($conexion,$Query);

if($Result == true){
    echo "<div class='alert alert-success' role='alert'>
    ¡Equipo creado con éxito!
  </div>";
}else{
    echo "<div class='alert alert-danger' role='alert'>
    Error al crear el equipo!
  </div>";
}

?>