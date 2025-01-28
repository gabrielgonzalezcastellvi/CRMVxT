<?php
session_start();
$Id = $_GET['id'];
$Documento = $_GET['documentocliente'];
$NumeroLinea = $_GET['linea'];

require 'conexion.php';
#error_reporting(0);
#session_start();
$Vendedor = $_SESSION['Nombre'];
// Configuración de la paginación
$registros_por_pagina =10; // Número de registros a mostrar por página
$pagina_actual = isset($_GET['pagina']) ? $_GET['pagina'] : 1; // Página actual, por defecto 1

// Calcular el offset para la consulta SQL
$offset = ($pagina_actual - 1) * $registros_por_pagina;

// Consulta SQL con LIMIT y OFFSET

if ($_SERVER["REQUEST_METHOD"] == "GET") {
  echo  $Id = $_GET['id'];
echo $Documento = $_GET['documentocliente'];
echo $NumeroLinea = $_GET['linea'];

}

    foreach ($archivos['tmp_name'] as $key => $tmp_name) {
        $nombre_archivo = $archivos['name'][$key];   //para subir a la base de datos
        $tipo_archivo = $archivos['type'][$key];
        $tamano_archivo = $archivos['size'][$key];
        $tmp_name = $archivos['tmp_name'][$key];

        // Mueve el archivo a la ubicación deseada
        move_uploaded_file($tmp_name, "./archivos/" . $nombre_archivo);
        echo $Query = "INSERT INTO `ventas`(`archivo`) VALUES ('$nombre_archivo') WHERE id = '$Id' AND documentocliente = '$Documento' AND linea = '$NumeroLinea'";
        #$Result = mysqli_query($conexion,$Query);
        
        

    }


