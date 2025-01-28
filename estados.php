<?php
require 'conexion.php';
$Vendedor = $_SESSION['Nombre'];

//Consultas nuevas con todos los estados existentes

$queryTotalMes = "SELECT COUNT(*) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND equipo LIKE '%RODRIGO%'";
$resultTotalMes = mysqli_query($conexion, $queryTotalMes);
$TotalMes = mysqli_fetch_assoc($resultTotalMes)['total'];


// Obtener el total de ventas cargadas

$queryPostVenta = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND estadoventa = 'POST VENTA' AND equipo LIKE '%RODRIGO%'";
$resultPostVenta = mysqli_query($conexion, $queryPostVenta);
$totalIngresoPostVenta = mysqli_fetch_assoc($resultPostVenta)['total'];

// Obtener el total de ventas cargadas

$queryRechazoABD = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND estadoventa = 'RECHAZO ABD' AND equipo LIKE '%RODRIGO%'";
$resultRechazoABD = mysqli_query($conexion, $queryRechazoABD);
$totalRechazoABD = mysqli_fetch_assoc($resultRechazoABD)['total'];

// Obtener el total de ventas cargadas

$queryCancelada = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND estadoventa LIKE '%CANCELADA%' AND equipo LIKE '%RODRIGO%'";
$resultCancelada = mysqli_query($conexion, $queryCancelada);
$totalSolicitudesCanceladas = mysqli_fetch_assoc($resultCancelada)['total'];

// Obtener el total de ventas cargadas
$queryDevuelta = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND estadoventa = 'DEVUELTA' AND equipo LIKE '%RODRIGO%'";
$resultDevuelta = mysqli_query($conexion, $queryDevuelta);
$totalDevuelta = mysqli_fetch_assoc($resultDevuelta)['total'];

// Obtener el total de ventas cargadas

$queryPendienteDeVerificacion = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND estadoventa = 'PENDIENTE DE VERIFICACION' AND equipo LIKE '%RODRIGO%'";
$resultPendienteDeVerificacion = mysqli_query($conexion, $queryPendienteDeVerificacion);
$totalPendienteDeVerificacion = mysqli_fetch_assoc($resultPendienteDeVerificacion)['total'];

$queryPendienteCargaDama = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND estadoventa = 'PENDIENTE CARGA DAMA' AND equipo LIKE '%RODRIGO%'";
$resultPendienteCargaDama = mysqli_query($conexion, $queryPendienteCargaDama);
$totalPendienteCargaDama = mysqli_fetch_assoc($resultPendienteCargaDama)['total'];

// Obtener el total de ventas cargadas
$queryPendienteAuditoria = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND estadoventa = 'PENDIENTE AUDITORIA' AND equipo LIKE '%RODRIGO%'";
$resultPendienteAuditoria = mysqli_query($conexion, $queryPendienteAuditoria);
$totalPendienteDeAuditoria = mysqli_fetch_assoc($resultPendienteAuditoria)['total'];

// Obtener el total de ventas cargadas
$queryInformadaTasa = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND estadoventa = 'INFORMADA TASA' AND equipo LIKE '%RODRIGO%'";
$resultInformadaTasa = mysqli_query($conexion, $queryInformadaTasa);
$totalInformadaTasa = mysqli_fetch_assoc($resultInformadaTasa)['total'];

// Obtener el total de ventas cargadas
$queryPendienteCargaTasa = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa = 'PENDIENTE CARGA TASA' AND equipo LIKE '%RODRIGO%'";
$resultPendienteCargaTasa = mysqli_query($conexion, $queryPendienteCargaTasa);
$totalPendienteCargaTasa = mysqli_fetch_assoc($resultPendienteCargaTasa)['total'];


// Obtener el total de ventas cargadas
$queryDiferidaCargaTasa = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa = 'DIFERIDA CARGA TASA' AND equipo LIKE '%RODRIGO%'";
$resultDiferidaCargaTasa = mysqli_query($conexion, $queryDiferidaCargaTasa);
$totalDiferidaCargaTasa = mysqli_fetch_assoc($resultDiferidaCargaTasa)['total'];

// Obtener el total de ventas cargadas
$queryIngresadaTasa = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa = 'INGRESADA TASA' AND equipo LIKE '%RODRIGO%'";
$resultIngresadaTasa = mysqli_query($conexion, $queryIngresadaTasa);
$totalIngresadaTasa = mysqli_fetch_assoc($resultIngresadaTasa)['total'];

// Obtener el total de ventas cargadas
$queryEnTransito = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa = 'EN TRANSITO' AND equipo LIKE '%RODRIGO%'";
$resultEnTransito = mysqli_query($conexion, $queryEnTransito);
$totalEnTransito = mysqli_fetch_assoc($resultEnTransito)['total'];

// Obtener el total de ventas cargadas
$queryEnProcesoDigipTn = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa = 'EN PROCESO DIGIP-TN' AND equipo LIKE '%RODRIGO%'";
$resultEnProcesoDigipTn = mysqli_query($conexion, $queryEnProcesoDigipTn);
$totalEnProcesoDigipTn = mysqli_fetch_assoc($resultEnProcesoDigipTn)['total'];

// Obtener el total de ventas cargadas
$queryDevueltaXVerificacion = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa = 'DEVUELTA X VERIFICACION' AND equipo LIKE '%RODRIGO%'";
$resultDevueltaXVerificacion = mysqli_query($conexion, $queryDevueltaXVerificacion);
$totalDevueltaXVerificacion = mysqli_fetch_assoc($resultDevueltaXVerificacion)['total'];

// Obtener el total de ventas cargadas
$queryDevueltaXAuditoria = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa = 'DEVUELTA X AUDITORIA' AND equipo LIKE '%RODRIGO%'";
$resultDevueltaXAuditoria = mysqli_query($conexion, $queryDevueltaXAuditoria);
$totalDevueltaXAuditoria = mysqli_fetch_assoc($resultDevueltaXAuditoria)['total'];

