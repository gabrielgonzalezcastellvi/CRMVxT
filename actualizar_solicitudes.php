<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'conexion.php';

// Obtener el número de página de la solicitud si se proporciona, de lo contrario, establecer en 1 por defecto
$pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

// Calcular el offset basado en el número de página
$registros_por_pagina = 20;
$offset = ($pagina - 1) * $registros_por_pagina;

$Query = "SELECT * FROM ventas GROUP BY documentocliente, linea, producto ORDER BY id DESC LIMIT $registros_por_pagina OFFSET $offset";
$Query5 = "SELECT COUNT(DISTINCT linea, documentocliente, producto) AS TotalBusqueda FROM ventas";

$result = $conexion->query($Query);
$result5 = $conexion->query($Query5);

$data = [];
$data['ventas'] = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data['ventas'][] = $row;
    }
}

if ($result5->num_rows > 0) {
    $totalBusqueda = $result5->fetch_assoc();
    $data['total'] = $totalBusqueda['TotalBusqueda'];
}

header('Content-Type: application/json');
echo json_encode($data);

$conexion->close();
?>

