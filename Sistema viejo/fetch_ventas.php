<?php
header('Content-Type: application/json');
include 'conexion.php'; // Asegúrate de que este archivo contiene la conexión a la base de datos

$whereClause = "";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Verificar producto
    if (!empty($_GET["producto"])) {
        $Producto = $_GET['producto'];
        $whereClause .= "producto LIKE '%$Producto%' AND ";
    }

    // Verificar fecha portacion
    if (!empty($_GET["fechaportaciondesde"]) && !empty($_GET["fechaportacionhasta"])) {
        $fechaportaciondesde = $_GET["fechaportaciondesde"];
        $fechaportacionhasta = $_GET["fechaportacionhasta"];
        $whereClause .= "fechaportacion BETWEEN '$fechaportaciondesde' AND '$fechaportacionhasta' AND ";
    }

    // Verificar si se proporcionó un número de solicitud
    if (!empty($_GET["estado"])) {
        $estado = $_GET["estado"];
        $whereClause .= "estadoventa LIKE '%$estado%' AND ";
    }

    if (!empty($_GET["numerosolicitud"])) {
        $numerosolicitud = $_GET["numerosolicitud"];
        $whereClause .= "numerosolicitud = '$numerosolicitud' AND ";
    }

    if (!empty($_GET["numerolinea"])) {
        $numerolinea = $_GET["numerolinea"];
        $whereClause .= "linea = '$numerolinea' AND ";
    }

    if (!empty($_GET["dni"])) {
        $dni = $_GET["dni"];
        $whereClause .= "documentocliente = '$dni' AND ";
    }

    if (!empty($_GET["vendedor"])) {
        $vendedor = $_GET["vendedor"];
        $whereClause .= "vendedor LIKE '%$vendedor%' AND ";
    }

    if (!empty($_GET["vendedor"]) && !empty($_GET["estadoventa"])) {
        $vendedor = $_GET["vendedor"];
        $estado = $_GET["estadoventa"];
        $whereClause .= "vendedor LIKE '%$vendedor%' AND estadoventa LIKE '%$estado%' AND ";
    }

    if (!empty($_GET["vendedor"]) && !empty($_GET["estadoventa"]) && !empty($_GET["numerosolicitud"])) {
        $vendedor = $_GET["vendedor"];
        $estado = $_GET["estadoventa"];
        $numerosolicitud = $_GET["numerosolicitud"];
        $whereClause .= "vendedor = '$vendedor' AND estadoventa = '$estado' AND numerosolicitud LIKE '%$numerosolicitud%' AND ";
    }

    $whereClause = rtrim($whereClause, " AND ");

    $Query = "SELECT * FROM ventas";
    $Query5 = "SELECT COUNT(DISTINCT linea,documentocliente,producto,calle,numero,piso,dpto,entrecalles,provincia,localidad,codigopostal) as TotalBusqueda FROM ventas";
    if (!empty($whereClause)) {
        $Query .= " WHERE $whereClause";
        $Query5 .= " WHERE $whereClause";
    }
    $Query .= " GROUP BY linea, documentocliente,producto ORDER BY id DESC LIMIT 20 OFFSET 0";
    $Query5 .= " ORDER BY id DESC LIMIT 20 OFFSET 0";

    $Result = mysqli_query($conexion, $Query);
    $Result5 = mysqli_query($conexion, $Query5);

    $TotalBusqueda = "";
    while ($row5 = $Result5->fetch_assoc()) {
        $TotalBusqueda = $row5['TotalBusqueda'];
    }

    $ventas = [];
    while ($row = $Result->fetch_assoc()) {
        $ventas[] = $row;
    }

    echo json_encode([
        "ventas" => $ventas,
        "TotalBusqueda" => $TotalBusqueda
    ]);
}
?>