// Obtener el total de ventas cargadas
$queryDevueltaCargaTasa = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa = 'DEVUELTA CARGA TASA' AND equipo LIKE '%RODRIGO%'";
$resultDevueltaCargaTasa = mysqli_query($conexion, $queryDevueltaCargaTasa);
$totalDevueltaCargaTasa = mysqli_fetch_assoc($resultDevueltaCargaTasa)['total'];

// Obtener el total de ventas cargadas
$queryDiferidaAuditoria = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa = 'DIFERIDA AUDITORIA' AND equipo LIKE '%RODRIGO%'";
$resultDiferidaAuditoria = mysqli_query($conexion, $queryDiferidaAuditoria);
$totalDiferidaAuditoria = mysqli_fetch_assoc($resultDiferidaAuditoria)['total'];

// Obtener el total de ventas cargadas
$querySolicitudCumplida= "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa LIKE '%CUMPLIDA%' AND equipo LIKE '%RODRIGO%'";
$resultSolicitudCumplida = mysqli_query($conexion, $querySolicitudCumplida);
$totalSolicitudCumplida = mysqli_fetch_assoc($resultSolicitudCumplida)['total'];

// Obtener el total de ventas cargadas
$queryDevueltaPorVendedor = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa = 'DEVUELTA X VENDEDOR' AND equipo LIKE '%RODRIGO%'";
$resultDevueltaPorVendedor = mysqli_query($conexion, $queryDevueltaPorVendedor);
$totalDevueltaPorVendedor = mysqli_fetch_assoc($resultDevueltaPorVendedor)['total'];

// Obtener el total de ventas cargadas
$queryDevueltaTasa = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa = 'DEVUELTA TASA' AND equipo LIKE '%RODRIGO%'";
$resultDevueltaTasa = mysqli_query($conexion, $queryDevueltaTasa);
$totalDevueltaTasa = mysqli_fetch_assoc($resultDevueltaTasa)['total'];

// Obtener el total de ventas cargadas
$querySolicitudCancelada = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa LIKE '%CANCELADA%' AND equipo LIKE '%RODRIGO%'";
$resultSolicitudCancelada = mysqli_query($conexion, $querySolicitudCancelada);
$totalSolicitudCancelada = mysqli_fetch_assoc($resultSolicitudCancelada)['total'];

// Obtener el total de ventas cargadas
$queryPendienteCargaMovistar = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa = 'PENDIENTE CARGA MOVISTAR' AND equipo LIKE '%RODRIGO%'";
$resultPendienteCargaMovistar = mysqli_query($conexion, $queryPendienteCargaMovistar);
$totalPendienteCargaMovistar = mysqli_fetch_assoc($resultPendienteCargaMovistar)['total'];


$queryDiferidaCargaMovistar = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa = 'DIFERIDA CARGA MOVISTAR' AND equipo LIKE '%RODRIGO%'";
$resultDiferidaCargaMovistar = mysqli_query($conexion, $queryDiferidaCargaMovistar);
$totalDiferidaCargaMovistar = mysqli_fetch_assoc($resultDiferidaCargaMovistar)['total'];


$queryPendienteCargaIris = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa = 'PENDIENTE CARGA IRIS' AND equipo LIKE '%RODRIGO%'";
$resultPendienteCargaIris = mysqli_query($conexion, $queryPendienteCargaIris);
$totalPendienteCargaIris = mysqli_fetch_assoc($resultPendienteCargaIris)['total'];


$queryDevueltaCargaMovistar = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa = 'DEVUELTA CARGA MOVISTAR' AND equipo LIKE '%RODRIGO%'";
$resultDevueltaCargaMovistar = mysqli_query($conexion, $queryDevueltaCargaMovistar);
$totalDevueltaCargaMovistar = mysqli_fetch_assoc($resultDevueltaCargaMovistar)['total'];


$queryIngresadaMovistar = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa = 'INGRESADA MOVISTAR' AND equipo LIKE '%RODRIGO%'";
$resultIngresadaMovistar = mysqli_query($conexion, $queryIngresadaMovistar);
$totalIngresadaMovistar = mysqli_fetch_assoc($resultIngresadaMovistar)['total'];

$queryRegistroNoLlame = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa = 'REGISTRO NO LLAME' AND equipo LIKE '%RODRIGO%'";
$resultRegistroNollame = mysqli_query($conexion, $queryRegistroNoLlame);
$totalRegistroNollame = mysqli_fetch_assoc($resultRegistroNollame)['total'];


$queryScore80 = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND estadoventa = 'SCORE 80' AND equipo LIKE '%RODRIGO%'";
$resultScore80 = mysqli_query($conexion, $queryScore80);
$totalScore80 = mysqli_fetch_assoc($resultScore80)['total'];

//Consultas nuevas con todos los estados existentes


///////////////////////////////Cálculo para porcentaje del día
date_default_timezone_set('America/Argentina/Mendoza');

$Date = date('Y-m-d');
//Acá colocar consulta anteriores pero con filtro de diarios
$queryTotalDia = "SELECT COUNT(*) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND fechacarga = '$Date' AND equipo LIKE '%RODRIGO%'";
$resultTtotalDia = mysqli_query($conexion, $queryTotalDia);
$totalDia = mysqli_fetch_assoc($resultTtotalDia)['total'];

// Obtener el total de ventas cargadas
$queryPostVenta2 = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa = 'POST VENTA' AND fechacarga = '$Date' AND equipo LIKE '%RODRIGO%'";
$resultPostVenta2 = mysqli_query($conexion, $queryPostVenta2);
$totalIngresoPostVenta2 = mysqli_fetch_assoc($resultPostVenta2)['total'];

