<?php
require './conexion.php';
$Id = $_GET['id'];
$DocumentoCliente = $_GET['documentocliente'];
$Linea = $_GET['linea'];
$Query = "SELECT * FROM ventaseliminadas WHERE id = '$Id' AND documentocliente = '$DocumentoCliente' AND linea = $Linea";
$Result = mysqli_query($conexion,$Query);

while($row = mysqli_fetch_assoc($Result)){
    $vendedor = $row['vendedor'];
    $producto = $row['producto'];
    $lineas = $row['linea'];
    $empresa = $row['empresa'];
    $Tipo = $row['tipo'];
    $nombrecliente = $row['nombrecliente'];
    $fechanacimientocliente = $row['fechanacimientocliente'];
    $documentocliente = $row['documentocliente'];
    $cuitcliente = $row['cuitcliente'];
    $numeroalternativo = $row['numeroalternativo'];
    $email = $row['email'];
    $planes = $row['planes'];
    $score = $row['score'];
    $verificacion = $row['verificacion'];
    $fechacarga = $row['fechacarga'];
    $calle = $row['calle'];
    $numero = $row['numero'];
    $piso = $row['piso'];
    $dpto = $row['dpto'];
    $entrecalles = $row['entrecalles'];
    $provincia = $row['provincia'];
    $localidad = $row['localidad'];
    $codigopostal = $row['codigopostal'];
    $coordenadas = $row['coordenadas'];
    $linkgooglemaps = $row['linkgooglemaps'];
    $linkgooglemaps = $row['linkgooglemaps'];
    $comentarios = $row['comentarios'];
    $EstadoVenta = $row['estadoventa'];
    $archivos = $row['archivo'];
}

$Query = "INSERT INTO `ventas`(`id`, `vendedor`, `producto`, `linea`,`empresa`,`tipo`, `nombrecliente`, `fechanacimientocliente`, `documentocliente`,`cuitcliente`,`numeroalternativo`,`email`, `planes`, `score`,`verificacion`, `fechacarga`, `calle`, `numero`, `piso`, `dpto`, `entrecalles`, `provincia`, `localidad`, `codigopostal`, `coordenadas`, `linkgooglemaps`, `comentarios`, `estadoventa`,`archivo`) VALUES ('DEFAULT','$vendedor','$producto','$lineas','$empresa','$Tipo','$nombrecliente','$fechanacimientocliente','$documentocliente','$cuitcliente','$numeroalternativo','$email','$planes','$score','$verificacion','$fechacarga','$calle','$numero','$piso','$dpto','$entrecalles','$provincia','$localidad','$codigopostal','$coordenadas','$linkgooglemaps','$comentarios','$EstadoVenta','$archivos')";
$Result = mysqli_query($conexion,$Query);


if($Result){
   $Query = "DELETE FROM ventaseliminadas WHERE id = '$Id' AND documentocliente = '$DocumentoCliente' AND linea = '$Linea'";
   $Result = mysqli_query($conexion,$Query);
    if($Result){
      header('Location:solicitudeseliminadas.php');
    }

}
