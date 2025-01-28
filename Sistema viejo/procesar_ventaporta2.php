<?php
// Procesar la venta y guardarla en la base de datos
session_start();
date_default_timezone_set('America/Argentina/Mendoza');
require './conexion.php';

// Sanitizar todas las variables POST
$producto = filter_input(INPUT_POST, 'producto', FILTER_SANITIZE_STRING);
$vendedor = filter_input(INPUT_POST, 'vendedor', FILTER_SANITIZE_STRING);
$lineas = filter_input(INPUT_POST, 'lineas', FILTER_SANITIZE_STRING);
$empresa = filter_input(INPUT_POST, 'empresa', FILTER_SANITIZE_STRING);
$Tipo = filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_STRING);
$nombrecliente = filter_input(INPUT_POST, 'nombrecliente', FILTER_SANITIZE_STRING);
$fechanacimientocliente = filter_input(INPUT_POST, 'fechanacimientocliente', FILTER_SANITIZE_STRING);
$documentocliente = filter_input(INPUT_POST, 'documentocliente', FILTER_SANITIZE_STRING);
$cuitcliente = filter_input(INPUT_POST, 'cuitcliente', FILTER_SANITIZE_STRING);
$numeroalternativo = filter_input(INPUT_POST, 'numeroalternativo', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$productos = filter_input(INPUT_POST, 'productos', FILTER_SANITIZE_STRING);
$score = filter_input(INPUT_POST, 'score', FILTER_SANITIZE_STRING);
$verificacion = filter_input(INPUT_POST, 'verificacion', FILTER_SANITIZE_STRING);
$calle = filter_input(INPUT_POST, 'calle', FILTER_SANITIZE_STRING);
$numero = filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_STRING);
$piso = filter_input(INPUT_POST, 'piso', FILTER_SANITIZE_STRING);
$dpto = filter_input(INPUT_POST, 'dpto', FILTER_SANITIZE_STRING);
$entrecalles = filter_input(INPUT_POST, 'entrecalles', FILTER_SANITIZE_STRING);
$provincia = filter_input(INPUT_POST, 'provincia', FILTER_SANITIZE_STRING);
$localidad = filter_input(INPUT_POST, 'localidad', FILTER_SANITIZE_STRING);
$codigopostal = filter_input(INPUT_POST, 'codigopostal', FILTER_SANITIZE_STRING);

// Sanitizar coordenadas si están presentes
$coordenadas = isset($_POST['coordenadas']) ? filter_input(INPUT_POST, 'coordenadas', FILTER_SANITIZE_STRING) : null;

// Sanitizar enlace Google Maps si está presente
$linkgooglemaps = isset($_POST['maps']) ? filter_input(INPUT_POST, 'maps', FILTER_SANITIZE_URL) : null;

$comentarios = filter_input(INPUT_POST, 'comentarios', FILTER_SANITIZE_STRING);
$EstadoVenta = 'POST VENTA';
$archivos = $_FILES['archivos'];

// Insertar información de la venta en la base de datos
$Query = "INSERT INTO `ventas`(`vendedor`, `producto`, `linea`,`empresa`,`tipo`, `nombrecliente`, `fechanacimientocliente`, `documentocliente`,`cuitcliente`,`numeroalternativo`,`email`, `planes`, `score`,`verificacion`, `fechacarga`, `calle`, `numero`, `piso`, `dpto`, `entrecalles`, `provincia`, `localidad`, `codigopostal`, `coordenadas`, `linkgooglemaps`, `comentarios`, `estadoventa`) VALUES (
    '" . mysqli_real_escape_string($conexion, $vendedor) . "',
    '" . mysqli_real_escape_string($conexion, $producto) . "',
    '" . mysqli_real_escape_string($conexion, $lineas) . "',
    '" . mysqli_real_escape_string($conexion, $empresa) . "',
    '" . mysqli_real_escape_string($conexion, $Tipo) . "',
    '" . mysqli_real_escape_string($conexion, $nombrecliente) . "',
    '" . mysqli_real_escape_string($conexion, $fechanacimientocliente) . "',
    '" . mysqli_real_escape_string($conexion, $documentocliente) . "',
    '" . mysqli_real_escape_string($conexion, $cuitcliente) . "',
    '" . mysqli_real_escape_string($conexion, $numeroalternativo) . "',
    '" . mysqli_real_escape_string($conexion, $email) . "',
    '" . mysqli_real_escape_string($conexion, $productos) . "',
    '" . mysqli_real_escape_string($conexion, $score) . "',
    '" . mysqli_real_escape_string($conexion, $verificacion) . "',
    NOW(),
    '" . mysqli_real_escape_string($conexion, $calle) . "',
    '" . mysqli_real_escape_string($conexion, $numero) . "',
    '" . mysqli_real_escape_string($conexion, $piso) . "',
    '" . mysqli_real_escape_string($conexion, $dpto) . "',
    '" . mysqli_real_escape_string($conexion, $entrecalles) . "',
    '" . mysqli_real_escape_string($conexion, $provincia) . "',
    '" . mysqli_real_escape_string($conexion, $localidad) . "',
    '" . mysqli_real_escape_string($conexion, $codigopostal) . "',
    '" . mysqli_real_escape_string($conexion, $coordenadas) . "',
    '" . mysqli_real_escape_string($conexion, $linkgooglemaps) . "',
    '" . mysqli_real_escape_string($conexion, $comentarios) . "',
    '$EstadoVenta'
)";

$Result = mysqli_query($conexion, $Query);

if ($Result) {
    // Obtener el ID de la venta recién insertada
    $venta_id = mysqli_insert_id($conexion);

    // Insertar archivos en la tabla 'archivos' si hay archivos adjuntos
    if (!empty($archivos['name'][0])) {
        foreach ($archivos['tmp_name'] as $key => $tmp_name) {
            $nombre_archivo = $archivos['name'][$key];
            $tipo_archivo = $archivos['type'][$key];
            $tamano_archivo = $archivos['size'][$key];
            $tmp_name = $archivos['tmp_name'][$key];

            // Mover el archivo a la ubicación deseada
            move_uploaded_file($tmp_name, "./archivos/" . $nombre_archivo);

            // Insertar información del archivo en la base de datos
            $Query = "INSERT INTO `archivos`(`venta_id`, `nombre_archivo`, `tipo_archivo`, `tamano_archivo`) VALUES ('$venta_id','$nombre_archivo','$tipo_archivo','$tamano_archivo')";
            $Result = mysqli_query($conexion, $Query);

            if (!$Result) {
                die("Error al insertar el archivo: " . mysqli_error($conexion));
            }
        }
    }

    echo "<div class='alert alert-success' role='alert'>¡Venta registrada con éxito!</div>";
} else {
    echo "<div class='alert alert-danger' role='alert'>Error al cargar la venta: " . mysqli_error($conexion) . "</div>";
}
?>
