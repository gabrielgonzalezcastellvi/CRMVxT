<?php 
require 'conexion.php';
$Id =  $_POST['id'];
$Nombre = $_POST['nombre'];
$Apellido = $_POST['apellido'];
$Dni = $_POST['dni'];
$Celular = $_POST['celular'];
$Correo = $_POST['correo'];
$Contraseña = $_POST['clave'];
$PasswordEncrypt = md5(sha1($Contraseña));
$Cumple = $_POST['cumple'];
$archivos = $_FILES['archivos'];

foreach ($archivos['tmp_name'] as $key => $tmp_name) {
    $nombre_archivo = $archivos['name'][$key];   //para subir a la base de datos
    $tipo_archivo = $archivos['type'][$key];
    $tamano_archivo = $archivos['size'][$key];
    $tmp_name = $archivos['tmp_name'][$key];

    // Mueve el archivo a la ubicación deseada
    move_uploaded_file($tmp_name, "./perfiles/" . $nombre_archivo);

    $Query = "UPDATE `usuarios` SET `nombre`='$Nombre',`apellido`='$Apellido',`foto`='$nombre_archivo',`cumple`='$Cumple',`dni`='$Dni',`celular`='$Celular',`correo`='$Correo',`contrasena`='$Contraseña',`passencrypt`='$PasswordEncrypt' WHERE id = $Id";

    $Result = mysqli_query($conexion,$Query);

}


if($Result == true){
header('Location:perfil2.php');
  }else{
      echo "<div class='alert alert-danger' role='alert'>
      Error al registrar los cambios
    </div>";
  }
  








?>