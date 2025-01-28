<?php
require 'conexion.php';

$venta_id = filter_var($_POST['idredireccion'], FILTER_SANITIZE_SPECIAL_CHARS);
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
$LoadDate = filter_var($_POST['dateload'], FILTER_SANITIZE_SPECIAL_CHARS);
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
$NumberPag = filter_var($_POST['numeropagina'], FILTER_SANITIZE_SPECIAL_CHARS);
$FechadeCambio = isset($_POST['fechadecambio']) ? filter_var($_POST['fechadecambio'], FILTER_SANITIZE_SPECIAL_CHARS) : null;
$archivos = $_FILES['archivos'];

// Consulta para obtener el estado actual de la venta
$Query = "SELECT estadoventa FROM ventas WHERE documentocliente = '$Document' AND linea = '$NumberClient' AND producto = '$Product' AND vendedor = '$Vendedor'";
if ($NumeroSolicitud != 0) {
    $Query .= " AND numerosolicitud = '$NumeroSolicitud'";
}
$Query .= " AND calle = '$Street' AND numero = '$Number'";

$Result = mysqli_query($conexion, $Query);
$Estadoventaactual = ($Result && $row = $Result->fetch_assoc()) ? $row['estadoventa'] : null;

// Construcción de la consulta de actualización
$setFields = [
    "numerosolicitud = '$NumeroSolicitud'",
    "producto = '$Product'",
    "linea = '$NumberClient'",
    "empresa = '$Empresa'",
    "tipo = '$Tipo'",
    "nombrecliente = '$Name'",
    "fechanacimientocliente = '$Birthdate'",
    "documentocliente = '$Document'",
    "cuitcliente = '$Cuit'",
    "numeroalternativo = '$NumberAlter'",
    "email = '$Email'",
    "planes = '$Plans'",
    "score = '$Score'",
    "verificacion = '$Verificacion'",
    "fechacarga = '$LoadDate'",
    "calle = '$Street'",
    "numero = '$Number'",
    "piso = '$Piso'",
    "dpto = '$Depto'",
    "entrecalles = '$Street2'",
    "provincia = '$State'",
    "localidad = '$Located'",
    "codigopostal = '$CodigoPostal'",
    "coordenadas = '$LatLong'",
    "linkgooglemaps = '$linkgoogle'",
    "tarjetacredito = '$CreditCard'",
    "central = '$Central'",
    "manzanaregistro = '$Registred'",
    "comentarios = '$Comments'",
    "estadoventa = '$EstadoSoli'",
    "fechaportacion = '$FechaPortacion'"
];

if ($FechadeCambio) {
    $setFields[] = "fechadecambio = '$FechadeCambio'";
}

$Query = "UPDATE `ventas` SET " . implode(', ', $setFields) . " WHERE documentocliente = '$Document' AND linea = '$NumberClient' AND producto = '$Product' AND vendedor = '$Vendedor'";
if ($NumeroSolicitud != 0) {
    $Query .= " AND numerosolicitud = '$NumeroSolicitud'";
}

$Result = mysqli_query($conexion, $Query);

if ($Result) {
    // Obtener el ID de la venta recién insertada
    $venta_id = mysqli_insert_id($conexion);

    // Manejo de la carga de imágenes
    if (!empty($_FILES['archivos']['name'])) {
        // Iterar sobre las imágenes
        foreach ($_FILES['archivos']['name'] as $index => $nombre_imagen) {
            // Obtener información de la imagen actual
            $nombre_imagen = $_FILES['archivos']['name'][$index];
            $ruta_temporal = $_FILES['archivos']['tmp_name'][$index];

            // Definir la ruta de destino y mover la imagen
            $carpeta_destino = './archivos/';
            $ruta_destino = $carpeta_destino . $nombre_imagen;
            if (move_uploaded_file($ruta_temporal, $ruta_destino)) {
                // Insertar información de la imagen en la base de datos
                $query = "INSERT INTO `archivos` (`venta_id`, `nombre_archivo`, `ruta_archivo`) VALUES ('$venta_id', '$nombre_imagen', '$ruta_destino')";
                mysqli_query($conexion, $query);
            } else {
                echo "<div class='alert alert-danger' role='alert'>Error al cargar la imagen: $nombre_imagen</div>";
            }
        }
    }

    // Redireccionar después de la inserción
    header("Location: solicitudes.php?pagina=$NumberPag");
    exit();
} else {
    echo "<div class='alert alert-danger' role='alert'>Error al editar la venta</div>";
}

?>
