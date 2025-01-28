<?php
session_start();
require 'conexion.php';
$Usuario = $_POST['vendedor'];
$Dni = $_POST['dni'];
$Correo = $_POST['correo'];
$Nivel = $_POST['nivel'];
$Equipo = $_POST['equipo'];
$Contrasena = $_POST['contrasena'];
$PassEncrypt = md5(sha1($Contrasena));
$Query = "INSERT INTO `usuarios`(`id`, `nombre`,`dni`,`correo`,`equipo`, `level`, `contrasena`, `passencrypt`) VALUES ('DEFAULT','$Usuario','$Dni','$Correo','$Equipo','$Nivel','$Contrasena','$PassEncrypt')";


$Result = mysqli_query($conexion,$Query);

if($Result == true){
    echo "<div class='alert alert-success' role='alert'>
    ¡Usuario creado con éxito!
  </div>";
}else{
    echo "<div class='alert alert-danger' role='alert'>
    Error al crear el usuario
  </div>";
}


?>