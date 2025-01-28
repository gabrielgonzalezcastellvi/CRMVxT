<!DOCTYPE html>
<html lang="es">
<?php session_start(); ?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistema carga - VxT</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">
<?php
//Verificar si el usuario está autenticado, de lo contrario redirigirlo a la página de inicio de sesión

if (!isset($_SESSION['Nombre'])) {
    session_destroy();
    header("Location: login.php");
    exit;
}

// Registro de tiempo de la última actividad
$_SESSION['ultima_actividad'] = time();

// Tu código HTML/PHP aquí
?>
<script>
        // Función para redirigir al usuario a login.php después de 30 minutos de inactividad
        function verificarInactividad() {
            // Tiempo máximo de inactividad (en milisegundos) - 30 minutos
            var tiempoMaximoInactividad = 30 * 60 * 1000; // 30 minutos en milisegundos

            // Obtener el tiempo de la última actividad del usuario
            var ultimaActividad = <?php echo isset($_SESSION['ultima_actividad']) ? $_SESSION['ultima_actividad'] : 0; ?> * 1000; // Convertir a milisegundos

            // Calcular el tiempo transcurrido desde la última actividad
            var tiempoTranscurrido = new Date().getTime() - ultimaActividad;

            // Verificar si ha pasado el tiempo máximo de inactividad
            if (tiempoTranscurrido > tiempoMaximoInactividad) {
                // Redirigir al usuario a login.php
                window.location.href = 'login.php';
            }
        }

        // Verificar la inactividad del usuario cada minuto
        setInterval(verificarInactividad, 60000); // 1 minuto en milisegundos
 </script>
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                
                </div>
                <div class="mr-2 d-none d-lg-inline text-black-600 small"><?php echo 'Bienvenid@ '.$_SESSION['Nombre'];?></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

<?php  require 'menu.php';?>


            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <!-- <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Buscar por..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form> -->

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                  
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['Nombre'];?></span>
                                <?php 
                                require 'conexion.php';
                                $Query = "SELECT foto FROM usuarios WHERE correo = '".$_SESSION['Nombre']."' OR nombre = '".$_SESSION['Nombre']."'";
                                $Result = mysqli_query($conexion,$Query);
                                while($row = $Result -> fetch_assoc()){
                                    $Foto = $row['foto'];
                                }
                                ?>
                                <?php
                                if (!empty($Foto)) {
                                    echo '<img class="img-profile rounded-circle" src="./perfiles/' . $Foto . '">';
                                } else {
                                    echo '<img class="img-profile rounded-circle" src="./perfiles/Captura de pantalla 2024-05-22 213747.png">';
                                }
                                
                               
                                    ?>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Perfil
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Configuracion
                                </a>
                                <a class="dropdown-item" href="actividad_logueo.php">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Actividad de logueo
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="cerrar.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Cerrar Sesion
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                <?php $Query2 = "SELECT COUNT(DISTINCT documentocliente,linea,producto) FROM ventas";?>
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Panel general</h1>
                       <!--  <form method="post" action="pdf.php">
                        <input type="hidden" name="consulta" value="<?php echo base64_encode($Query2); ?>">
                        <input type="submit" value="Generar PDF de ventas" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                </form> -->
                                <form method="post" action="csv.php">
                        <input type="hidden" name="consulta" value="<?php echo base64_encode($Query2); ?>">
                        <input type="submit" value="Generar CSV de ventas" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                </form></div>
            
                    <!-- Content Row -->
                    <div class="row">
                
                    </div>

                    <!-- Content Row -->
                    <?php
                    
                        
require 'conexion.php';