// Obtener el total de ventas cargadas
$queryRechazoABD2 = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa = 'RECHAZO ABD' AND fechacarga = '$Date' AND equipo LIKE '%RODRIGO%'";
$resultRechazoABD2 = mysqli_query($conexion, $queryRechazoABD2);
$totalRechazoABD2 = mysqli_fetch_assoc($resultRechazoABD2)['total'];

// Obtener el total de ventas cargadas
$queryCancelada2 = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa LIKE '%CANCELADA%' AND fechacarga = '$Date' AND equipo LIKE '%RODRIGO%'";
$resultCancelada2 = mysqli_query($conexion, $queryCancelada2);
$totalSolicitudesCanceladas2 = mysqli_fetch_assoc($resultCancelada2)['total'];

// Obtener el total de ventas cargadas
$queryDevuelta2 = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa = 'DEVUELTA' AND fechacarga = '$Date' AND equipo LIKE '%RODRIGO%'";
$resultDevuelta2 = mysqli_query($conexion, $queryDevuelta2);
$totalDevuelta2 = mysqli_fetch_assoc($resultDevuelta2)['total'];

// Obtener el total de ventas cargadas
$queryPendienteDeVerificacion2 = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa = 'PENDIENTE DE VERIFICACION' AND fechacarga = '$Date' AND equipo LIKE '%RODRIGO%'";
$resultPendienteDeVerificacion2 = mysqli_query($conexion, $queryPendienteDeVerificacion2);
$totalPendienteDeVerificacion2 = mysqli_fetch_assoc($resultPendienteDeVerificacion2)['total'];

// Obtener el total de ventas cargadas
$queryPendienteCargaDama2 = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa = 'PENDIENTE CARGA DAMA' AND fechacarga = '$Date' AND equipo LIKE '%RODRIGO%'";
$resultPendienteCargaDama2 = mysqli_query($conexion, $queryPendienteCargaDama2);
$totalPendienteCargaDama2 = mysqli_fetch_assoc($resultPendienteCargaDama2)['total'];

// Obtener el total de ventas cargadas
$queryPendienteAuditoria2 = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa = 'PENDIENTE AUDITORIA' AND fechacarga = '$Date' AND equipo LIKE '%RODRIGO%'";
$resultPendienteAuditoria2 = mysqli_query($conexion, $queryPendienteAuditoria2);
$totalPendienteDeAuditoria2 = mysqli_fetch_assoc($resultPendienteAuditoria2)['total'];

// Obtener el total de ventas cargadas
$queryInformadaTasa2 = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa = 'INFORMADA TASA' AND fechacarga = '$Date' AND equipo LIKE '%RODRIGO%'";
$resultInformadaTasa2 = mysqli_query($conexion, $queryInformadaTasa2);
$totalInformadaTasa2 = mysqli_fetch_assoc($resultInformadaTasa2)['total'];

// Obtener el total de ventas cargadas
$queryPendienteCargaTasa2 = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa = 'PENDIENTE CARGA TASA' AND fechacarga = '$Date' AND equipo LIKE '%ASM%'";
$resultPendienteCargaTasa2 = mysqli_query($conexion, $queryPendienteCargaTasa2);
$totalPendienteCargaTasa2 = mysqli_fetch_assoc($resultPendienteCargaTasa2)['total'];

// Obtener el total de ventas cargadas
$queryIngresadaTasa2 = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa = 'INGRESADA TASA' AND fechacarga = '$Date' AND equipo LIKE '%RODRIGO%'";
$resultIngresadaTasa2 = mysqli_query($conexion, $queryIngresadaTasa2);
$totalIngresadaTasa2 = mysqli_fetch_assoc($resultIngresadaTasa2)['total'];

// Obtener el total de ventas cargadas
$queryEnTransito2 = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa = 'EN TRANSITO' AND fechacarga = '$Date' AND equipo LIKE '%RODRIGO%'";
$resultEnTransito2 = mysqli_query($conexion, $queryEnTransito2);
$totalEnTransito2 = mysqli_fetch_assoc($resultEnTransito2)['total'];

// Obtener el total de ventas cargadas
$queryEnProcesoDigipTn2 = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa = 'EN PROCESO DIGIP-TN' AND fechacarga = '$Date' AND equipo LIKE '%RODRIGO%'";
$resultEnProcesoDigipTn2 = mysqli_query($conexion, $queryEnProcesoDigipTn2);
$totalEnProcesoDigipTn2 = mysqli_fetch_assoc($resultEnProcesoDigipTn2)['total'];

// Obtener el total de ventas cargadas
$queryDiferidaCargaTasa2 = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa = 'DIFERIDA CARGA TASA' AND fechacarga = '$Date' AND equipo LIKE '%RODRIGO%'";
$resultDiferidaCargaTasa2 = mysqli_query($conexion, $queryDiferidaCargaTasa2);
$totalDiferidaCargaTasa2 = mysqli_fetch_assoc($resultDiferidaCargaTasa2)['total'];

// Obtener el total de ventas cargadas
$queryDevueltaXVerificacion2 = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa = 'DEVUELTA X VERIFICACION' AND fechacarga = '$Date' AND equipo LIKE '%RODRIGO%'";
$resultDevueltaXVerificacion2 = mysqli_query($conexion, $queryDevueltaXVerificacion2);
$totalDevueltaXVerificacion2 = mysqli_fetch_assoc($resultDevueltaXVerificacion2)['total'];

// Obtener el total de ventas cargadas
$queryDevueltaXAuditoria2 = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa = 'DEVUELTA X AUDITORIA' AND fechacarga = '$Date' AND equipo LIKE '%RODRIGO%'";
$resultDevueltaXAuditoria2 = mysqli_query($conexion, $queryDevueltaXAuditoria2);
$totalDevueltaXAuditoria2 = mysqli_fetch_assoc($resultDevueltaXAuditoria2)['total'];

