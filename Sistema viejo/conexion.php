<?php
// Configuración de la conexión
$servidor = "localhost";
$usuario = "root";
$contrasena = ""; // Cambia aquí si el usuario root tiene contraseña
$base_datos = "ventasvxt";

// Crear la conexión
try {
    $conexion = new mysqli($servidor, $usuario, $contrasena, $base_datos);

    // Verificar si hay errores
    if ($conexion->connect_error) {
        throw new Exception("Error en la conexión: " . $conexion->connect_error);
    }

    echo "Conexión exitosa a la base de datos.";
} catch (Exception $e) {
    die("No se pudo conectar a la base de datos. Detalles: " . $e->getMessage());
}
?>
