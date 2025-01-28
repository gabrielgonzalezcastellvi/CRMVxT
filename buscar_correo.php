<?php
require 'conexion.php'; 

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error); 
}

if(isset($_POST['lineas'])){ 
    $numero_linea = mysqli_real_escape_string($conexion, $_POST['lineas']); 
   
    $sql = "SELECT * FROM usuarios WHERE correo = ?"; 
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("s", $numero_linea);
    $stmt->execute();
    $result = $stmt->get_result(); 

    if ($result->num_rows > 0) {
        echo '<div class="alert alert-danger" role="alert">El correo ya existe.</div>';

    } else {
        echo '<div class="alert alert-success" role="alert">El correo está disponible.</div>';

    }

    $stmt->close();
} else {
    echo "El campo 'correo' no se ha enviado desde el formulario.";
}
?>