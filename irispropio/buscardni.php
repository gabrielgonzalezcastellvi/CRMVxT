<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require '../conexion.php';

// Verificar que el número de DNI se ha recibido por POST
if (!isset($_POST['dni'])) {
    echo json_encode(array('error' => 'El número de DNI no fue enviado'));
    exit;
}

$dni = $_POST['dni'];
error_log("DNI recibido: " . $dni);

try {
    // Consulta para obtener el nombre del archivo basado en el número de DNI
    $query = "SELECT a.nombre_archivo 
              FROM ventas v 
              INNER JOIN archivos a ON v.id = a.venta_id 
              WHERE v.documentocliente = :dni 
              AND LOWER(RIGHT(a.nombre_archivo, 4)) != '.pdf'
              LIMIT 1";

    // Preparar la consulta
    $stmt = $conexion->prepare($query);
    $stmt->bindParam(':dni', $dni, PDO::PARAM_STR);

    // Ejecutar la consulta
    $stmt->execute();

    // Obtener el resultado de la consulta
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    error_log("Resultado de la consulta: " . json_encode($row));

    if ($row) {
        // Devolver el nombre del archivo como respuesta
        $response = array('nombre_archivo' => $row['nombre_archivo']);
    } else {
        // Si no se encuentra ninguna ruta, devolver un mensaje de error
        $response = array('error' => 'No se encontró ninguna ruta de archivo para el DNI proporcionado');
    }

    // Devolver la respuesta como JSON
    header('Content-Type: application/json');
    echo json_encode($response);

} catch(PDOException $e) {
    // En caso de error en la conexión o consulta, devolver un mensaje de error de base de datos
    error_log("Error de base de datos: " . $e->getMessage());
    $response = array('error' => 'Error en la conexión a la base de datos: ' . $e->getMessage());
    header('Content-Type: application/json');
    echo json_encode($response);

} catch(Exception $e) {
    // En caso de otro tipo de error
    error_log("Error general: " . $e->getMessage());
    $response = array('error' => 'Error general: ' . $e->getMessage());
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>
