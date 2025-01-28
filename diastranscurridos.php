<?php
require './conexion.php';
// Verificar la conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Obtener todos los registros de ventas
$query = "SELECT id, fechadecambio, numerosolicitud FROM ventas";
$resultado = $conexion->query($query);

if ($resultado) {
    $fechaActual = date('Y-m-d');
    
    while ($fila = $resultado->fetch_assoc()) {
        $idVenta = $fila['id'];
        $ultimaFechaCambio = $fila['fechadecambio'];
        
        if ($ultimaFechaCambio !== null && $ultimaFechaCambio !== $fechaActual) {
            // Calcula la diferencia de días entre la fecha de cambio más reciente y la fecha actual
            $diferenciaDias = (strtotime($fechaActual) - strtotime($ultimaFechaCambio)) / (60 * 60 * 24);
        } else {
            $diferenciaDias = 0;
        }
        
        // Actualiza la columna dias_transcurridos en la base de datos
        $updateQuery = "UPDATE ventas SET dias_transcurridos = ? WHERE id = ?";
        $stmt = $conexion->prepare($updateQuery);
        $stmt->bind_param("ii", $diferenciaDias, $idVenta);
        
        if (!$stmt->execute()) {
            echo "<p>Error al actualizar los días transcurridos en la base de datos para ID $idVenta: " . $stmt->error . "</p>";
        }
        
        $stmt->close();
    }
    
} else {
    // Manejar el error en caso de que la consulta falle
    echo "<p>Error al consultar la base de datos: " . $conexion->error . "</p>";
}

$conexion->close();
?>

