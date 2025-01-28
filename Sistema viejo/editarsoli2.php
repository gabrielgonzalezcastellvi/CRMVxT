<?php
require 'conexion.php';

// Sanitización de variables
$Vendedor = filter_var($_POST['vendedor'], FILTER_SANITIZE_SPECIAL_CHARS);
$NumeroSolicitud = filter_var($_POST['numerosolicitud'], FILTER_SANITIZE_SPECIAL_CHARS);
$Id = filter_var($_POST['iduser'], FILTER_SANITIZE_SPECIAL_CHARS);
$Birthdate = filter_var($_POST['birthdate'], FILTER_SANITIZE_SPECIAL_CHARS);
$Name = filter_var($_POST['name'], FILTER_SANITIZE_SPECIAL_CHARS);
$Document = filter_var($_POST['document'], FILTER_SANITIZE_SPECIAL_CHARS);
$Cuit = filter_var($_POST['cuitcliente'], FILTER_SANITIZE_SPECIAL_CHARS);
$NumberClient = filter_var($_POST['numberclient'], FILTER_SANITIZE_SPECIAL_CHARS);
$Empresa = filter_var($_POST['empresa'], FILTER_SANITIZE_SPECIAL_CHARS);
$Tipo = filter_var($_POST['tipo'], FILTER_SANITIZE_SPECIAL_CHARS);
$NumberAlter = filter_var($_POST['numberalter'], FILTER_SANITIZE_SPECIAL_CHARS);
$Verificacion = filter_var($_POST['verificacion'], FILTER_SANITIZE_SPECIAL_CHARS);
$Email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$Product = filter_var($_POST['product'], FILTER_SANITIZE_SPECIAL_CHARS);
$Plans = filter_var($_POST['plans'], FILTER_SANITIZE_SPECIAL_CHARS);
$Status = filter_var($_POST['status'], FILTER_SANITIZE_SPECIAL_CHARS);
$Street = filter_var($_POST['street'], FILTER_SANITIZE_SPECIAL_CHARS);
$Number = filter_var($_POST['number'], FILTER_SANITIZE_SPECIAL_CHARS);
$Street2 = filter_var($_POST['street2'], FILTER_SANITIZE_SPECIAL_CHARS);
$State = filter_var($_POST['state'], FILTER_SANITIZE_SPECIAL_CHARS);
$Located = filter_var($_POST['located'], FILTER_SANITIZE_SPECIAL_CHARS);
$LatLong = filter_var($_POST['latlong'], FILTER_SANITIZE_SPECIAL_CHARS);
$linkgoogle = filter_var($_POST['linkgooglemaps'], FILTER_SANITIZE_SPECIAL_CHARS);
$CreditCard = filter_var($_POST['creditcard'], FILTER_SANITIZE_SPECIAL_CHARS);
$Central = filter_var($_POST['central'], FILTER_SANITIZE_SPECIAL_CHARS);
$Registred = filter_var($_POST['registred'], FILTER_SANITIZE_SPECIAL_CHARS);
$Comments = filter_var($_POST['comments'], FILTER_SANITIZE_SPECIAL_CHARS);
$Score = filter_var($_POST['score'], FILTER_SANITIZE_SPECIAL_CHARS);
$EstadoSoli = filter_var($_POST['status'], FILTER_SANITIZE_SPECIAL_CHARS);
$Piso = filter_var($_POST['piso'], FILTER_SANITIZE_SPECIAL_CHARS);
$Depto = filter_var($_POST['depto'], FILTER_SANITIZE_SPECIAL_CHARS);
$CodigoPostal = filter_var($_POST['codigopostal'], FILTER_SANITIZE_SPECIAL_CHARS);

$archivos = $_FILES['archivos'];

// Actualizar la información de la solicitud en la tabla `ventas`
$updateQuery = "UPDATE `ventas` 
                SET `numerosolicitud` = '$NumeroSolicitud', `producto`='$Product', `linea`='$NumberClient', 
                    `empresa`='$Empresa', `tipo`='$Tipo', `nombrecliente`='$Name', `fechanacimientocliente`='$Birthdate', 
                    `documentocliente`='$Document', `cuitcliente`='$Cuit', `numeroalternativo`='$NumberAlter', 
                    `email` = '$Email', `planes`='$Plans', `score`='$Score', `verificacion`='$Verificacion', 
                    `calle`='$Street', `numero`='$Number', `piso`='$Piso', `dpto`='$Depto', `entrecalles`='$Street2', 
                    `provincia`='$State', `localidad`='$Located', `codigopostal`='$CodigoPostal', 
                    `coordenadas`='$LatLong', `linkgooglemaps`='$linkgoogle', `tarjetacredito`='$CreditCard', 
                    `central`='$Central', `manzanaregistro`='$Registred', `comentarios`='$Comments', 
                    `estadoventa` = '$EstadoSoli' 
                WHERE `documentocliente` = '$Document' AND `linea` = '$NumberClient'";

$Result = mysqli_query($conexion, $updateQuery);

if (!$Result) {
    echo "<div class='alert alert-danger' role='alert'>
    Error al editar la venta: " . mysqli_error($conexion) . "
  </div>";
    exit();
}

// Procesar la subida de nuevos archivos si existen
if (!empty($archivos['name'][0])) {
    foreach ($archivos['tmp_name'] as $key => $tmp_name) {
        $nombre_archivo = $archivos['name'][$key];
        $tipo_archivo = $archivos['type'][$key];
        $tamano_archivo = $archivos['size'][$key];
        $tmp_name = $archivos['tmp_name'][$key];

        // Mueve el archivo a la ubicación deseada
        $carpeta_destino = './archivos/';
        $ruta_destino = $carpeta_destino . $nombre_archivo;
        move_uploaded_file($tmp_name, $ruta_destino);

        // Obtener el id de la venta
        $venta_id_query = "SELECT id FROM `ventas` WHERE `documentocliente` = '$Document' AND `linea` = '$NumberClient'";
        $venta_id_result = mysqli_query($conexion, $venta_id_query);
        if ($venta_id_result && mysqli_num_rows($venta_id_result) > 0) {
            $venta_id_row = mysqli_fetch_assoc($venta_id_result);
            $venta_id = $venta_id_row['id'];

            // Insertar el nuevo archivo en la tabla `archivos`
            $insertArchivoQuery = "INSERT INTO `archivos`(`venta_id`, `nombre_archivo`, `tipo_archivo`, `tamano_archivo`) 
                                   VALUES ('$venta_id', '$nombre_archivo', '$tipo_archivo', '$tamano_archivo')";
            $archivoResult = mysqli_query($conexion, $insertArchivoQuery);

            if (!$archivoResult) {
                echo "<div class='alert alert-danger' role='alert'>
                Error al agregar el archivo: " . mysqli_error($conexion) . "
              </div>";
                exit();
            }
        } else {
            echo "<div class='alert alert-danger' role='alert'>
            No se pudo encontrar la venta correspondiente.
          </div>";
            exit();
        }
    }
}

// Redireccionar después de la operación exitosa
header('Location:./solicitudes2.php');
?>


?>