// Obtener el total de ventas cargadas
$queryDevueltaCargaTasa2 = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa = 'DEVUELTA CARGA TASA' AND fechacarga = '$Date' AND equipo LIKE '%RODRIGO%'";
$resultDevueltaCargaTasa2 = mysqli_query($conexion, $queryDevueltaCargaTasa2);
$totalDevueltaCargaTasa2 = mysqli_fetch_assoc($resultDevueltaCargaTasa2)['total'];

// Obtener el total de ventas cargadas
$queryDiferidaAuditoria2 = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa = 'DIFERIDA AUDITORIA' AND fechacarga = '$Date' AND equipo LIKE '%RODRIGO%'";
$resultDiferidaAuditoria2 = mysqli_query($conexion, $queryDiferidaAuditoria2);
$totalDiferidaAuditoria2 = mysqli_fetch_assoc($resultDiferidaAuditoria2)['total'];

// Obtener el total de ventas cargadas
$querySolicitudCumplida2 = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa LIKE '%CUMPLIDA%' AND fechacarga = '$Date' AND equipo LIKE '%RODRIGO%'";
$resultSolicitudCumplida2 = mysqli_query($conexion, $querySolicitudCumplida2);
$totalSolicitudCumplida2 = mysqli_fetch_assoc($resultSolicitudCumplida2)['total'];

// Obtener el total de ventas cargadas
$queryDevueltaPorVendedor2 = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa = 'DEVUELTA X VENDEDOR' AND fechacarga = '$Date' AND equipo LIKE '%RODRIGO%'";
$resultDevueltaPorVendedor2 = mysqli_query($conexion, $queryDevueltaPorVendedor2);
$totalDevueltaPorVendedor2 = mysqli_fetch_assoc($resultDevueltaPorVendedor2)['total'];

// Obtener el total de ventas cargadas
$queryDevueltaTasa2 = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa = 'DEVUELTA TASA' AND fechacarga = '$Date' AND equipo LIKE '%RODRIGO%'";
$resultDevueltaTasa2 = mysqli_query($conexion, $queryDevueltaTasa2);
$totalDevueltaTasa2 = mysqli_fetch_assoc($resultDevueltaTasa2)['total'];

// Obtener el total de ventas cargadas
$querySolicitudCancelada2 = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa LIKE '%CANCELADA%' AND fechacarga = '$Date' AND equipo LIKE '%RODRIGO%'";
$resultSolicitudCancelada2 = mysqli_query($conexion, $querySolicitudCancelada2);
$totalSolicitudCancelada2 = mysqli_fetch_assoc($resultSolicitudCancelada2)['total'];

// Obtener el total de ventas cargadas
$queryPendienteCargaMovistar2 = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa = 'PENDIENTE CARGA MOVISTAR' AND fechacarga = '$Date' AND equipo LIKE '%RODRIGO%'";
$resultPendienteCargaMovistar2 = mysqli_query($conexion, $queryPendienteCargaMovistar2);
$totalPendienteCargaMovistar2 = mysqli_fetch_assoc($resultPendienteCargaMovistar2)['total'];


$queryDiferidaCargaMovistar2 = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa = 'DIFERIDA CARGA MOVISTAR' AND fechacarga = '$Date' AND equipo LIKE '%RODRIGO%'";
$resultDiferidaCargaMovistar2 = mysqli_query($conexion, $queryDiferidaCargaMovistar2);
$totalDiferidaCargaMovistar2 = mysqli_fetch_assoc($resultDiferidaCargaMovistar2)['total'];


$queryPendienteCargaIris2 = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa = 'PENDIENTE CARGA IRIS' AND fechacarga = '$Date' AND equipo LIKE '%RODRIGO%'";
$resultPendienteCargaIris2 = mysqli_query($conexion, $queryPendienteCargaIris2);
$totalPendienteCargaIris2 = mysqli_fetch_assoc($resultPendienteCargaIris2)['total'];

$queryDevueltaCargaMovistar2 = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa = 'DEVUELTA CARGA MOVISTAR' AND fechacarga = '$Date' AND equipo LIKE '%RODRIGO%'";
$resultDevueltaCargaMovistar2 = mysqli_query($conexion, $queryDevueltaCargaMovistar2);
$totalDevueltaCargaMovistar2 = mysqli_fetch_assoc($resultDevueltaCargaMovistar2)['total'];


$queryIngresadaMovistar2 = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa = 'INGRESADA MOVISTAR' AND fechacarga = '$Date' AND equipo LIKE '%RODRIGO%'";
$resultIngresadaMovistar2 = mysqli_query($conexion, $queryIngresadaMovistar2);
$totalIngresadaMovistar2 = mysqli_fetch_assoc($resultIngresadaMovistar2)['total'];


$queryRegistroNoLlame2 = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa = 'REGISTRO NO LLAME' AND fechacarga = '$Date' AND equipo LIKE '%RODRIGO%'";
$resultRegistroNoLlame2 = mysqli_query($conexion, $queryRegistroNoLlame2);
$totalRegistroNoLlame2 = mysqli_fetch_assoc($resultRegistroNoLlame2)['total'];


$queryScore80Dia = "SELECT COUNT(*) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND estadoventa = 'SCORE 80' AND fechacarga = '$Date' AND equipo LIKE '%RODRIGO%'";
$resultScore80Dia = mysqli_query($conexion, $queryScore80Dia);
$totalScore80Dia = mysqli_fetch_assoc($resultScore80Dia)['total'];



///=====================================================================================================================================================================================//

//Consultas nuevas con todos los estados existentes

$queryTotalMesASM = "SELECT COUNT(*) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND equipo LIKE '%ASM%'";
$resultTotalMesASM = mysqli_query($conexion, $queryTotalMesASM);
$TotalMesASM = mysqli_fetch_assoc($resultTotalMesASM)['total'];


// Obtener el total de ventas cargadas
$queryPostVentaASM = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND estadoventa = 'POST VENTA' AND equipo LIKE '%ASM%'";
$resultPostVentaASM = mysqli_query($conexion, $queryPostVentaASM);
$totalIngresoPostVentaASM = mysqli_fetch_assoc($resultPostVentaASM)['total'];

