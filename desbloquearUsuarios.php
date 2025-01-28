<?php
require 'conexion.php';

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Actualizar la columna 'intentos' y 'bloqueado' a 0
     $query = "UPDATE usuarios SET intentos = 0, bloqueado = 0 WHERE id = $id";
     $stmt = $conexion->prepare($query);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        // Redireccionar a lista de usuarios
        header('Location: listausuarios.php');
        exit();
    } else {
        echo "Error al desbloquear el usuario.";
    }
} else {
    header('Location: listausuarios.php');
    exit();
}
?>
