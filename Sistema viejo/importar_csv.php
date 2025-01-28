<?php
require 'conexion.php';

// Función para convertir la fecha a formato Y-m-d
function convertDate($date) {
    if (empty($date)) {
        return NULL;
    }
    // Intentar diferentes formatos comunes de fecha
    $formats = ['d-m-Y', 'd/m/Y', 'Y-m-d'];
    foreach ($formats as $format) {
        $d = DateTime::createFromFormat($format, $date);
        if ($d && $d->format($format) === $date) {
            return $d->format('Y-m-d');
        }
    }
    // Si no se encuentra un formato válido, retornar NULL
    return NULL;
}

$archivo = fopen('backup1.csv', 'r');
if ($archivo !== FALSE) {
    // Omitir la primera línea (encabezados)
    fgetcsv($archivo);

    while (($datos = fgetcsv($archivo, 1000, ',')) !== FALSE) {
        $numerosolicitud = $datos[0];
        $vendedor = $datos[1];
        $estadoventa = $datos[2];
        $fechaportacion = convertDate($datos[3]);
        $producto = $datos[4];
        $linea = $datos[5];
        $nombrecliente = $datos[6];
        $documentocliente = $datos[7];
        $numeroalternativo = $datos[8];
        $planes = $datos[9];
        $score = $datos[10];
        $fechacarga = convertDate($datos[11]);
        $fechanacimientocliente = convertDate($datos[12]);
        $calle = $datos[13];
        $numero = $datos[14];
        $entrecalles = $datos[15];
        $provincia = $datos[16];
        $localidad = $datos[17];
        $codigopostal = $datos[18];

        $query = "INSERT INTO ventas (
            numerosolicitud, vendedor, estadoventa, fechaportacion, producto, linea,
            nombrecliente, documentocliente, numeroalternativo, planes, score, fechacarga,
            fechanacimientocliente, calle, numero, entrecalles, provincia, localidad, codigopostal
        ) VALUES (
            '$numerosolicitud', '$vendedor', '$estadoventa', '$fechaportacion', '$producto', '$linea',
            '$nombrecliente', '$documentocliente', '$numeroalternativo', '$planes', '$score', '$fechacarga',
            '$fechanacimientocliente', '$calle', '$numero', '$entrecalles', '$provincia', '$localidad', '$codigopostal'
        )";

        if (mysqli_query($conexion, $query)) {
            echo "Registro insertado con éxito<br>";
        } else {
            echo "Error al insertar el registro: " . mysqli_error($conexion) . "<br>";
        }
    }
    fclose($archivo);
} else {
    echo "Error al abrir el archivo.";
}

mysqli_close($conexion);
?>