// Obtener el total de ventas cargadas
$queryRechazoABDASM = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND estadoventa = 'RECHAZO ABD' AND equipo LIKE '%ASM%'";
$resultRechazoABDASM = mysqli_query($conexion, $queryRechazoABDASM);
$totalRechazoABDASM = mysqli_fetch_assoc($resultRechazoABDASM)['total'];

// Obtener el total de ventas cargadas
$queryCanceladaASM = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND estadoventa LIKE '%CANCELADA%' AND equipo LIKE '%ASM%'";
$resultCanceladaASM = mysqli_query($conexion, $queryCanceladaASM);
$totalSolicitudesCanceladasASM = mysqli_fetch_assoc($resultCanceladaASM)['total'];

// Obtener el total de ventas cargadas
$queryDevueltaASM = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND estadoventa = 'DEVUELTA' AND equipo LIKE '%ASM%'";
$resultDevueltaASM = mysqli_query($conexion, $queryDevueltaASM);
$totalDevueltaASM = mysqli_fetch_assoc($resultDevueltaASM)['total'];

// Obtener el total de ventas cargadas
$queryPendienteDeVerificacionASM = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND estadoventa = 'PENDIENTE DE VERIFICACION' AND equipo LIKE '%ASM%'";
$resultPendienteDeVerificacionASM = mysqli_query($conexion, $queryPendienteDeVerificacionASM);
$totalPendienteDeVerificacionASM = mysqli_fetch_assoc($resultPendienteDeVerificacionASM)['total'];

// Obtener el total de ventas cargadas
$queryPendienteCargaDamaASM = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND estadoventa = 'PENDIENTE CARGA DAMA' AND equipo LIKE '%ASM%'";
$resultPendienteCargaDamaASM = mysqli_query($conexion, $queryPendienteCargaDamaASM);
$totalPendienteCargaDamaASM = mysqli_fetch_assoc($resultPendienteCargaDamaASM)['total'];

// Obtener el total de ventas cargadas
$queryPendienteAuditoriaASM = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND estadoventa = 'PENDIENTE AUDITORIA' AND equipo LIKE '%ASM%'";
$resultPendienteAuditoriaASM = mysqli_query($conexion, $queryPendienteAuditoriaASM);
$totalPendienteDeAuditoriaASM = mysqli_fetch_assoc($resultPendienteAuditoriaASM)['total'];

// Obtener el total de ventas cargadas
$queryInformadaTasaASM = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND estadoventa = 'INFORMADA TASA' AND equipo LIKE '%ASM%'";
$resultInformadaTasaASM = mysqli_query($conexion, $queryInformadaTasaASM);
$totalInformadaTasaASM = mysqli_fetch_assoc($resultInformadaTasaASM)['total'];

// Obtener el total de ventas cargadas
$queryPendienteCargaTasaASM = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa = 'PENDIENTE CARGA TASA' AND equipo LIKE '%ASM%'";
$resultPendienteCargaTasaASM = mysqli_query($conexion, $queryPendienteCargaTasaASM);
$totalPendienteCargaTasaASM = mysqli_fetch_assoc($resultPendienteCargaTasaASM)['total'];


// Obtener el total de ventas cargadas
$queryDiferidaCargaTasaASM = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa = 'DIFERIDA CARGA TASA' AND equipo LIKE '%ASM%'";
$resultDiferidaCargaTasaASM = mysqli_query($conexion, $queryDiferidaCargaTasaASM);
$totalDiferidaCargaTasaASM = mysqli_fetch_assoc($resultDiferidaCargaTasaASM)['total'];

// Obtener el total de ventas cargadas
$queryIngresadaTasaASM = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa = 'INGRESADA TASA' AND equipo LIKE '%ASM%'";
$resultIngresadaTasaASM = mysqli_query($conexion, $queryIngresadaTasaASM);
$totalIngresadaTasaASM = mysqli_fetch_assoc($resultIngresadaTasaASM)['total'];

// Obtener el total de ventas cargadas
$queryEnTransitoASM = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa = 'EN TRANSITO' AND equipo LIKE '%ASM%'";
$resultEnTransitoASM = mysqli_query($conexion, $queryEnTransitoASM);
$totalEnTransitoASM = mysqli_fetch_assoc($resultEnTransitoASM)['total'];

// Obtener el total de ventas cargadas
$queryEnProcesoDigipTnASM = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa = 'EN PROCESO DIGIP-TN' AND equipo LIKE '%ASM%'";
$resultEnProcesoDigipTnASM = mysqli_query($conexion, $queryEnProcesoDigipTnASM);
$totalEnProcesoDigipTnASM = mysqli_fetch_assoc($resultEnProcesoDigipTnASM)['total'];

// Obtener el total de ventas cargadas
$queryDevueltaXVerificacionASM = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa = 'DEVUELTA X VERIFICACION' AND equipo LIKE '%ASM%'";
$resultDevueltaXVerificacionASM = mysqli_query($conexion, $queryDevueltaXVerificacionASM);
$totalDevueltaXVerificacionASM = mysqli_fetch_assoc($resultDevueltaXVerificacionASM)['total'];

// Obtener el total de ventas cargadas
$queryDevueltaXAuditoriaASM = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa = 'DEVUELTA X AUDITORIA' AND equipo LIKE '%ASM%'";
$resultDevueltaXAuditoriaASM = mysqli_query($conexion, $queryDevueltaXAuditoriaASM);
$totalDevueltaXAuditoriaASM = mysqli_fetch_assoc($resultDevueltaXAuditoriaASM)['total'];

// Obtener el total de ventas cargadas
$queryDevueltaCargaTasaASM = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa = 'DEVUELTA CARGA TASA' AND equipo LIKE '%ASM%'";
$resultDevueltaCargaTasaASM = mysqli_query($conexion, $queryDevueltaCargaTasaASM);
$totalDevueltaCargaTasaASM = mysqli_fetch_assoc($resultDevueltaCargaTasaASM)['total'];