$Queryvendedor = "SELECT DISTINCT(vendedor) as vendedor FROM ventas ORDER BY vendedor ASC";
                    $Result = mysqli_query($conexion,$Queryvendedor);
                    while($rowvendedor = $Result -> fetch_assoc()){
                       $vendedor = $rowvendedor['vendedor'];
                  
// Obtener el total de ventas cargadas
$queryPostVenta = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE estadoventa = 'POST VENTA' AND vendedor = '$vendedor'";
$resultPostVenta = mysqli_query($conexion, $queryPostVenta);
$totalIngresoPostVenta = mysqli_fetch_assoc($resultPostVenta)['total'];

// Obtener el total de ventas cargadas
$queryRechazoABD = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE estadoventa = 'RECHAZO ABD' AND vendedor = '$vendedor'";
$resultRechazoABD = mysqli_query($conexion, $queryRechazoABD);
$totalRechazoABD = mysqli_fetch_assoc($resultRechazoABD)['total'];

// Obtener el total de ventas cargadas
$queryCancelada = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE estadoventa LIKE '%CANCELADA%' AND vendedor = '$vendedor'";
$resultCancelada = mysqli_query($conexion, $queryCancelada);
$totalSolicitudesCanceladas = mysqli_fetch_assoc($resultCancelada)['total'];

// Obtener el total de ventas cargadas
$queryDevuelta = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE estadoventa = 'DEVUELTA' AND vendedor = '$vendedor'";
$resultDevuelta = mysqli_query($conexion, $queryDevuelta);
$totalDevuelta = mysqli_fetch_assoc($resultDevuelta)['total'];

// Obtener el total de ventas cargadas
$queryPendienteDeVerificacion = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE estadoventa = 'PENDIENTE DE VERIFICACION' AND vendedor = '$vendedor'";
$resultPendienteDeVerificacion = mysqli_query($conexion, $queryPendienteDeVerificacion);
$totalPendienteDeVerificacion = mysqli_fetch_assoc($resultPendienteDeVerificacion)['total'];

// Obtener el total de ventas cargadas
$queryPendienteAuditoria = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE estadoventa = 'PENDIENTE AUDTORIA' AND vendedor = '$vendedor'";
$resultPendienteAuditoria = mysqli_query($conexion, $queryPendienteAuditoria);
$totalPendienteDeAuditoria = mysqli_fetch_assoc($resultPendienteAuditoria)['total'];

// Obtener el total de ventas cargadas
$queryInformadaTasa = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE estadoventa = 'INFORMADA TASA' AND vendedor = '$vendedor'";
$resultInformadaTasa = mysqli_query($conexion, $queryInformadaTasa);
$totalInformadaTasa = mysqli_fetch_assoc($resultInformadaTasa)['total'];

// Obtener el total de ventas cargadas
$queryPendienteCargaTasa = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE estadoventa = 'PENDIENTE CARGA TASA' AND vendedor = '$vendedor'";
$resultPendienteCargaTasa = mysqli_query($conexion, $queryPendienteCargaTasa);
$totalPendienteCargaTasa = mysqli_fetch_assoc($resultPendienteCargaTasa)['total'];

// Obtener el total de ventas cargadas
$queryIngresadaTasa = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE estadoventa = 'INGRESADA TASA' AND vendedor = '$vendedor'";
$resultIngresadaTasa = mysqli_query($conexion, $queryIngresadaTasa);
$totalIngresadaTasa = mysqli_fetch_assoc($resultIngresadaTasa)['total'];

// Obtener el total de ventas cargadas
$queryEnTransito = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE estadoventa = 'EN TRANSITO' AND vendedor = '$vendedor'";
$resultEnTransito = mysqli_query($conexion, $queryEnTransito);
$totalEnTransito = mysqli_fetch_assoc($resultEnTransito)['total'];

// Obtener el total de ventas cargadas
$queryEnProcesoDigipTn = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE estadoventa = 'EN PROCESO DIGIP-TN' AND vendedor = '$vendedor'";
$resultEnProcesoDigipTn = mysqli_query($conexion, $queryEnProcesoDigipTn);
$totalEnProcesoDigipTn = mysqli_fetch_assoc($resultEnProcesoDigipTn)['total'];

// Obtener el total de ventas cargadas
$queryDiferisaCargaTasa = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE estadoventa = 'DIFERIDA CARGA TASA' AND vendedor = '$vendedor'";
$resultDiferidaCargaTasa = mysqli_query($conexion, $queryDiferisaCargaTasa);
$totalDiferidaCargaTasa = mysqli_fetch_assoc($resultDiferidaCargaTasa)['total'];

// Obtener el total de ventas cargadas
$queryDevueltaXVerificacion = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE estadoventa = 'DEVUELTA X VERIFICACION' AND vendedor = '$vendedor'";
$resultDevueltaXVerificacion = mysqli_query($conexion, $queryDevueltaXVerificacion);
$totalDevueltaXVerificacion = mysqli_fetch_assoc($resultDevueltaXVerificacion)['total'];

// Obtener el total de ventas cargadas
$queryDevueltaXAuditoria = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE estadoventa = 'DEVUELTA X AUDITORIA' AND vendedor = '$vendedor'";
$resultDevueltaXAuditoria = mysqli_query($conexion, $queryDevueltaXAuditoria);
$totalDevueltaXAuditoria = mysqli_fetch_assoc($resultDevueltaXAuditoria)['total'];

// Obtener el total de ventas cargadas
$queryDevueltaCargaTasa = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE estadoventa = 'DEVUELTA CARGA TASA' AND vendedor = '$vendedor'";
$resultDevueltaCargaTasa = mysqli_query($conexion, $queryDevueltaCargaTasa);
$totalDevueltaCargaTasa = mysqli_fetch_assoc($resultDevueltaCargaTasa)['total'];

// Obtener el total de ventas cargadas
$queryDiferidaAuditoria = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE estadoventa = 'DIFERIDA AUDITORIA' AND vendedor = '$vendedor'";
$resultDiferidaAuditoria = mysqli_query($conexion, $queryDiferidaAuditoria);
$totalDiferidaAuditoria = mysqli_fetch_assoc($resultDiferidaAuditoria)['total'];

// Obtener el total de ventas cargadas
$querySolicitudCumplida= "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE estadoventa LIKE '%CUMPLIDA%' AND vendedor = '$vendedor'";
$resultSolicitudCumplida = mysqli_query($conexion, $querySolicitudCumplida);
$totalSolicitudCumplida = mysqli_fetch_assoc($resultSolicitudCumplida)['total'];

// Obtener el total de ventas cargadas
$queryDevueltaPorVendedor = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE estadoventa = 'DEVUELTA POR VENDEDOR' AND vendedor = '$vendedor'";
$resultDevueltaPorVendedor = mysqli_query($conexion, $queryDevueltaPorVendedor);
$totalDevueltaPorVendedor = mysqli_fetch_assoc($resultDevueltaPorVendedor)['total'];

// Obtener el total de ventas cargadas
$queryDevueltaTasa = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE estadoventa = 'DEVUELTA TASA' AND vendedor = '$vendedor'";
$resultDevueltaTasa = mysqli_query($conexion, $queryDevueltaTasa);
$totalDevueltaTasa = mysqli_fetch_assoc($resultDevueltaTasa)['total'];

// Obtener el total de ventas cargadas
$querySolicitudCancelada = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE estadoventa LIKE '%CANCELADA%' AND vendedor = '$vendedor'";
$resultSolicitudCancelada = mysqli_query($conexion, $querySolicitudCancelada);
$totalSolicitudCancelada = mysqli_fetch_assoc($resultSolicitudCancelada)['total'];

// Obtener el total de ventas cargadas
$queryPendienteCargaMovistar = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE estadoventa = 'PENDIENTE CARGA MOVISTAR' AND vendedor = '$vendedor'";
$resultPendienteCargaMovistar = mysqli_query($conexion, $queryPendienteCargaMovistar);
$totalPendienteCargaMovistar = mysqli_fetch_assoc($resultPendienteCargaMovistar)['total'];

$queryDiferidaCargaMovistar = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE estadoventa = 'DIFERIDA CARGA MOVISTAR' AND vendedor = '$vendedor'";
$resultDiferidaCargaMovistar = mysqli_query($conexion, $queryDiferidaCargaMovistar);
$totalDiferidaCargaMovistar = mysqli_fetch_assoc($resultDiferidaCargaMovistar)['total'];

$queryPendienteCargaIris = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE estadoventa = 'PENDIENTE CARGA IRIS' AND vendedor = '$vendedor'";
$resultPendienteCargaIris = mysqli_query($conexion, $queryPendienteCargaIris);
$totalPendienteCargaIris = mysqli_fetch_assoc($resultPendienteCargaIris)['total'];

$queryDevueltaCargaMovistar = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE estadoventa = 'DEVUELTA CARGA MOVISTAR' AND vendedor = '$vendedor'";
$resultDevueltaCargaMovistar = mysqli_query($conexion, $queryDevueltaCargaMovistar);
$totalDevueltaCargaMovistar = mysqli_fetch_assoc($resultDevueltaCargaMovistar)['total'];

$queryIngresadaMovistar = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE estadoventa = 'INGRESADA MOVISTAR' AND vendedor = '$vendedor'";
$resultIngresadaMovistar = mysqli_query($conexion, $queryIngresadaMovistar);
$totalIngresadaMovistar = mysqli_fetch_assoc($resultIngresadaMovistar)['total'];

//Consultas nuevas con todos los estados existentes









///////////////////////////////Cálculo para porcentaje del día
date_default_timezone_set('America/Argentina/Mendoza');

$Date = date('Y-m-d');
//Acá colocar consulta anteriores pero con filtro de diarios
// Obtener el total de ventas cargadas
$queryPostVenta2 = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE estadoventa = 'POST VENTA' AND fechacarga = '$Date' AND vendedor = '$vendedor'";
$resultPostVenta2 = mysqli_query($conexion, $queryPostVenta2);
$totalIngresoPostVenta2 = mysqli_fetch_assoc($resultPostVenta2)['total'];

// Obtener el total de ventas cargadas
$queryRechazoABD2 = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE estadoventa = 'RECHAZO ABD' AND fechacarga = '$Date' AND vendedor = '$vendedor'";
$resultRechazoABD2 = mysqli_query($conexion, $queryRechazoABD2);
$totalRechazoABD2 = mysqli_fetch_assoc($resultRechazoABD2)['total'];

// Obtener el total de ventas cargadas
$queryCancelada2 = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE estadoventa LIKE '%CANCELADA%' AND fechacarga = '$Date' AND vendedor = '$vendedor'";
$resultCancelada2 = mysqli_query($conexion, $queryCancelada2);
$totalSolicitudesCanceladas2 = mysqli_fetch_assoc($resultCancelada2)['total'];

// Obtener el total de ventas cargadas
$queryDevuelta2 = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE estadoventa = 'DEVUELTA' AND fechacarga = '$Date' AND vendedor = '$vendedor'";
$resultDevuelta2 = mysqli_query($conexion, $queryDevuelta2);
$totalDevuelta2 = mysqli_fetch_assoc($resultDevuelta2)['total'];

// Obtener el total de ventas cargadas
$queryPendienteDeVerificacion2 = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE estadoventa = 'PENDIENTE DE VERIFICACION' AND fechacarga = '$Date' AND vendedor = '$vendedor'";
$resultPendienteDeVerificacion2 = mysqli_query($conexion, $queryPendienteDeVerificacion2);
$totalPendienteDeVerificacion2 = mysqli_fetch_assoc($resultPendienteDeVerificacion2)['total'];

// Obtener el total de ventas cargadas
$queryPendienteAuditoria2 = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE estadoventa = 'PENDIENTE AUDTORIA' AND fechacarga = '$Date' AND vendedor = '$vendedor'";
$resultPendienteAuditoria2 = mysqli_query($conexion, $queryPendienteAuditoria2);
$totalPendienteDeAuditoria2 = mysqli_fetch_assoc($resultPendienteAuditoria2)['total'];

// Obtener el total de ventas cargadas
$queryInformadaTasa2 = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE estadoventa = 'INFORMADA TASA' AND fechacarga = '$Date' AND vendedor = '$vendedor'";
$resultInformadaTasa2 = mysqli_query($conexion, $queryInformadaTasa2);
$totalInformadaTasa2 = mysqli_fetch_assoc($resultInformadaTasa2)['total'];

// Obtener el total de ventas cargadas
$queryPendienteCargaTasa2 = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE estadoventa = 'PENDIENTE CARGA TASA' AND fechacarga = '$Date' AND vendedor = '$vendedor'";
$resultPendienteCargaTasa2 = mysqli_query($conexion, $queryPendienteCargaTasa2);
$totalPendienteCargaTasa2 = mysqli_fetch_assoc($resultPendienteCargaTasa2)['total'];

// Obtener el total de ventas cargadas
$queryIngresadaTasa2 = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE estadoventa = 'INGRESADA TASA' AND fechacarga = '$Date' AND vendedor = '$vendedor'";
$resultIngresadaTasa2 = mysqli_query($conexion, $queryIngresadaTasa2);
$totalIngresadaTasa2 = mysqli_fetch_assoc($resultIngresadaTasa2)['total'];

// Obtener el total de ventas cargadas
$queryEnTransito2 = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE estadoventa = 'EN TRANSITO' AND fechacarga = '$Date' AND vendedor = '$vendedor'";
$resultEnTransito2 = mysqli_query($conexion, $queryEnTransito2);
$totalEnTransito2 = mysqli_fetch_assoc($resultEnTransito2)['total'];

// Obtener el total de ventas cargadas
$queryEnProcesoDigipTn2 = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE estadoventa = 'EN PROCESO DIGIP-TN' AND fechacarga = '$Date' AND vendedor = '$vendedor'";
$resultEnProcesoDigipTn2 = mysqli_query($conexion, $queryEnProcesoDigipTn2);
$totalEnProcesoDigipTn2 = mysqli_fetch_assoc($resultEnProcesoDigipTn2)['total'];

// Obtener el total de ventas cargadas
$queryDiferidaCargaTasa2 = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE estadoventa = 'DIFERIDA CARGA TASA' AND fechacarga = '$Date' AND vendedor = '$vendedor'";
$resultDiferidaCargaTasa2 = mysqli_query($conexion, $queryDiferidaCargaTasa2);
$totalDiferidaCargaTasa2 = mysqli_fetch_assoc($resultDiferidaCargaTasa2)['total'];

// Obtener el total de ventas cargadas
$queryDevueltaXVerificacion2 = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE estadoventa = 'DEVUELTA X VERIFICACION' AND fechacarga = '$Date' AND vendedor = '$vendedor'";
$resultDevueltaXVerificacion2 = mysqli_query($conexion, $queryDevueltaXVerificacion2);
$totalDevueltaXVerificacion2 = mysqli_fetch_assoc($resultDevueltaXVerificacion2)['total'];

// Obtener el total de ventas cargadas
$queryDevueltaXAuditoria2 = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE estadoventa = 'DEVUELTA X AUDITORIA' AND fechacarga = '$Date' AND vendedor = '$vendedor'";
$resultDevueltaXAuditoria2 = mysqli_query($conexion, $queryDevueltaXAuditoria2);
$totalDevueltaXAuditoria2 = mysqli_fetch_assoc($resultDevueltaXAuditoria2)['total'];

// Obtener el total de ventas cargadas
$queryDevueltaCargaTasa2 = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE estadoventa = 'DEVUELTA CARGA TASA' AND fechacarga = '$Date' AND vendedor = '$vendedor'";
$resultDevueltaCargaTasa2 = mysqli_query($conexion, $queryDevueltaCargaTasa2);
$totalDevueltaCargaTasa2 = mysqli_fetch_assoc($resultDevueltaCargaTasa2)['total'];

// Obtener el total de ventas cargadas
$queryDiferidaAuditoria2 = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE estadoventa = 'DIFERIDA AUDITORIA' AND fechacarga = '$Date' AND vendedor = '$vendedor'";
$resultDiferidaAuditoria2 = mysqli_query($conexion, $queryDiferidaAuditoria2);
$totalDiferidaAuditoria2 = mysqli_fetch_assoc($resultDiferidaAuditoria2)['total'];

// Obtener el total de ventas cargadas
$querySolicitudCumplida2 = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE estadoventa LIKE '%CUMPLIDA%' AND fechacarga = '$Date' AND vendedor = '$vendedor'";
$resultSolicitudCumplida2 = mysqli_query($conexion, $querySolicitudCumplida2);
$totalSolicitudCumplida2 = mysqli_fetch_assoc($resultSolicitudCumplida2)['total'];

// Obtener el total de ventas cargadas
$queryDevueltaPorVendedor2 = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE estadoventa = 'DEVUELTA POR VENDEDOR' AND fechacarga = '$Date' AND vendedor = '$vendedor'";
$resultDevueltaPorVendedor2 = mysqli_query($conexion, $queryDevueltaPorVendedor2);
$totalDevueltaPorVendedor2 = mysqli_fetch_assoc($resultDevueltaPorVendedor2)['total'];

// Obtener el total de ventas cargadas
$queryDevueltaTasa2 = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE estadoventa = 'DEVUELTA TASA' AND fechacarga = '$Date' AND vendedor = '$vendedor'";
$resultDevueltaTasa2 = mysqli_query($conexion, $queryDevueltaTasa2);
$totalDevueltaTasa2 = mysqli_fetch_assoc($resultDevueltaTasa2)['total'];

// Obtener el total de ventas cargadas
$querySolicitudCancelada2 = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE estadoventa LIKE '%CANCELADA%' AND fechacarga = '$Date' AND vendedor = '$vendedor'";
$resultSolicitudCancelada2 = mysqli_query($conexion, $querySolicitudCancelada2);
$totalSolicitudCancelada2 = mysqli_fetch_assoc($resultSolicitudCancelada2)['total'];

// Obtener el total de ventas cargadas
$queryPendienteCargaMovistar2 = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE estadoventa = 'PENDIENTE CARGA MOVISTAR' AND fechacarga = '$Date' AND vendedor = '$vendedor'";
$resultPendienteCargaMovistar2 = mysqli_query($conexion, $queryPendienteCargaMovistar2);
$totalPendienteCargaMovistar2 = mysqli_fetch_assoc($resultPendienteCargaMovistar2)['total'];

$queryDiferidaCargaMovistar2 = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE estadoventa = 'DIFERIDA CARGA MOVISTAR' AND fechacarga = '$Date' AND vendedor = '$vendedor'";
$resultDiferidaCargaMovistar2 = mysqli_query($conexion, $queryDiferidaCargaMovistar2);
$totalDiferidaCargaMovistar2 = mysqli_fetch_assoc($resultDiferidaCargaMovistar2)['total'];

$queryPendienteCargaIris2 = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE estadoventa = 'PENDIENTE CARGA IRIS' AND fechacarga = '$Date' AND vendedor = '$vendedor'";
$resultPendienteCargaIris2 = mysqli_query($conexion, $queryPendienteCargaIris2);
$totalPendienteCargaIris2 = mysqli_fetch_assoc($resultPendienteCargaIris2)['total'];

$queryDevueltaCargaMovistar2 = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE estadoventa = 'DEVUELTA CARGA MOVISTAR' AND fechacarga = '$Date' AND vendedor = '$vendedor'";
$resultDevueltaCargaMovistar2 = mysqli_query($conexion, $queryDevueltaCargaMovistar2);
$totalDevueltaCargaMovistar2 = mysqli_fetch_assoc($resultDevueltaCargaMovistar2)['total'];

$queryIngresadaMovistar2 = "SELECT COUNT(DISTINCT documentocliente,linea,producto) as total FROM ventas WHERE estadoventa = 'INGRESADA MOVISTAR' AND fechacarga = '$Date' AND vendedor = '$vendedor'";
$resultIngresadaMovistar2 = mysqli_query($conexion, $queryIngresadaMovistar2);
$totalIngresadaMovistar2 = mysqli_fetch_assoc($resultIngresadaMovistar2)['total'];

?>

<div class="row">
                    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Ventas Mensuales</h6>
            <div class="dropdown no-arrow">
            <?php echo $vendedor;?>
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                </a>
                
            </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            
               <canvas id="PieChart<?php echo $vendedor;?>" width="500" height="500"></canvas>
            
           
        </div>
    </div>
    <script>
    //Obtener datos de php

    var TotalPostVenta = <?php echo $totalIngresoPostVenta;?>;
    var RechazoABD = <?php echo $totalRechazoABD;?>;
    var Cancelada = <?php echo $totalSolicitudCancelada;?>;
    var Devuelta = <?php echo $totalDevuelta;?>;
    var PendienteDeVerificacion = <?php echo $totalPendienteDeVerificacion;?>;
    var PendienteAuditoria = <?php echo $totalPendienteDeAuditoria;?>;
    var InformadaTasa = <?php echo $totalInformadaTasa;?>;
    var PendienteCargaTasa = <?php echo $totalPendienteCargaTasa;?>;
    var IngresadaTasa = <?php echo $totalIngresadaTasa;?>;
    var EnTransito = <?php echo $totalEnTransito;?>;
    var EnProcesoDIGIPTN = <?php echo $totalEnProcesoDigipTn;?>;
    var DiferidaCargaTasa = <?php echo $totalDiferidaCargaTasa;?>;
    var DevueltaPorVerificacion = <?php echo $totalDevueltaXVerificacion;?>;
    var DevueltaPorAuditoria = <?php echo $totalDevueltaXAuditoria;?>;
    var DevueltaCargaTasa = <?php echo $totalDevueltaCargaTasa;?>;
    var DiferidaAuditoria = <?php echo $totalDiferidaAuditoria;?>;
    var SolicitudCumplida = <?php echo $totalSolicitudCumplida;?>;
    var DevueltaPorVendedor = <?php echo $totalDevueltaPorVendedor;?>;
    var DevueltaTasa = <?php echo $totalDevueltaTasa;?>;
    var PendienteCargaMovistar = <?php echo $totalPendienteCargaMovistar;?>;
    var DiferidaCargaMovistar = <?php echo $totalDiferidaCargaMovistar;?>;
    var PendienteCargaIris = <?php echo $totalPendienteCargaIris;?>;
    var DevueltaCargaMovistar = <?php echo $totalDevueltaCargaMovistar;?>;
    var IngresadaMovistar = <?php echo $totalIngresadaMovistar;?>;



        // Configurar los datos para el gráfico
        var data = {
            labels: ['TotalPostVenta','RechazoABD','Cancelada','Devuelta','PendienteDeVerificacion','PendienteAuditoria','InformadaTasa','PendienteCargaTasa','IngresadaTasa','EnTransito','EnProcesoDIGIPTN','DiferidaCargaTasa','DevueltaPorVerificacion','DevueltaPorAuditoria','DevueltaCargaTasa','DiferidaAuditoria','SolicitudCumplida','DevueltaPorVendedor','DevueltaTasa','PendienteCargaMovistar','DiferidaCargaMovistar','PendienteCargaIris','DevueltaCargaMovistar','IngresadaMovistar'],
            datasets: [{
                data: [TotalPostVenta,RechazoABD,Cancelada,Devuelta,PendienteDeVerificacion,PendienteAuditoria,InformadaTasa,PendienteCargaTasa,IngresadaTasa,EnTransito,EnProcesoDIGIPTN,DiferidaCargaTasa,DevueltaPorVerificacion,DevueltaPorAuditoria,DevueltaCargaTasa,DiferidaAuditoria,SolicitudCumplida,DevueltaPorVendedor,DevueltaTasa,PendienteCargaMovistar,DiferidaCargaMovistar,PendienteCargaIris,DevueltaCargaMovistar,IngresadaMovistar],
                backgroundColor: [
                    
                    'rgba(95, 11, 254, 1)',
                    'rgba(254, 11, 11, 1)',
                    'rgba(254, 11, 11, 1)',
                    'rgba(255, 173, 0, 0.96)',
                    'rgba(246, 243, 0, 0.82)',
                    'rgba(246, 243, 0, 0.82)',
                    'rgba(77, 0, 255, 1)',
                    'rgba(0, 205, 255, 1)',
                    'rgba(77, 0, 255, 1)',
                    'rgba(225, 38, 211, 1)',
                    'rgba(175, 181, 183, 1)',
                    'rgba(38, 83, 225, 1)',
                    'rgba(255, 173, 0, 0.96)',
                    'rgba(255, 173, 0, 0.96)',
                    'rgba(255, 173, 0, 0.96)',
                    'rgba(255, 173, 0, 1)',
                    'rgba(10, 199, 44, 1)',
                    'rgba(255, 173, 0, 0.96)',
                    'rgba(255, 173, 0, 0.96)',
                    'rgba(246, 243, 0, 0.82)',
                    'rgba(255, 173, 0, 1)',
                    'rgba(246, 243, 0, 0.82)',
                    'rgba(255, 173, 0, 0.96)',
                    'rgba(38, 192, 225, 1)'
                ],
                borderColor: [
                    
                    'rgba(95, 11, 254, 1)',
                    'rgba(254, 11, 11, 1)',
                    'rgba(254, 11, 11, 1)',
                    'rgba(255, 173, 0, 0.96)',
                    'rgba(246, 243, 0, 0.82)',
                    'rgba(246, 243, 0, 0.82)',
                    'rgba(77, 0, 255, 1)',
                    'rgba(0, 205, 255, 1)',
                    'rgba(77, 0, 255, 1)',
                    'rgba(225, 38, 211, 1)',
                    'rgba(175, 181, 183, 1)',
                    'rgba(38, 83, 225, 1)',
                    'rgba(255, 173, 0, 0.96)',
                    'rgba(255, 173, 0, 0.96)',
                    'rgba(255, 173, 0, 0.96)',
                    'rgba(255, 173, 0, 1)',
                    'rgba(10, 199, 44, 1)',
                    'rgba(255, 173, 0, 0.96)',
                    'rgba(255, 173, 0, 0.96)',
                    'rgba(246, 243, 0, 0.82)',
                    'rgba(255, 173, 0, 1)',
                    'rgba(246, 243, 0, 0.82)',
                    'rgba(255, 173, 0, 0.96)',
                    'rgba(38, 192, 225, 1)'
                ],
                borderWidth: 1
            }]
        };

        var options = {
    responsive: true,
    maintainAspectRatio: false, // Permitir que el gráfico se expanda para llenar su contenedor
    tooltips: {
        enabled: true, // Activar los tooltips
        callbacks: {
            label: function(tooltipItem, data) {
                // Obtener el índice del dato actual
                var dataIndex = tooltipItem.index;
                // Obtener el nombre del dato desde los datos
                var dataset = data.datasets[tooltipItem.datasetIndex];
                var label = dataset.labels[dataIndex];
                return label;
            }
        }
    },
    plugins: {
        labels: {
            display: false // Ocultar las etiquetas
        }
    },
    legend: {
        display: false // Ocultar la leyenda
    }
};

        // Obtener el contexto del canvas
        var ctx = document.getElementById('PieChart<?php echo $vendedor;?>').getContext('2d');

        // Crear el gráfico de torta
        var myPieChart = new Chart(ctx, {
            type: 'doughnut',
            data: data,
            options: options
        });

    </script>  

<div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Ventas Díarias</h6>
            <div class="dropdown no-arrow">
            <?php echo $vendedor;?>
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                </a>
                
            </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            
               <canvas id="PieChart2<?php echo $vendedor;?>" width="500" height="500"></canvas>
            
           
        </div>
    </div>
    <script>
    //Obtener datos de php

    var TotalPostVenta2 = <?php echo $totalIngresoPostVenta2;?>;
    var RechazoABD2 = <?php echo $totalRechazoABD2;?>;
    var Cancelada2 = <?php echo $totalSolicitudCancelada2;?>;
    var Devuelta2 = <?php echo $totalDevuelta2;?>;
    var PendienteDeVerificacion2 = <?php echo $totalPendienteDeVerificacion2;?>;
    var PendienteAuditoria2 = <?php echo $totalPendienteDeAuditoria2;?>;
    var InformadaTasa2 = <?php echo $totalInformadaTasa2;?>;
    var PendienteCargaTasa2 = <?php echo $totalPendienteCargaTasa2;?>;
    var IngresadaTasa2 = <?php echo $totalIngresadaTasa2;?>;
    var EnTransito2 = <?php echo $totalEnTransito2;?>;
    var EnProcesoDIGIPTN2 = <?php echo $totalEnProcesoDigipTn2;?>;
    var DiferidaCargaTasa2 = <?php echo $totalDiferidaCargaTasa2;?>;
    var DevueltaPorVerificacion2 = <?php echo $totalDevueltaXVerificacion2;?>;
    var DevueltaPorAuditoria2 = <?php echo $totalDevueltaXAuditoria2;?>;
    var DevueltaCargaTasa2 = <?php echo $totalDevueltaCargaTasa2;?>;
    var DiferidaAuditoria2 = <?php echo $totalDiferidaAuditoria2;?>;
    var SolicitudCumplida2 = <?php echo $totalSolicitudCumplida2;?>;
    var DevueltaPorVendedor2 = <?php echo $totalDevueltaPorVendedor2;?>;
    var DevueltaTasa2 = <?php echo $totalDevueltaTasa2;?>;
    var PendienteCargaMovistar2 = <?php echo $totalPendienteCargaMovistar2;?>;
    var DiferidaCargaMovistar2 = <?php echo $totalDiferidaCargaMovistar2;?>;
    var PendienteCargaIris2 = <?php echo $totalPendienteCargaIris2;?>;
    var DevueltaCargaMovistar2 = <?php echo $totalDevueltaCargaMovistar2;?>;
    var IngresadaMovistar2 = <?php echo $totalIngresadaMovistar2;?>;



        // Configurar los datos para el gráfico
        var data = {
            labels: ['TotalPostVenta','RechazoABD','Cancelada','Devuelta','PendienteDeVerificacion','PendienteAuditoria','InformadaTasa','PendienteCargaTasa','IngresadaTasa','EnTransito','EnProcesoDIGIPTN','DiferidaCargaTasa','DevueltaPorVerificacion','DevueltaPorAuditoria','DevueltaCargaTasa','DiferidaAuditoria','SolicitudCumplida','DevueltaPorVendedor','DevueltaTasa','PendienteCargaMovistar','DiferidaCargaMovistar','PendienteCargaIris','DevueltaCargaMovistar','IngresadaMovistar'],
            datasets: [{
                data: [TotalPostVenta2,RechazoABD2,Cancelada2,Devuelta2,PendienteDeVerificacion2,PendienteAuditoria2,InformadaTasa2,PendienteCargaTasa2,IngresadaTasa2,EnTransito2,EnProcesoDIGIPTN2,DiferidaCargaTasa2,DevueltaPorVerificacion2,DevueltaPorAuditoria2,DevueltaCargaTasa2,DiferidaAuditoria2,SolicitudCumplida2,DevueltaPorVendedor2,DevueltaTasa2,PendienteCargaMovistar2,DiferidaCargaMovistar2,PendienteCargaIris2,DevueltaCargaMovistar2,IngresadaMovistar2],
                backgroundColor: [
                    
                    'rgba(95, 11, 254, 1)',
                    'rgba(254, 11, 11, 1)',
                    'rgba(254, 11, 11, 1)',
                    'rgba(255, 173, 0, 0.96)',
                    'rgba(246, 243, 0, 0.82)',
                    'rgba(246, 243, 0, 0.82)',
                    'rgba(77, 0, 255, 1)',
                    'rgba(0, 205, 255, 1)',
                    'rgba(77, 0, 255, 1)',
                    'rgba(225, 38, 211, 1)',
                    'rgba(175, 181, 183, 1)',
                    'rgba(38, 83, 225, 1)',
                    'rgba(255, 173, 0, 0.96)',
                    'rgba(255, 173, 0, 0.96)',
                    'rgba(255, 173, 0, 0.96)',
                    'rgba(255, 173, 0, 1)',
                    'rgba(10, 199, 44, 1)',
                    'rgba(255, 173, 0, 0.96)',
                    'rgba(255, 173, 0, 0.96)',
                    'rgba(246, 243, 0, 0.82)',
                    'rgba(255, 173, 0, 1)',
                    'rgba(246, 243, 0, 0.82)',
                    'rgba(255, 173, 0, 0.96)',
                    'rgba(38, 192, 225, 1)'
                ],
                borderColor: [
                    
                    'rgba(95, 11, 254, 1)',
                    'rgba(254, 11, 11, 1)',
                    'rgba(254, 11, 11, 1)',
                    'rgba(255, 173, 0, 0.96)',
                    'rgba(246, 243, 0, 0.82)',
                    'rgba(246, 243, 0, 0.82)',
                    'rgba(77, 0, 255, 1)',
                    'rgba(0, 205, 255, 1)',
                    'rgba(77, 0, 255, 1)',
                    'rgba(225, 38, 211, 1)',
                    'rgba(175, 181, 183, 1)',
                    'rgba(38, 83, 225, 1)',
                    'rgba(255, 173, 0, 0.96)',
                    'rgba(255, 173, 0, 0.96)',
                    'rgba(255, 173, 0, 0.96)',
                    'rgba(255, 173, 0, 1)',
                    'rgba(10, 199, 44, 1)',
                    'rgba(255, 173, 0, 0.96)',
                    'rgba(255, 173, 0, 0.96)',
                    'rgba(246, 243, 0, 0.82)',
                    'rgba(255, 173, 0, 1)',
                    'rgba(246, 243, 0, 0.82)',
                    'rgba(255, 173, 0, 0.96)',
                    'rgba(38, 192, 225, 1)'
                ],
                borderWidth: 1
            }]
        };

        var options = {
    responsive: true,
    maintainAspectRatio: false, // Permitir que el gráfico se expanda para llenar su contenedor
    tooltips: {
        enabled: true, // Activar los tooltips
        callbacks: {
            label: function(tooltipItem, data) {
                // Obtener el índice del dato actual
                var dataIndex = tooltipItem.index;
                // Obtener el nombre del dato desde los datos
                var dataset = data.datasets[tooltipItem.datasetIndex];
                var label = dataset.labels[dataIndex];
                return label;
            }
        }
    },
    plugins: {
        labels: {
            display: false // Ocultar las etiquetas
        }
    },
    legend: {
        display: false // Ocultar la leyenda
    }
};

        // Obtener el contexto del canvas
        var ctx = document.getElementById('PieChart2<?php echo $vendedor;?>').getContext('2d');

        // Crear el gráfico de torta
        var myPieChart = new Chart(ctx, {
            type: 'doughnut',
            data: data,
            options: options
        });
    </script>

</div>


<?php
                    }
?>
<!-- Content Row -->
<div class="row">

    
</div>

</div>
<!-- /.container-fluid -->

</div>
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; VxT 2024</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Listo para irse?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Selecciona Cerrar sesión para salir o cancelar para permanecer en esta página.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="cerrar.php">Cerrar sesion</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>