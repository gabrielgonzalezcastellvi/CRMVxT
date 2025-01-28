<?php
session_start();
date_default_timezone_set('America/Argentina/Mendoza');
$Usuario = $_SESSION['Nombre'];
require 'conexion.php';

// Filtrar las variables de entrada
$venta_id = $_POST['idredireccion'];
$Vendedor = $_POST['vendedor'];
$NumeroSolicitud = $_POST['numerosolicitud'];
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
$LoadDate = $_POST['dateload'];
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
$FechaPortacion = filter_var($_POST['fechaportacion'], FILTER_SANITIZE_SPECIAL_CHARS);
$EstadoSoli = filter_var($_POST['status'], FILTER_SANITIZE_SPECIAL_CHARS);
$Piso = filter_var($_POST['piso'], FILTER_SANITIZE_SPECIAL_CHARS);
$Depto = filter_var($_POST['depto'], FILTER_SANITIZE_SPECIAL_CHARS);
$CodigoPostal = filter_var($_POST['codigopostal'], FILTER_SANITIZE_SPECIAL_CHARS);
$FechadeCambio = isset($_POST['fechadecambio']) ? filter_var($_POST['fechadecambio'], FILTER_SANITIZE_SPECIAL_CHARS) : null;
$archivos = $_FILES['archivos'];
$pin = filter_var($_POST['pin'], FILTER_SANITIZE_SPECIAL_CHARS);
$fechavencimiento = filter_var($_POST['fechavencimiento'], FILTER_SANITIZE_SPECIAL_CHARS);


// Primero, buscamos la venta existente con los datos actuales
$searchQuery = "SELECT * FROM `ventas` 
                WHERE id = '$venta_id'";

if ($NumeroSolicitud != 0) {
   $searchQuery .= " OR numerosolicitud = '$NumeroSolicitud'";
}

$searchResult = mysqli_query($conexion, $searchQuery);