// Obtener el total de ventas cargadas
$queryDiferidaAuditoriaASM = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa = 'DIFERIDA AUDITORIA' AND equipo LIKE '%ASM%'";
$resultDiferidaAuditoriaASM = mysqli_query($conexion, $queryDiferidaAuditoriaASM);
$totalDiferidaAuditoriaASM = mysqli_fetch_assoc($resultDiferidaAuditoriaASM)['total'];

// Obtener el total de ventas cargadas
$querySolicitudCumplidaASM = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa LIKE '%CUMPLIDA%' AND equipo LIKE '%ASM%'";
$resultSolicitudCumplidaASM = mysqli_query($conexion, $querySolicitudCumplidaASM);
$totalSolicitudCumplidaASM = mysqli_fetch_assoc($resultSolicitudCumplidaASM)['total'];

// Obtener el total de ventas cargadas
$queryDevueltaPorVendedorASM = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa = 'DEVUELTA X VENDEDOR' AND equipo LIKE '%ASM%'";
$resultDevueltaPorVendedorASM = mysqli_query($conexion, $queryDevueltaPorVendedorASM);
$totalDevueltaPorVendedorASM = mysqli_fetch_assoc($resultDevueltaPorVendedorASM)['total'];

// Obtener el total de ventas cargadas
$queryDevueltaTasaASM = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa = 'DEVUELTA TASA' AND equipo LIKE '%ASM%'";
$resultDevueltaTasaASM = mysqli_query($conexion, $queryDevueltaTasaASM);
$totalDevueltaTasaASM = mysqli_fetch_assoc($resultDevueltaTasaASM)['total'];

// Obtener el total de ventas cargadas
$querySolicitudCanceladaASM = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa LIKE '%CANCELADA%' AND equipo LIKE '%ASM%'";
$resultSolicitudCanceladaASM = mysqli_query($conexion, $querySolicitudCanceladaASM);
$totalSolicitudCanceladaASM = mysqli_fetch_assoc($resultSolicitudCanceladaASM)['total'];

// Obtener el total de ventas cargadas
$queryPendienteCargaMovistarASM = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa = 'PENDIENTE CARGA MOVISTAR' AND equipo LIKE '%ASM%'";
$resultPendienteCargaMovistarASM = mysqli_query($conexion, $queryPendienteCargaMovistarASM);
$totalPendienteCargaMovistarASM = mysqli_fetch_assoc($resultPendienteCargaMovistarASM)['total'];


$queryDiferidaCargaMovistarASM = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa = 'DIFERIDA CARGA MOVISTAR' AND equipo LIKE '%ASM%'";
$resultDiferidaCargaMovistarASM = mysqli_query($conexion, $queryDiferidaCargaMovistarASM);
$totalDiferidaCargaMovistarASM = mysqli_fetch_assoc($resultDiferidaCargaMovistarASM)['total'];


$queryPendienteCargaIrisASM = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa = 'PENDIENTE CARGA IRIS' AND equipo LIKE '%ASM%'";
$resultPendienteCargaIrisASM = mysqli_query($conexion, $queryPendienteCargaIrisASM);
$totalPendienteCargaIrisASM = mysqli_fetch_assoc($resultPendienteCargaIrisASM)['total'];


$queryDevueltaCargaMovistarASM = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa = 'DEVUELTA CARGA MOVISTAR' AND equipo LIKE '%ASM%'";
$resultDevueltaCargaMovistarASM = mysqli_query($conexion, $queryDevueltaCargaMovistarASM);
$totalDevueltaCargaMovistarASM = mysqli_fetch_assoc($resultDevueltaCargaMovistarASM)['total'];


$queryIngresadaMovistarASM = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa = 'INGRESADA MOVISTAR' AND equipo LIKE '%ASM%'";
$resultIngresadaMovistarASM = mysqli_query($conexion, $queryIngresadaMovistarASM);
$totalIngresadaMovistarASM = mysqli_fetch_assoc($resultIngresadaMovistarASM)['total'];


$queryRegistroNoLlameASM = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa = 'REGISTRO NO LLAME' AND equipo LIKE '%ASM%'";
$resultRegistroNoLlameASM = mysqli_query($conexion, $queryRegistroNoLlameASM);
$totalRegistroNoLlameASM = mysqli_fetch_assoc($resultRegistroNoLlameASM)['total'];


$queryTotalScore80ASM = "SELECT COUNT(*) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND equipo LIKE '%ASM%' AND estadoventa = 'SCORE 80'";
$resultTotalScore80ASM = mysqli_query($conexion, $queryTotalScore80ASM);
$TotalMesScore80ASM = mysqli_fetch_assoc($resultTotalScore80ASM)['total'];

//Consultas nuevas con todos los estados existentes


///////////////////////////////Cálculo para porcentaje del día
date_default_timezone_set('America/Argentina/Mendoza');

$Date = date('Y-m-d');
//Acá colocar consulta anteriores pero con filtro de diarios
$queryTotalDiaASM = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND fechacarga = '$Date' AND equipo LIKE '%ASM%'";
$resultTtotalDiaASM = mysqli_query($conexion, $queryTotalDiaASM);
$totalDiaASM = mysqli_fetch_assoc($resultTtotalDiaASM)['total'];

// Obtener el total de ventas cargadas
$queryPostVenta2ASM = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa = 'POST VENTA' AND fechacarga = '$Date' AND equipo LIKE '%ASM%'";
$resultPostVenta2ASM = mysqli_query($conexion, $queryPostVenta2ASM);
$totalIngresoPostVenta2ASM = mysqli_fetch_assoc($resultPostVenta2ASM)['total'];

