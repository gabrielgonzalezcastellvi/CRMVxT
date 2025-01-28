<?php
// Procesar la venta y guardarla en la base de datos
// Ejemplo:
session_start(); 
date_default_timezone_set('America/Argentina/Mendoza');
require './conexion.php';
$producto = $_POST['producto'];

if($producto == 'PORTA'){

  $producto;
  $vendedor = $_POST['vendedor'];
  $lineas = $_POST['lineas'];
  $empresa = $_POST['empresa'];
  $Tipo = $_POST['tipo'];
  $nombrecliente = $_POST['nombrecliente'];
  $fechanacimientocliente = $_POST['fechanacimientocliente'];
  $documentocliente = $_POST['documentocliente'];
  $cuitcliente = $_POST['cuitcliente'];
  $numeroalternativo = $_POST['numeroalternativo'];
  $email = $_POST['email'];
  $productos = $_POST['productos'];
  $score = $_POST['score'];
  $verificacion = $_POST['verificacion'];
  $fechacarga = date('Y-m-d');
  $calle = $_POST['calle'];
  $numero = $_POST['numero'];
  $piso = $_POST['piso'];
  $dpto = $_POST['dpto'];
  $entrecalles = $_POST['entrecalles'];
  $provincia = $_POST['provincia'];
  $localidad = $_POST['localidad'];
  $codigopostal = $_POST['codigopostal'];
  if(isset($_POST['coordenadas'])) {
    $coordenadas = $_POST['coordenadas'];
  $coordenadas = filter_var($coordenadas, FILTER_SANITIZE_STRING);
}
  if(isset($_POST['maps'])) {
    $linkgooglemaps = $_POST['maps'];
    $linkgooglemaps = filter_var($linkgooglemaps, FILTER_SANITIZE_STRING);
    // Proceed with further processing
}
  $comentarios = $_POST['comentarios'];
  $EstadoVenta = 'POST VENTA';
  $archivos = $_FILES['archivos'];
  }

  if(empty($archivos)){
    $Query = "INSERT INTO `ventas`(`vendedor`, `producto`, `linea`,`empresa`,`tipo`, `nombrecliente`, `fechanacimientocliente`, `documentocliente`,`cuitcliente`,`numeroalternativo`,`email`, `planes`, `score`,`verificacion`, `fechacarga`, `calle`, `numero`, `piso`, `dpto`, `entrecalles`, `provincia`, `localidad`, `codigopostal`, `coordenadas`, `linkgooglemaps`, `comentarios`, `estadoventa`) VALUES ('$vendedor','$producto','$lineas','$empresa','$Tipo','$nombrecliente','$fechanacimientocliente','$documentocliente','$cuitcliente','$numeroalternativo','$email','$productos','$score','$verificacion','$fechacarga','$calle','$numero','$piso','$dpto','$entrecalles','$provincia','$localidad','$codigopostal','$coordenadas','$linkgooglemaps','$comentarios','$EstadoVenta')";
      
    $Result = mysqli_query($conexion, $Query);
    
    if($Result){
        $venta_id = mysqli_insert_id($conexion);
    } else {
        die("Error al insertar la venta: " . mysqli_error($conexion));
    }

} else {
    $Query = "INSERT INTO `ventas`(`vendedor`, `producto`, `linea`,`empresa`,`tipo`, `nombrecliente`, `fechanacimientocliente`, `documentocliente`,`cuitcliente`,`numeroalternativo`,`email`, `planes`, `score`,`verificacion`, `fechacarga`, `calle`, `numero`, `piso`, `dpto`, `entrecalles`, `provincia`, `localidad`, `codigopostal`, `coordenadas`, `linkgooglemaps`, `comentarios`, `estadoventa`) VALUES ('$vendedor','$producto','$lineas','$empresa','$Tipo','$nombrecliente','$fechanacimientocliente','$documentocliente','$cuitcliente','$numeroalternativo','$email','$productos','$score','$verificacion','$fechacarga','$calle','$numero','$piso','$dpto','$entrecalles','$provincia','$localidad','$codigopostal','$coordenadas','$linkgooglemaps','$comentarios','$EstadoVenta')";
    
    $Result = mysqli_query($conexion, $Query);
    
    if($Result){
        $venta_id = mysqli_insert_id($conexion);
    } else {
        die("Error al insertar la venta: " . mysqli_error($conexion));
    }

    foreach ($archivos['tmp_name'] as $key => $tmp_name) {
        $nombre_archivo = $archivos['name'][$key];
        $tipo_archivo = $archivos['type'][$key];
        $tamano_archivo = $archivos['size'][$key];
        $tmp_name = $archivos['tmp_name'][$key];

        // Mueve el archivo a la ubicación deseada
        move_uploaded_file($tmp_name, "./archivos/" . $nombre_archivo);

        $Query = "INSERT INTO `archivos`(`venta_id`, `nombre_archivo`, `tipo_archivo`, `tamano_archivo`) VALUES ('$venta_id','$nombre_archivo','$tipo_archivo','$tamano_archivo')";
        
        $Result = mysqli_query($conexion, $Query);
        
        if(!$Result){
            die("Error al insertar el archivo: " . mysqli_error($conexion));
        }
    }
}

  
  
      

     
  
  
  if($Result == true){
    echo "<div class='alert alert-success' role='alert'>
    ¡Venta registrada con éxito!
  </div>";
  }else{
      echo "<div class='alert alert-danger' role='alert'>
      Error al cargar la venta
    </div>";
  }
  

/*  <div class='alert alert-success' role='alert'>
      ¡Venta registrada con éxito!
    </div> 
    
    <div class='alert alert-danger' role='alert'>
      Error al cargar la venta
    </div>
    */

?>
