<?php
require 'conexion.php'; 

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error); 
}

if(isset($_POST['lineas'])){
    $numero_linea = mysqli_real_escape_string($conexion, $_POST['lineas']); 
    $sql = "SELECT * FROM registronollame WHERE linea = ?"; 
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("s", $numero_linea);
    $stmt->execute();
    $result = $stmt->get_result(); 

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo '<div class="alert alert-danger" role="alert">La línea se encuentra en el registro no llame.</div>';

    } else {
        echo '<div class="alert alert-success" role="alert">La línea no está registrada en el registro no llame.</div>';

    }

    $stmt->close();
} 
?>