// Obtener el total de ventas cargadas
$queryRechazoABD2ASM = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa = 'RECHAZO ABD' AND fechacarga = '$Date' AND equipo LIKE '%ASM%'";
$resultRechazoABD2ASM = mysqli_query($conexion, $queryRechazoABD2ASM);
$totalRechazoABD2ASM = mysqli_fetch_assoc($resultRechazoABD2ASM)['total'];

// Obtener el total de ventas cargadas
$queryCancelada2ASM = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa LIKE '%CANCELADA%' AND fechacarga = '$Date' AND equipo LIKE '%ASM%'";
$resultCancelada2ASM = mysqli_query($conexion, $queryCancelada2ASM);
$totalSolicitudesCanceladas2 = mysqli_fetch_assoc($resultCancelada2ASM)['total'];

// Obtener el total de ventas cargadas
$queryDevuelta2ASM = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa = 'DEVUELTA' AND fechacarga = '$Date' AND equipo LIKE '%ASM%'";
$resultDevuelta2ASM = mysqli_query($conexion, $queryDevuelta2ASM);
$totalDevuelta2ASM= mysqli_fetch_assoc($resultDevuelta2ASM)['total'];

// Obtener el total de ventas cargadas
$queryPendienteDeVerificacion2ASM = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa = 'PENDIENTE DE VERIFICACION' AND fechacarga = '$Date' AND equipo LIKE '%ASM%'";
$resultPendienteDeVerificacion2ASM = mysqli_query($conexion, $queryPendienteDeVerificacion2ASM);
$totalPendienteDeVerificacion2ASM = mysqli_fetch_assoc($resultPendienteDeVerificacion2ASM)['total'];


// Obtener el total de ventas cargadas
$queryPendienteCargaDama2ASM = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa = 'PENDIENTE CARGA DAMA' AND fechacarga = '$Date' AND equipo LIKE '%ASM%'";
$resultPendienteCargaDama2ASM = mysqli_query($conexion, $queryPendienteCargaDama2ASM);
$totalPendienteCargaDama2ASM = mysqli_fetch_assoc($resultPendienteCargaDama2ASM)['total'];

// Obtener el total de ventas cargadas
$queryPendienteAuditoria2ASM = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa = 'PENDIENTE AUDITORIA' AND fechacarga = '$Date' AND equipo LIKE '%ASM%'";
$resultPendienteAuditoria2ASM = mysqli_query($conexion, $queryPendienteAuditoria2ASM);
$totalPendienteDeAuditoria2ASM = mysqli_fetch_assoc($resultPendienteAuditoria2ASM)['total'];

// Obtener el total de ventas cargadas
$queryInformadaTasa2ASM = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa = 'INFORMADA TASA' AND fechacarga = '$Date' AND equipo LIKE '%ASM%'";
$resultInformadaTasa2ASM = mysqli_query($conexion, $queryInformadaTasa2ASM);
$totalInformadaTasa2ASM = mysqli_fetch_assoc($resultInformadaTasa2ASM)['total'];

// Obtener el total de ventas cargadas
$queryPendienteCargaTasa2ASM = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa = 'PENDIENTE CARGA TASA' AND fechacarga = '$Date' AND equipo LIKE '%ASM%'";
$resultPendienteCargaTasa2ASM = mysqli_query($conexion, $queryPendienteCargaTasa2ASM);
$totalPendienteCargaTasa2ASM = mysqli_fetch_assoc($resultPendienteCargaTasa2ASM)['total'];

// Obtener el total de ventas cargadas
$queryIngresadaTasa2ASM = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa = 'INGRESADA TASA' AND fechacarga = '$Date' AND equipo LIKE '%ASM%'";
$resultIngresadaTasa2ASM = mysqli_query($conexion, $queryIngresadaTasa2ASM);
$totalIngresadaTasa2ASM = mysqli_fetch_assoc($resultIngresadaTasa2ASM)['total'];

// Obtener el total de ventas cargadas
$queryEnTransito2ASM = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa = 'EN TRANSITO' AND fechacarga = '$Date' AND equipo LIKE '%ASM%'";
$resultEnTransito2ASM = mysqli_query($conexion, $queryEnTransito2ASM);
$totalEnTransito2ASM = mysqli_fetch_assoc($resultEnTransito2ASM)['total'];

// Obtener el total de ventas cargadas
$queryEnProcesoDigipTn2ASM = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa = 'EN PROCESO DIGIP-TN' AND fechacarga = '$Date' AND equipo LIKE '%ASM%'";
$resultEnProcesoDigipTn2ASM = mysqli_query($conexion, $queryEnProcesoDigipTn2ASM);
$totalEnProcesoDigipTn2ASM = mysqli_fetch_assoc($resultEnProcesoDigipTn2ASM)['total'];

// Obtener el total de ventas cargadas
$queryDiferidaCargaTasa2ASM = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa = 'DIFERIDA CARGA TASA' AND fechacarga = '$Date' AND equipo LIKE '%ASM%'";
$resultDiferidaCargaTasa2ASM = mysqli_query($conexion, $queryDiferidaCargaTasa2ASM);
$totalDiferidaCargaTasa2ASM = mysqli_fetch_assoc($resultDiferidaCargaTasa2ASM)['total'];

// Obtener el total de ventas cargadas
$queryDevueltaXVerificacion2ASM = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa = 'DEVUELTA X VERIFICACION' AND fechacarga = '$Date' AND equipo LIKE '%ASM%'";
$resultDevueltaXVerificacion2ASM = mysqli_query($conexion, $queryDevueltaXVerificacion2ASM);
$totalDevueltaXVerificacion2ASM = mysqli_fetch_assoc($resultDevueltaXVerificacion2ASM)['total'];

// Obtener el total de ventas cargadas
$queryDevueltaXAuditoria2ASM = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa = 'DEVUELTA X AUDITORIA' AND fechacarga = '$Date' AND equipo LIKE '%ASM%'";
$resultDevueltaXAuditoria2ASM = mysqli_query($conexion, $queryDevueltaXAuditoria2ASM);
$totalDevueltaXAuditoria2ASM = mysqli_fetch_assoc($resultDevueltaXAuditoria2ASM)['total'];

