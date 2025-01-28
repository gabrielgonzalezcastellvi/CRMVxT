<?php
require './conexion.php';

// Obtener los parámetros de la solicitud
$Id = $_GET['id'];
$DocumentoCliente = $_GET['documentocliente'];
$Linea = $_GET['linea'];

// Consultar la venta
$Query = "SELECT * FROM ventas WHERE id = '$Id' AND documentocliente = '$DocumentoCliente' AND linea = '$Linea'";
$Result = mysqli_query($conexion, $Query);

// Verificar si se encontró la venta
if ($row = mysqli_fetch_assoc($Result)) {
    // Obtener los datos de la venta
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
    $comentarios = $row['comentarios'];
    $EstadoVenta = $row['estadoventa'];
    $archivos = $row['archivo'];

    // Insertar la venta en ventaseliminadas
    $Query = "INSERT INTO `ventaseliminadas` (`id`, `vendedor`, `producto`, `linea`, `empresa`, `tipo`, `nombrecliente`, `fechanacimientocliente`, `documentocliente`, `cuitcliente`, `numeroalternativo`, `email`, `planes`, `score`, `verificacion`, `fechacarga`, `calle`, `numero`, `piso`, `dpto`, `entrecalles`, `provincia`, `localidad`, `codigopostal`, `coordenadas`, `linkgooglemaps`, `comentarios`, `estadoventa`, `archivo`) VALUES ('DEFAULT', '$vendedor', '$producto', '$lineas', '$empresa', '$Tipo', '$nombrecliente', '$fechanacimientocliente', '$documentocliente', '$cuitcliente', '$numeroalternativo', '$email', '$planes', '$score', '$verificacion', '$fechacarga', '$calle', '$numero', '$piso', '$dpto', '$entrecalles', '$provincia', '$localidad', '$codigopostal', '$coordenadas', '$linkgooglemaps', '$comentarios', '$EstadoVenta', '$archivos')";
    $Result = mysqli_query($conexion, $Query);

    if ($Result) {
        // Eliminar los registros dependientes en la tabla 'archivos'
        $Query = "DELETE FROM archivos WHERE venta_id = '$Id'";
        mysqli_query($conexion, $Query);

        // Eliminar la venta de la tabla 'ventas'
        $Query = "DELETE FROM ventas WHERE id = '$Id' AND documentocliente = '$DocumentoCliente' AND linea = '$Linea'";
        $Result = mysqli_query($conexion, $Query);

        if ($Result) {
            header('Location:solicitudes.php');
        } else {
            echo "Error al eliminar la venta: " . mysqli_error($conexion);
        }
    } else {
        echo "Error al insertar en ventaseliminadas: " . mysqli_error($conexion);
    }
} else {
    echo "No se encontró la venta.";
}

// Cerrar la conexión
mysqli_close($conexion);
?>

