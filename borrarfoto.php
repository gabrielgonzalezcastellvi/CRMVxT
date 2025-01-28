<?php
require 'conexion.php';
session_start();
date_default_timezone_set('America/Argentina/Mendoza');
$Usuario = $_SESSION['Nombre'];
$foto_id = $_GET['foto'];
echo $IdSoli = $_GET['id-soli'];

// Primero, obtenemos el ID de la venta relacionado con la imagen
$query = "SELECT venta_id FROM archivos WHERE nombre_archivo LIKE '%$foto_id%'";
$result = mysqli_query($conexion, $query);

if ($result && $row = mysqli_fetch_assoc($result)) {
    $venta_id = $row['venta_id'];

    // Luego, obtenemos la ruta de la imagen para poder eliminar el archivo físicamente
    $query = "SELECT ruta_archivo FROM archivos WHERE venta_id = $venta_id";
    $result = mysqli_query($conexion, $query);

    if ($result && $row = mysqli_fetch_assoc($result)) {
        $ruta_archivo = $row['ruta_archivo'];
        $accion = "Archivo eliminado"; // Puedes cambiar esto según el caso
                    $fecha_cambio = date('Y-m-d');
                    $hora_cambio = date('H:i:s');
                    $cambiosQuery = "INSERT INTO `cambios_solicitud` (`id_solicitud`, `usuario`, `fecha`, `cambios_realizados`, `hora`) 
                             VALUES ('$IdSoli', '$Usuario', '$fecha_cambio', '" . mysqli_real_escape_string($conexion, $accion) . ": $foto_id', '$hora_cambio')";
                    mysqli_query($conexion, $cambiosQuery);

        // Eliminamos el archivo físicamente
        if (file_exists($ruta_archivo)) {
            unlink($ruta_archivo);
        }

        // Eliminamos la entrada de la tabla `archivos`
        $delete_query = "DELETE FROM archivos WHERE nombre_archivo LIKE '%$foto_id%'";
        $delete_result = mysqli_query($conexion, $delete_query);

        if ($delete_result) {
            // Si es necesario, actualizamos la tabla `ventas` para quitar la referencia a la imagen
            $update_query = "UPDATE ventas SET archivo = NULL WHERE archivo = '$ruta_archivo'";
            $update_result = mysqli_query($conexion, $update_query);

            if ($update_result) {
               header('Location: solicitudes.php');
            } else {
                echo "Error al actualizar la referencia en ventas";
            }
        } else {
            echo "Error al eliminar la imagen de la base de datos";
        }
    } else {
        echo "Error al obtener la ruta de la imagen";
    }
} else {
    echo "Error al obtener el ID de la venta";
}
?>