// Obtener el total de ventas cargadas
$queryDevueltaCargaTasa2ASM = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa = 'DEVUELTA CARGA TASA' AND fechacarga = '$Date' AND equipo LIKE '%ASM%'";
$resultDevueltaCargaTasa2ASM = mysqli_query($conexion, $queryDevueltaCargaTasa2ASM);
$totalDevueltaCargaTasa2ASM = mysqli_fetch_assoc($resultDevueltaCargaTasa2ASM)['total'];

// Obtener el total de ventas cargadas
$queryDiferidaAuditoria2ASM = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa = 'DIFERIDA AUDITORIA' AND fechacarga = '$Date' AND equipo LIKE '%ASM%'";
$resultDiferidaAuditoria2ASM = mysqli_query($conexion, $queryDiferidaAuditoria2ASM);
$totalDiferidaAuditoria2ASM = mysqli_fetch_assoc($resultDiferidaAuditoria2ASM)['total'];

// Obtener el total de ventas cargadas
$querySolicitudCumplida2ASM = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa LIKE '%CUMPLIDA%' AND fechacarga = '$Date' AND equipo LIKE '%ASM%'";
$resultSolicitudCumplida2ASM = mysqli_query($conexion, $querySolicitudCumplida2ASM);
$totalSolicitudCumplida2ASM = mysqli_fetch_assoc($resultSolicitudCumplida2ASM)['total'];

// Obtener el total de ventas cargadas
$queryDevueltaPorVendedor2ASM = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa = 'DEVUELTA X VENDEDOR' AND fechacarga = '$Date' AND equipo LIKE '%ASM%'";
$resultDevueltaPorVendedor2ASM = mysqli_query($conexion, $queryDevueltaPorVendedor2ASM);
$totalDevueltaPorVendedor2ASM = mysqli_fetch_assoc($resultDevueltaPorVendedor2ASM)['total'];

// Obtener el total de ventas cargadas
$queryDevueltaTasa2ASM = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa = 'DEVUELTA TASA' AND fechacarga = '$Date' AND equipo LIKE '%ASM%'";
$resultDevueltaTasa2ASM = mysqli_query($conexion, $queryDevueltaTasa2ASM);
$totalDevueltaTasa2ASM = mysqli_fetch_assoc($resultDevueltaTasa2ASM)['total'];

// Obtener el total de ventas cargadas
$querySolicitudCancelada2ASM = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa LIKE '%CANCELADA%' AND fechacarga = '$Date' AND equipo LIKE '%ASM%'";
$resultSolicitudCancelada2ASM = mysqli_query($conexion, $querySolicitudCancelada2ASM);
$totalSolicitudCancelada2ASM = mysqli_fetch_assoc($resultSolicitudCancelada2ASM)['total'];

// Obtener el total de ventas cargadas
$queryPendienteCargaMovistar2ASM = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa = 'PENDIENTE CARGA MOVISTAR' AND fechacarga = '$Date' AND equipo LIKE '%ASM%'";
$resultPendienteCargaMovistar2ASM = mysqli_query($conexion, $queryPendienteCargaMovistar2ASM);
$totalPendienteCargaMovistar2ASM = mysqli_fetch_assoc($resultPendienteCargaMovistar2ASM)['total'];


$queryDiferidaCargaMovistar2ASM = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa = 'DIFERIDA CARGA MOVISTAR' AND fechacarga = '$Date' AND equipo LIKE '%ASM%'";
$resultDiferidaCargaMovistar2ASM = mysqli_query($conexion, $queryDiferidaCargaMovistar2ASM);
$totalDiferidaCargaMovistar2ASM = mysqli_fetch_assoc($resultDiferidaCargaMovistar2ASM)['total'];

$queryPendienteCargaIris2ASM = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa = 'PENDIENTE CARGA IRIS' AND fechacarga = '$Date' AND equipo LIKE '%ASM%'";
$resultPendienteCargaIris2ASM = mysqli_query($conexion, $queryPendienteCargaIris2ASM);
$totalPendienteCargaIris2ASM = mysqli_fetch_assoc($resultPendienteCargaIris2ASM)['total'];


$queryDevueltaCargaMovistar2ASM = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa = 'DEVUELTA CARGA MOVISTAR' AND fechacarga = '$Date' AND equipo LIKE '%ASM%'";
$resultDevueltaCargaMovistar2ASM = mysqli_query($conexion, $queryDevueltaCargaMovistar2ASM);
$totalDevueltaCargaMovistar2ASM = mysqli_fetch_assoc($resultDevueltaCargaMovistar2ASM)['total'];


$queryIngresadaMovistar2ASM = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa = 'INGRESADA MOVISTAR' AND fechacarga = '$Date' AND equipo LIKE '%ASM%'";
$resultIngresadaMovistar2ASM = mysqli_query($conexion, $queryIngresadaMovistar2ASM);
$totalIngresadaMovistar2ASM = mysqli_fetch_assoc($resultIngresadaMovistar2ASM)['total'];

$queryRegistroNoLlame2ASM = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa = 'REGISTRO NO LLAME' AND fechacarga = '$Date' AND equipo LIKE '%ASM%'";
$resultRegistroNoLlame2ASM = mysqli_query($conexion, $queryRegistroNoLlame2ASM);
$totalRegistroNoLlame2ASM = mysqli_fetch_assoc($resultRegistroNoLlame2ASM)['total'];

$queryScore802ASM = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  estadoventa = 'SCORE 80' AND fechacarga = '$Date' AND equipo LIKE '%ASM%'";
$resultSocre802ASM = mysqli_query($conexion, $queryScore802ASM);
$totalScore80Dia2ASM = mysqli_fetch_assoc($resultSocre802ASM)['total'];

?>