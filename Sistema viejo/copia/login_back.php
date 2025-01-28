<?php

session_start();

require 'conexion.php';

date_default_timezone_set('America/Argentina/Mendoza');

$Nombre = $_POST['usuario'];

$Password = $_POST['pass'];

$PasswordEncript = md5(sha1($Password)); //Se encripta con 2 algoritmos md5 y sha1 es mas seguro que md5 solo


$query = "SELECT * FROM usuarios WHERE `nombre` = '$Nombre' OR `correo` = '$Nombre' AND  `passencrypt` = '$PasswordEncript'";

$result = mysqli_query($conexion,$query);

if(!$result){
echo "Ocurrio un error en la autenticacion.";

}else{
    $queryregistro = "INSERT INTO `historialingresos`(`id`, `cliente`, `fecha`,`estado`) VALUES ('DEFAULT','$Nombre',NOW(),'INGRESO')";
    $result2 = mysqli_query($conexion,$queryregistro);
}

$rows = mysqli_num_rows($result);

while($rows2 = $result -> fetch_assoc()){

    $ID = $rows2['id'];
    $Nombre = $rows2['nombre'];
    $Level = $rows2['level'];

}



$_SESSION['ID'] = $ID;
$_SESSION['Nombre'] = $Nombre;
$_SESSION['Level'] = $Level;



if($rows > 0){

    $Query3 = "SELECT level FROM usuarios WHERE nombre = '$Nombre'";
    $Result3 = mysqli_query($conexion,$Query3);

    while($rows3 = $Result3 -> fetch_assoc()){
         $Level = $rows3['level'];
    }
    

    if($Level == 1){
        Header('Location:./index.php');
    }else{
        Header('Location:./index2.php');
    }


}else{

   unset($_POST['usuario']);
   unset($_POST['pass']);
   echo"<script type='text/javascript'> alert('Datos incorrectos, intente de nuevo'); window.location.href='login.php';</script>";

}


?>