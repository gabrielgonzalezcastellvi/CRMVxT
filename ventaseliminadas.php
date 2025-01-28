<?php
require './conexion.php';

// Obtener los parámetros de la solicitud
$Id = $_GET['id'];
$DocumentoCliente = $_GET['documentocliente'];
$Linea = $_GET['linea'];
$Equipo = $_GET['equipo'];
// Consultar la venta
$Query = "SELECT * FROM ventas WHERE id = ? AND documentocliente = ? AND linea = ? AND equipo = ?";
$stmt = $conexion->prepare($Query);
$stmt->bind_param('ssss', $Id, $DocumentoCliente, $Linea, $Equipo);
$stmt->execute();
$Result = $stmt->get_result();

// Verificar si se encontró la venta
if ($row = $Result->fetch_assoc()) {
    // Obtener los datos de la venta
    
    $Id = $row['id'];
    $vendedor = filter_var($row['vendedor'], FILTER_SANITIZE_STRING);
    $equipo = filter_var($row['equipo'], FILTER_SANITIZE_STRING);
    $producto = filter_var($row['producto'], FILTER_SANITIZE_STRING);
    $lineas = $row['linea'];
    $empresa = filter_var($row['empresa'], FILTER_SANITIZE_STRING);
    $Tipo = filter_var($row['tipo'], FILTER_SANITIZE_STRING);
    $nombrecliente = filter_var($row['nombrecliente'], FILTER_SANITIZE_STRING);
    $fechanacimientocliente = filter_var($row['fechanacimientocliente'], FILTER_SANITIZE_STRING);
    $documentocliente = filter_var($row['documentocliente'], FILTER_SANITIZE_STRING);
    $cuitcliente = filter_var($row['cuitcliente'], FILTER_SANITIZE_STRING);
    $numeroalternativo = filter_var($row['numeroalternativo'], FILTER_SANITIZE_STRING);
    $email = filter_var($row['email'], FILTER_SANITIZE_EMAIL);
    $planes = filter_var($row['planes'], FILTER_SANITIZE_STRING);
    $score = $row['score'];
    $verificacion = filter_var($row['verificacion'], FILTER_SANITIZE_STRING);
    $fechacarga = filter_var($row['fechacarga'], FILTER_SANITIZE_STRING);
    $calle = filter_var($row['calle'], FILTER_SANITIZE_STRING);
    $numero = $row['numero'];
    $piso = filter_var($row['piso'], FILTER_SANITIZE_STRING);
    $dpto = filter_var($row['dpto'], FILTER_SANITIZE_STRING);
    $entrecalles = filter_var($row['entrecalles'], FILTER_SANITIZE_STRING);
    $provincia = filter_var($row['provincia'], FILTER_SANITIZE_STRING);
    $localidad = filter_var($row['localidad'], FILTER_SANITIZE_STRING);
    $codigopostal = filter_var($row['codigopostal'], FILTER_SANITIZE_STRING);
    $coordenadas = filter_var($row['coordenadas'], FILTER_SANITIZE_STRING);
    $linkgooglemaps = filter_var($row['linkgooglemaps'], FILTER_SANITIZE_URL);
    $tarjetadecredito = filter_var($row['tarjetacredito'], FILTER_SANITIZE_STRING);
    $central = filter_var($row['central'], FILTER_SANITIZE_STRING);
    $manzanaregistro = filter_var($row['manzanaregistro'], FILTER_SANITIZE_STRING);
    $comentarios = filter_var($row['comentarios'], FILTER_SANITIZE_STRING);
    $EstadoVenta = filter_var($row['estadoventa'], FILTER_SANITIZE_STRING);
    $NumeroSolicitud = filter_var($row['numerosolicitud'], FILTER_SANITIZE_STRING);
    $archivos = filter_var($row['archivo'], FILTER_SANITIZE_STRING);
    $fechaportacion = filter_var($row['fechaportacion'], FILTER_SANITIZE_STRING);
    $fechadecambio = filter_var($row['fechadecambio'], FILTER_SANITIZE_STRING);
    $idFoto = $row['id_foto'];

    // Insertar la venta en ventaseliminadas
    $Query = "INSERT INTO `ventaseliminadas` (
        `id`, `vendedor`, `equipo`,`producto`, `linea`, `empresa`, `tipo`, `nombrecliente`, 
        `fechanacimientocliente`, `documentocliente`, `cuitcliente`, `numeroalternativo`, 
        `email`, `planes`, `score`, `verificacion`, `fechacarga`, `calle`, `numero`, 
        `piso`, `dpto`, `entrecalles`, `provincia`, `localidad`, `codigopostal`, 
        `coordenadas`, `linkgooglemaps`, `tarjetacredito`, `central`, `manzanaregistro`, 
        `comentarios`, `estadoventa`, `numerosolicitud`, `archivo`, `fechaportacion`, 
        `fechadecambio`,`id_foto`
    ) VALUES (
        ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
    )";
    $stmt = $conexion->prepare($Query);
    if (!$stmt) {
        die("Error en la preparación de la consulta: " . $conexion->error);
    }
    
    $stmt->bind_param(
        'sssssssssssssssssssssssssssssssssssss', 
        $Id, $vendedor, $equipo, $producto, $lineas, $empresa, $Tipo, $nombrecliente, $fechanacimientocliente, 
        $documentocliente, $cuitcliente, $numeroalternativo, $email, $planes, $score, $verificacion, 
        $fechacarga, $calle, $numero, $piso, $dpto, $entrecalles, $provincia, $localidad, 
        $codigopostal, $coordenadas, $linkgooglemaps, $tarjetadecredito, $central, $manzanaregistro, 
        $comentarios, $EstadoVenta, $NumeroSolicitud, $archivos, $fechaportacion, $fechadecambio,$idFoto
    );

    $stmt->execute();
    
    if ($stmt->affected_rows > 0) {
        // Mover las imágenes relacionadas en la tabla 'archivos'
        $QuerySeleccionarFoto = "SELECT id, venta_id, nombre_archivo, ruta_archivo FROM archivos WHERE venta_id = ?";
        $stmt = $conexion->prepare($QuerySeleccionarFoto);
        if (!$stmt) {
            die("Error en la preparación de la consulta de selección de archivos: " . $conexion->error);
        }
        $stmt->bind_param('s', $Id);
        $stmt->execute();
        $ResultSeleccionarFoto = $stmt->get_result();

        while ($row = $ResultSeleccionarFoto->fetch_assoc()) {
            $archivo_id = $row['id'];
            $venta_id = $row['venta_id'];
            $nombre = $row['nombre_archivo'];
            $ruta = $row['ruta_archivo'];

            // Insertar el archivo en 'archivoseliminados' con el id
            $QueryArchivoEliminado = "INSERT INTO archivoseliminados (id, venta_id, nombre, ruta) VALUES (?, ?, ?, ?)";
            $stmtInsertarArchivo = $conexion->prepare($QueryArchivoEliminado);
            if (!$stmtInsertarArchivo) {
                die("Error en la preparación de la consulta de inserción de archivos: " . $conexion->error);
            }
            $stmtInsertarArchivo->bind_param('isss', $archivo_id, $venta_id, $nombre, $ruta);
            $stmtInsertarArchivo->execute();
        }

        // Eliminar las filas de la tabla 'archivos'
        $QueryEliminarArchivos = "DELETE FROM archivos WHERE venta_id = ?";
        $stmtEliminarArchivos = $conexion->prepare($QueryEliminarArchivos);
        if (!$stmtEliminarArchivos) {
            die("Error en la preparación de la consulta de eliminación de archivos: " . $conexion->error);
        }
        $stmtEliminarArchivos->bind_param('s', $Id);
        $stmtEliminarArchivos->execute();

        // Eliminar la venta de la tabla 'ventas'
        $Query = "DELETE FROM ventas WHERE id = ? AND documentocliente = ? AND linea = ?";
        $stmt = $conexion->prepare($Query);
        if (!$stmt) {
            die("Error en la preparación de la consulta de eliminación de ventas: " . $conexion->error);
        }
        $stmt->bind_param('sss', $Id, $DocumentoCliente, $Linea);
        $stmt->execute();

        // Verificar si se eliminó la venta de 'ventas'
        if ($stmt->affected_rows > 0) {
            header('Location: solicitudes.php');
            exit();
        } else {
            echo "Error al eliminar la venta de la tabla 'ventas'.";
        }
    } else {
        echo "Error al insertar la venta en la tabla 'ventaseliminadas': " . $stmt->error;
    }
} else {
    echo "No se encontró la venta eliminada.";
}

// Cerrar la conexión
$stmt->close();
$conexion->close();
?>
