<?php
require 'conexion.php';
$Vendedor = $_POST['vendedor'];
$NumeroSolicitud = $_POST['numerosolicitud'];
$Id = $_POST['iduser'];
$Birthdate = $_POST['birthdate'];
$Name = $_POST['name'];
$Document = $_POST['document'];
$Cuit = $_POST['cuitcliente'];
$NumberClient = $_POST['numberclient'];
$Empresa = $_POST['empresa'];
$Tipo = $_POST['tipo'];
$NumberAlter = $_POST['numberalter'];
$Verificacion = $_POST['verificacion'];
$Email = $_POST['email'];
if(isset($_POST['dateload'])){$LoadDate = $_POST['dateload'];}
$Product = $_POST['product'];
$Plans = $_POST['plans'];
$Status = $_POST['status'];
$Street = $_POST['street'];
$Number = $_POST['number'];
$Street2 = $_POST['street2'];
$State = $_POST['state'];
$Located = $_POST['located'];
$LatLong = $_POST['latlong'];
$linkgoogle = $_POST['linkgooglemaps'];
$linkgoogle = filter_var($linkgoogle,FILTER_SANITIZE_SPECIAL_CHARS);
$CreditCard = $_POST['creditcard'];
$Central = $_POST['central'];
$Registred = $_POST['registred'];
$Comments = $_POST['comments'];
$Score = $_POST['score'];
if(isset($_POST['fechaportacion'])){$FechaPortacion = $_POST['fechaportacion'];}
$EstadoSoli = $_POST['status'];
$Piso = $_POST['piso'];
$Depto = $_POST['depto'];
$CodigoPostal = $_POST['codigopostal'];
$archivos = $_FILES['archivos'];

if (!empty($_FILES['archivos']['name'])) {
    // Se está agregando una nueva imagen
    // Aquí deberías procesar la subida de la imagen y obtener su nombre
    $nombre_archivo = $_FILES['archivos']['name'];

    // Ejemplo de código para mover el archivo a una carpeta de destino
    $carpeta_destino = './archivos/';
    $ruta_destino = $carpeta_destino . $nombre_archivo;
    move_uploaded_file($_FILES['archivos']['tmp_name'], $ruta_destino);

    // Aquí ejecutas tu consulta SQL para insertar el nuevo nombre de archivo en la base de datos
    $Query = "INSERT INTO `ventas`(`id`, `vendedor`, `producto`, `linea`, `empresa`, `tipo`, `nombrecliente`, `fechanacimientocliente`, `documentocliente`, `cuitcliente`, `numeroalternativo`, `email`, `planes`, `score`, `verificacion`, `fechacarga`, `calle`, `numero`, `piso`, `dpto`, `entrecalles`, `provincia`, `localidad`, `codigopostal`, `coordenadas`, `linkgooglemaps`, `tarjetacredito`, `central`, `manzanaregistro`, `comentarios`, `estadoventa`, `archivo`, `fechaportacion`) VALUES ('DEFAULT','$Vendedor','$Product','$NumberClient','$Empresa','$Tipo','$Name','$Birthdate','$Document','$Cuit','$NumberAlter','$Email','$Plans','$Score','$Verificacion','$LoadDate','$Street','$Number','$Piso','$Depto','$Street2','$State','$Located','$CodigoPostal','$LatLong','$linkgoogle','$CreditCard','$Central','$Registred','$Comments','$EstadoSoli','$nombre_archivo','$FechaPortacion')";
    echo $Query; // Esto es opcional, solo para verificar que la consulta se genera correctamente
    unset($archivos);
} else {
    // No se está agregando una nueva imagen

    // Aquí ejecutas tu consulta SQL para actualizar otros campos en la base de datos
  $Query = "UPDATE `ventas` SET `numerosolicitud` = '$NumeroSolicitud', `producto`='$Product', `linea`='$NumberClient', `empresa`='$Empresa', `tipo`='$Tipo', `nombrecliente`='$Name', `fechanacimientocliente`='$Birthdate', `documentocliente`='$Document', `cuitcliente`='$Cuit', `numeroalternativo`='$NumberAlter', `email` = '$Email', `planes`='$Plans', `score`='$Score', `verificacion`='$Verificacion', `calle`='$Street', `numero`='$Number', `piso`='$Piso', `dpto`='$Depto', `entrecalles`='$Street2', `provincia`='$State', `localidad`='$Located', `codigopostal`='$CodigoPostal', `coordenadas`='$LatLong', `linkgooglemaps`='$linkgoogle',`tarjetacredito`='$CreditCard', `central`='$Central', `manzanaregistro`='$Registred', `comentarios`='$Comments', `estadoventa` = '$EstadoSoli' WHERE documentocliente = '$Document' AND linea = '$NumberClient'";
}

// Ejecutas tu consulta SQL después de la condición



$Result = mysqli_query($conexion,$Query);

if ($Result == true) {
    // Redirecciona a solicitudes.php con el parámetro de la pestaña activa
    header('Location:./solicitudes2.php');
} else {
    echo "<div class='alert alert-danger' role='alert'>
    Error al editar la venta
  </div>";
} 


?>
