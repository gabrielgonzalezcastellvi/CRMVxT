<?php
// Directorio donde se encuentran los archivos
$directorio = './ofertasmovi/';

// Obtener la lista de archivos en el directorio
$archivos = scandir($directorio);

// Eliminar los directorios . y ..
$archivos = array_diff($archivos, array('.', '..'));

// Salida JSON de los archivos
echo json_encode($archivos);
?>