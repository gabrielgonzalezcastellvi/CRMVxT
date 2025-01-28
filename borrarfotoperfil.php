<?php 
require 'conexion.php';

$Foto = $_GET['foto'];
$Query = "UPDATE `usuarios` SET foto = NULL WHERE foto LIKE '%$Foto%'";

$Result = mysqli_query($conexion,$Query);

if($Result){
   header('Location:./perfil.php');
}else{
    echo "Error al eliminar la foto de perfil";
}

$filePath = './perfiles/' . $Foto;
    if (file_exists($filePath)) {
        unlink($filePath);
    }

?>