<?php
require 'conexion.php';

$id = $_GET['id'];

$Query = "SELECT * FROM usuarioseliminados WHERE id = '$id' AND nombre <> ''";
$Result = mysqli_query($conexion,$Query);

while($row = $Result -> fetch_assoc()){
     $id = $row['id'];
     $nombre = $row['nombre'];
     $dni = $row['dni'];
     $correo = $row['correo'];
     $equipo = $row['equipo'];
     $level = $row['level'];
     $contrasena = $row['contrasena'];
     $passencrypt = $row['passencrypt'];
}

$QueryInsert = "INSERT INTO `usuarios`(`id`, `nombre`,`dni`,`correo`, `equipo`, `level`, `contrasena`, `passencrypt`) VALUES ('$id','$nombre','$dni','$correo','$equipo','$level','$contrasena','$passencrypt')";

$ResultInsert = mysqli_query($conexion,$QueryInsert);

if($ResultInsert){

$QueryEliminar = "DELETE FROM `usuarioseliminados` WHERE id = '$id'";

$ResultEliminar = mysqli_query($conexion,$QueryEliminar);

if($QueryEliminar){
  session_start();

if ($ResultEliminar) {
    $_SESSION['mensaje'] = "<div class='alert alert-success' role='alert'>
    ¡Usuario restablecido con éxito!
  </div>";
} else {
    $_SESSION['mensaje'] = "<div class='alert alert-danger' role='alert'>
    Error al restablecer el usuario
  </div>";
}
}

header("Location:usuarioseliminidados.php");
exit();
}