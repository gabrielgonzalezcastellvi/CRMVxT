<?php 
session_start();
#require 'conexion.php';
#$Nombre = $_SESSION['Nombre'];
#$queryregistro = "INSERT INTO `historialegresos`(`id`, `cliente`, `fecha`,`estado`) VALUES ('DEFAULT','$Nombre',NOW(),'EGRESO')";
#$result2 = mysqli_query($conexion,$queryregistro);
session_destroy();
Header('Location:./login');
?>