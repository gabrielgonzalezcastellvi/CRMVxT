<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ventasvxt";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$sql = $_POST['consulta'];
$sql = base64_decode($sql);

// Buscar la posición de la cláusula "LIMIT" en la consulta original
$posicion_limit = strpos($sql, "LIMIT");

// Extraer la parte de la consulta antes de la cláusula "LIMIT"
$sql_antes_limit = substr($sql, 0, $posicion_limit);

// Buscar la posición de la cláusula "FROM" en la parte de la consulta antes de "LIMIT"
$posicion_from = strpos($sql_antes_limit, "FROM");

// Extraer la parte de la consulta después de la cláusula "FROM"
$sql_despues_from = substr($sql_antes_limit, $posicion_from);

// Agregar la nueva selección de columnas antes de la parte extraída de la consulta original
$sql = "SELECT numerosolicitud,vendedor,estadoventa,fechaportacion,producto,linea,nombrecliente,documentocliente,numeroalternativo,planes,score,fechacarga,fechanacimientocliente,calle,numero,entrecalles,provincia,localidad,codigopostal " . $sql_despues_from;

$sql = str_replace("ORDER BY id DESC", "ORDER BY fechaportacion ASC", $sql);


$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Nombre del archivo y creación de archivo CSV
    $filename = "ReporteVentas.csv";
    $fp = fopen($filename, 'w');

    if ($fp === false) {
        die("Error: No se pudo crear el archivo CSV");
    }

    // Cabeceras del archivo CSV
    $header = array("Numero solicitud","Vendedor", "Estado venta", "Fecha de portacion", "Producto", "Linea","Nombre cliente","Documento cliente","Numero alternativo","Plan","Score","Fecha carga","Fecha nacimiento cliente","Calle","Altura","Entre calles","Provincia","Localidad","Codigo postal"); // Cambia los nombres por las adecuadas
    fputcsv($fp, $header);

    // Datos obtenidos de la consulta y escritura en el archivo CSV
    while ($row = $result->fetch_assoc()) {
        fputcsv($fp, $row);
    }

    // Cerrar archivo
    fclose($fp);

    // Descargar archivo CSV generado
    header('Content-Type: application/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '"');
    readfile($filename);
    exit;
} else {
    echo "0 resultados";
}

// Cerrar conexión a la base de datos
$conn->close(); 

?>
