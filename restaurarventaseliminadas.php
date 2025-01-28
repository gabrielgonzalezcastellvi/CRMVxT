<?php
require './conexion.php';

// Obtener los parámetros de la solicitud
$Id = $_GET['id'];
$DocumentoCliente = $_GET['documentocliente'];
$Linea = $_GET['linea'];

// Consultar la venta eliminada
$Query = "SELECT * FROM ventaseliminadas WHERE id = ? AND documentocliente = ? AND linea = ?";
$stmt = $conexion->prepare($Query);
$stmt->bind_param('sss', $Id, $DocumentoCliente, $Linea);
$stmt->execute();
$Result = $stmt->get_result();

if ($row = $Result->fetch_assoc()) {
    // Obtener los datos de la venta eliminada
    $id = $row['id'];
    $vendedor = $row['vendedor'];
    $equipo = $row['equipo'];
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
    $tarjetacredito = $row['tarjetacredito'];
    $central = $row['central'];
    $manzanaregistro = $row['manzanaregistro'];
    $comentarios = $row['comentarios'];
    $estadoventa = $row['estadoventa'];
    $numerosolicitud = $row['numerosolicitud'];
    $archivo = $row['archivo'];
    $fechaportacion = $row['fechaportacion'];
    $fechadecambio = $row['fechadecambio'];
    $idFoto = $row['id_foto'];
}

$Query = "INSERT INTO ventas (
  `id`, `vendedor`, `equipo`, `producto`, `linea`, `empresa`, `tipo`, `nombrecliente`, 
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
$stmt->bind_param(
'sssssssssssssssssssssssssssssssssssss', 
$id, $vendedor, $equipo, $producto, $lineas, $empresa, $Tipo, $nombrecliente, $fechanacimientocliente, 
$documentocliente, $cuitcliente, $numeroalternativo, $email, $planes, $score, $verificacion, 
$fechacarga, $calle, $numero, $piso, $dpto, $entrecalles, $provincia, $localidad, 
$codigopostal, $coordenadas, $linkgooglemaps, $tarjetacredito, $central, $manzanaregistro, 
$comentarios, $estadoventa, $numerosolicitud, $archivo, $fechaportacion, $fechadecambio,$idFoto
);
$stmt->execute();

// Recuperar nombres de archivos eliminados asociados con esta venta
$QueryRecuperarArchivos = "SELECT nombre FROM archivoseliminados WHERE venta_id = ?";
$stmtRecuperarArchivos = $conexion->prepare($QueryRecuperarArchivos);
$stmtRecuperarArchivos->bind_param('s', $id);
$stmtRecuperarArchivos->execute();
$ResultArchivos = $stmtRecuperarArchivos->get_result();

// Insertar los archivos recuperados en la tabla 'archivos'
while ($rowArchivo = $ResultArchivos->fetch_assoc()) {
 $nombreArchivo = $rowArchivo['nombre'];

 $QueryInsertarArchivo = "INSERT INTO archivos (venta_id, nombre_archivo) VALUES (?, ?)";
 $stmtInsertarArchivo = $conexion->prepare($QueryInsertarArchivo);
 $stmtInsertarArchivo->bind_param('ss', $id, $nombreArchivo);
 $stmtInsertarArchivo->execute();
}

// Eliminar las filas correspondientes de la tabla 'archivoseliminados'
$QueryEliminarArchivos = "DELETE FROM archivoseliminados WHERE venta_id = ?";
$stmtEliminarArchivos = $conexion->prepare($QueryEliminarArchivos);
$stmtEliminarArchivos->bind_param('s', $id);
$stmtEliminarArchivos->execute();

// Verificar si se insertó la venta en 'ventas'
if ($stmt->affected_rows > 0) {
 // Eliminar la venta de la tabla 'ventaseliminadas'
 $Query = "DELETE FROM ventaseliminadas WHERE id = ? AND documentocliente = ? AND linea = ?";
 $stmt = $conexion->prepare($Query);
 $stmt->bind_param('sss', $Id, $DocumentoCliente, $Linea);
 $stmt->execute();

 // Verificar si se eliminó la venta de 'ventaseliminadas'
 if ($stmt->affected_rows > 0) {
     header('Location: solicitudes.php');
     exit();
 } else {
     echo "Error al eliminar la venta de la tabla 'ventaseliminadas'.";
 }
} else {
 echo "Error al insertar la venta en la tabla 'ventas'.";
}

// Cerrar la conexión
$stmt->close();
$conexion->close();

?>