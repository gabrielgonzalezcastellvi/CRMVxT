<?php
header('Content-Type: application/json');

// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ventasvxt";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    echo json_encode(["error" => "Connection failed: " . $conn->connect_error]);
    exit();
}

$seller = $_GET['seller'] ?? 'Melisa Valdez'; // Default seller if not specified
$month = $_GET['month'] ?? ''; // Default to empty if not specified

// Prepare SQL query
$sql = "
    SELECT 
        DATE_FORMAT(fechacarga, '%Y-%m') AS mes_anio,
        estadoventa,
        COUNT(*) AS cantidad
    FROM 
        ventas
    WHERE 
        vendedor = ? 
        AND (DATE_FORMAT(fechacarga, '%Y-%m') = ? OR ? = '')
    GROUP BY 
        mes_anio, 
        estadoventa
    ORDER BY 
        mes_anio DESC, 
        estadoventa;
";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    echo json_encode(["error" => "Prepare failed: " . $conn->error]);
    $conn->close();
    exit();
}

// Use only two parameters
$monthParam = $month ? $month : ''; // Use empty string if no month is selected
$stmt->bind_param("ss", $seller, $monthParam);
$stmt->execute();

$result = $stmt->get_result();
$data = [];

while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);

$stmt->close();
$conn->close();
?>