// Si se encuentra al menos una fila, procedemos a actualizar
if (mysqli_num_rows($searchResult) > 0) {
    // Obtener los datos actuales de la venta
    $venta_actual = mysqli_fetch_assoc($searchResult);
    $venta_id = $venta_actual['id'];


    if(!empty($_POST['fechaportacion'])){
        // Datos nuevos a actualizar
        $datos_nuevos = [
           "numerosolicitud" => $NumeroSolicitud,
           "producto" => $Product,
           "linea" => $NumberClient,
           "empresa" => $Empresa,
           "tipo" => $Tipo,
           "nombrecliente" => $Name,
           "fechanacimientocliente" => $Birthdate,
           "documentocliente" => $Document,
           "cuitcliente" => $Cuit,
           "numeroalternativo" => $NumberAlter,
           "email" => $Email,
           "planes" => $Plans,
           "score" => $Score,
           "verificacion" => $Verificacion,
           "fechacarga" => $LoadDate,
           "calle" => $Street,
           "numero" => $Number,
           "piso" => $Piso,
           "dpto" => $Depto,
           "entrecalles" => $Street2,
           "provincia" => $State,
           "localidad" => $Located,
           "codigopostal" => $CodigoPostal,
           "coordenadas" => $LatLong,
           "linkgooglemaps" => $linkgoogle,
           "tarjetacredito" => $CreditCard,
           "central" => $Central,
           "manzanaregistro" => $Registred,
           "comentarios" => $Comments,
           "pin" => $pin,
           "fechavencimiento" => $fechavencimiento,
           "estadoventa" => $EstadoSoli,
           "fechaportacion" => $FechaPortacion
       ];
       }else{
            // Datos nuevos a actualizar
            $datos_nuevos = [
               "numerosolicitud" => $NumeroSolicitud,
               "producto" => $Product,
               "linea" => $NumberClient,
               "empresa" => $Empresa,
               "tipo" => $Tipo,
               "nombrecliente" => $Name,
               "fechanacimientocliente" => $Birthdate,
               "documentocliente" => $Document,
               "cuitcliente" => $Cuit,
               "numeroalternativo" => $NumberAlter,
               "email" => $Email,
               "planes" => $Plans,
               "score" => $Score,
               "verificacion" => $Verificacion,
               "fechacarga" => $LoadDate,
               "calle" => $Street,
               "numero" => $Number,
               "piso" => $Piso,
               "dpto" => $Depto,
               "entrecalles" => $Street2,
               "provincia" => $State,
               "localidad" => $Located,
               "codigopostal" => $CodigoPostal,
               "coordenadas" => $LatLong,
               "linkgooglemaps" => $linkgoogle,
               "tarjetacredito" => $CreditCard,
               "central" => $Central,
               "manzanaregistro" => $Registred,
               "comentarios" => $Comments,
               "pin" => $pin,
               "fechavencimiento" => $fechavencimiento,
               "estadoventa" => $EstadoSoli
               
           ];
       }

    if ($FechadeCambio == true) {
        $datos_nuevos["fechadecambio"] = $FechadeCambio;
    }

    // Comparar datos y registrar cambios
    $cambios_realizados = [];
    foreach ($datos_nuevos as $campo => $valor_nuevo) {
        if ($venta_actual[$campo] != $valor_nuevo) {
            $valor_anterior = $venta_actual[$campo];
            $cambios_realizados[] = "$campo: '" . mysqli_real_escape_string($conexion, $valor_anterior) . "' => '" . mysqli_real_escape_string($conexion, $valor_nuevo) . "'";
        }
    }

    // Si hay cambios, registrar en la base de datos
    if (!empty($cambios_realizados)) {
        $cambios_realizados_str = implode(', ', $cambios_realizados);
        $fecha_cambio = date('Y-m-d');
        $hora_cambio = date('H:i:s');
        $cambiosQuery = "INSERT INTO `cambios_solicitud` (`id_solicitud`, `usuario`, `fecha`, `cambios_realizados`, `hora`) 
                         VALUES ('$venta_id', '$Usuario', '$fecha_cambio', '" . mysqli_real_escape_string($conexion, $cambios_realizados_str) . "', '$hora_cambio')";
       mysqli_query($conexion, $cambiosQuery);
    }

    // Construcción de la consulta de actualización
    $setFields = [];
    foreach ($datos_nuevos as $campo => $valor_nuevo) {
        $setFields[] = "$campo = '" . mysqli_real_escape_string($conexion, $valor_nuevo) . "'";
    }

    $updateQuery = "UPDATE `ventas` SET " . implode(', ', $setFields) . " WHERE id = $venta_id";

    $updateResult = mysqli_query($conexion, $updateQuery);

    if ($updateResult) {
        // Manejo de la carga de imágenes
        if (!empty($_FILES['archivos']['name'][0])) {
            // Iterar sobre las imágenes
            foreach ($_FILES['archivos']['name'] as $index => $nombre_imagen) {
                // Obtener información de la imagen actual
                $nombre_imagen = mysqli_real_escape_string($conexion, $_FILES['archivos']['name'][$index]);
                $ruta_temporal = $_FILES['archivos']['tmp_name'][$index];

                // Definir la ruta de destino y mover la imagen
                $carpeta_destino = './archivos/';
                $ruta_destino = $carpeta_destino . $nombre_imagen;
                if (move_uploaded_file($ruta_temporal, $ruta_destino)) {
                    // Insertar información de la imagen en la base de datos
                    $query = "INSERT INTO `archivos` (`venta_id`, `nombre_archivo`, `ruta_archivo`) VALUES ('$venta_id', '$nombre_imagen', '$ruta_destino')";
                    mysqli_query($conexion, $query);

                    $accion = "Archivo agregado"; // Puedes cambiar esto según el caso
                    $fecha_cambio = date('Y-m-d');
                    $hora_cambio = date('H:i:s');
                    $cambiosQuery = "INSERT INTO `cambios_solicitud` (`id_solicitud`, `usuario`, `fecha`, `cambios_realizados`, `hora`) 
                             VALUES ('$venta_id', '$Usuario', '$fecha_cambio', '" . mysqli_real_escape_string($conexion, $accion) . ": $nombre_imagen', '$hora_cambio')";
                    mysqli_query($conexion, $cambiosQuery);
                    
                } else {
                    echo "<div class='alert alert-danger' role='alert'>Error al cargar la imagen: $nombre_imagen</div>";
                }
            }
        }

        // Redireccionar después de la inserción
     header("Location: solicitudesasm");
    } else {
       echo "<div class='alert alert-danger' role='alert'>Error al editar la venta: " . mysqli_error($conexion) . "</div>";
    }
    
} else {
    echo "<div class='alert alert-danger' role='alert'>No se encontró ninguna fila con los datos especificados.</div>";
}

?>
