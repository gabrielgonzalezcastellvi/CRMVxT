<?php
session_start();

require 'conexion.php';
$id = $_POST['id'];
$Nombre = $_POST['nombre'];
$Dni = $_POST['dni'];
$Correo = $_POST['correo'];
$Nivel = $_POST['nivel'];
$Equipo = $_POST['equipo'];
$Contrasena = $_POST['contrasena'];
$PassEncrypt = md5(sha1($Contrasena));
$Query = "UPDATE `usuarios` SET `nombre`='$Nombre',`dni`='$Dni',`correo`='$Correo',`equipo`='$Equipo',`level`='$Nivel',`contrasena`='$Contrasena',`passencrypt`='$PassEncrypt' WHERE id = '$id'";


$Result = mysqli_query($conexion,$Query);

if($Result == true){
    echo "<div class='alert alert-success' role='alert'>
    ¡Usuario editado con éxito!
  </div>";
}else{
    echo "<div class='alert alert-danger' role='alert'>
    Error al editar el usuario
  </div>";
}

?>