<?php
session_start();
date_default_timezone_set('America/Argentina/Mendoza');

$Vendedor = $_SESSION['Nombre'];
// Conexión a la base de datos
$conn = new mysqli("localhost", "root", "", "ventasvxt");

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$fechaCarga = date('Y-m-d'); // Asumiendo que deseas la fecha actual

$sql = "SELECT cs.hora, cs.cambios_realizados, cs.usuario AS persona, v.numerosolicitud, COUNT(cs.id_solicitud) AS cambios_count
        FROM cambios_solicitud cs
        JOIN ventas v ON cs.id_solicitud = v.id 
        WHERE v.vendedor = '$Vendedor' AND v.fechacarga = '$fechaCarga'
        GROUP BY cs.hora, cs.cambios_realizados, cs.usuario, v.numerosolicitud
        ORDER BY cs.hora DESC;";
$result = $conn->query($sql);

$notifications = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $notifications[] = $row;
    }
}

$conn->close();
echo json_encode($notifications);
?>
