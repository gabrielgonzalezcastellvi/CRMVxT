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
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
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
                <?php $Query2 = "SELECT COUNT(DISTINCT documentocliente,linea) FROM ventas";?>
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
$queryCargadas = "SELECT COUNT(DISTINCT documentocliente,linea) as total FROM ventas WHERE vendedor = '$vendedor'";
$resultCargadas = mysqli_query($conexion, $queryCargadas);
$totalCargadas = mysqli_fetch_assoc($resultCargadas)['total'];

// Obtener el total de ventas pendientes
$queryPendientes = "SELECT COUNT(DISTINCT documentocliente,linea) as total FROM ventas WHERE estadoventa LIKE '%Pendiente%' AND vendedor = '$vendedor'";
$resultPendientes = mysqli_query($conexion, $queryPendientes);
$totalPendientes = mysqli_fetch_assoc($resultPendientes)['total'];

// Obtener el total de ventas aprobadas
$queryAprobadas = "SELECT COUNT(DISTINCT documentocliente,linea) as total FROM ventas WHERE estadoventa LIKE '%CUMPLIDA%' AND vendedor = '$vendedor'";
$resultAprobadas = mysqli_query($conexion, $queryAprobadas);
$totalAprobadas = mysqli_fetch_assoc($resultAprobadas)['total'];

// Obtener el total de ventas a verificar
/* $queryVerificar = "SELECT COUNT(DISTINCT documentocliente,linea) as total FROM ventas WHERE estadoventa LIKE '%Revisar%'";
$resultVerificar = mysqli_query($conexion, $queryVerificar);
$totalVerificar = mysqli_fetch_assoc($resultVerificar)['total']; */

// Obtener el total de ventas canceladas
$queryCancelada = "SELECT COUNT(DISTINCT documentocliente,linea) as total FROM ventas WHERE estadoventa LIKE '%CANCELADA%' AND vendedor = '$vendedor'";
$resultCancelada = mysqli_query($conexion, $queryCancelada);
$totalCanceladas = mysqli_fetch_assoc($resultCancelada)['total'];

$queryIngresadaTASA = "SELECT COUNT(DISTINCT documentocliente, linea) as total FROM ventas WHERE estadoventa LIKE '%INGRESADA TASA%' AND vendedor = '$vendedor'";
$resultIngresadaTASA = mysqli_query($conexion, $queryIngresadaTASA);
$totalIngresadaTASA = mysqli_fetch_assoc($resultIngresadaTASA)['total'];

$queryIngresaAuditoria = "SELECT COUNT(DISTINCT documentocliente, linea) as total FROM ventas WHERE estadoventa LIKE '%AUDITORIA%' AND vendedor = '$vendedor'";
$resultIngresadaAuditoria = mysqli_query($conexion, $queryIngresaAuditoria);
$totalIngresadaAuditoria = mysqli_fetch_assoc($resultIngresadaAuditoria)['total'];

$queryIngresaRechazo = "SELECT COUNT(DISTINCT documentocliente, linea) as total FROM ventas WHERE estadoventa LIKE '%RECHAZO%' AND vendedor = '$vendedor'";
$resultIngresadaRechazo = mysqli_query($conexion, $queryIngresaRechazo);
$totalIngresadaRechazo = mysqli_fetch_assoc($resultIngresadaRechazo)['total'];

$queryIngresoPostVenta = "SELECT COUNT(DISTINCT documentocliente, linea) as total FROM ventas WHERE estadoventa LIKE '%POST VENTA%' AND vendedor = '$vendedor'";
$resultIngresadaPostVenta = mysqli_query($conexion,$queryIngresoPostVenta);
$totalIngresoPostVenta = mysqli_fetch_assoc($resultIngresadaPostVenta)['total'];

///////////////////////////////Cálculo para porcentaje del día
date_default_timezone_set('America/Argentina/Mendoza');

$Date = date('Y-m-d');
// Obtener el total de ventas cargadas
$queryCargadas2 = "SELECT COUNT(DISTINCT documentocliente,linea) as total FROM ventas WHERE fechacarga LIKE '%$Date%' AND vendedor = '$vendedor'";  
$resultCargadas2 = mysqli_query($conexion, $queryCargadas2);
$totalCargadas2 = mysqli_fetch_assoc($resultCargadas2)['total'];

// Obtener el total de ventas pendientes
$queryPendientes2 = "SELECT COUNT(DISTINCT documentocliente,linea) as total FROM ventas WHERE estadoventa LIKE '%Pendiente%' AND fechacarga LIKE '%$Date%' AND vendedor = '$vendedor'";
$resultPendientes2 = mysqli_query($conexion, $queryPendientes2);
$totalPendientes2 = mysqli_fetch_assoc($resultPendientes2)['total'];

// Obtener el total de ventas aprobadas
$queryAprobadas2 = "SELECT COUNT(DISTINCT documentocliente,linea) as total FROM ventas WHERE estadoventa LIKE '%CUMPLIDA%' AND fechacarga LIKE '%$Date%' AND vendedor = '$vendedor'";
$resultAprobadas2 = mysqli_query($conexion, $queryAprobadas2);
$totalAprobadas2 = mysqli_fetch_assoc($resultAprobadas2)['total'];

// Obtener el total de ventas a verificar
/* $queryVerificar = "SELECT COUNT(DISTINCT documentocliente,linea) as total FROM ventas WHERE estadoventa LIKE '%Revisar%'";
$resultVerificar = mysqli_query($conexion, $queryVerificar);
$totalVerificar = mysqli_fetch_assoc($resultVerificar)['total']; */

// Obtener el total de ventas canceladas
$queryCancelada2 = "SELECT COUNT(DISTINCT documentocliente,linea) as total FROM ventas WHERE estadoventa LIKE '%CANCELADA%' AND fechacarga LIKE '%$Date%' AND vendedor = '$vendedor'";
$resultCancelada2 = mysqli_query($conexion, $queryCancelada2);
$totalCanceladas2 = mysqli_fetch_assoc($resultCancelada2)['total'];

$queryIngresadaTASA2 = "SELECT COUNT(DISTINCT documentocliente, linea) as total FROM ventas WHERE estadoventa LIKE '%INGRESADA TASA%' AND fechacarga LIKE '%$Date%' AND vendedor = '$vendedor'";
$resultIngresadaTASA2 = mysqli_query($conexion, $queryIngresadaTASA2);
$totalIngresadaTASA2 = mysqli_fetch_assoc($resultIngresadaTASA2)['total'];

$queryIngresaAuditoria2 = "SELECT COUNT(DISTINCT documentocliente, linea) as total FROM ventas WHERE estadoventa LIKE '%AUDITORIA%' AND fechacarga LIKE '%$Date%' AND vendedor = '$vendedor'";
$resultIngresadaAuditoria2 = mysqli_query($conexion, $queryIngresaAuditoria2);
$totalIngresadaAuditoria2 = mysqli_fetch_assoc($resultIngresadaAuditoria2)['total'];

$queryIngresaRechazo2 = "SELECT COUNT(DISTINCT documentocliente, linea) as total FROM ventas WHERE estadoventa LIKE '%RECHAZO%' AND fechacarga LIKE '%$Date%' AND vendedor = '$vendedor'";
$resultIngresadaRechazo2 = mysqli_query($conexion, $queryIngresaRechazo2);
$totalIngresadaRechazo2 = mysqli_fetch_assoc($resultIngresadaRechazo2)['total'];

$queryIngresoPostVenta2 = "SELECT COUNT(DISTINCT documentocliente, linea) as total FROM ventas WHERE estadoventa LIKE '%POST VENTA%' AND fechacarga LIKE '%$Date%' AND vendedor = '$vendedor'";
$resultIngresadaPostVenta2 = mysqli_query($conexion,$queryIngresoPostVenta2);
$totalIngresoPostVenta2 = mysqli_fetch_assoc($resultIngresadaPostVenta2)['total'];


// Calcular los porcentajes
#$totalVentas = $totalCargadas + $totalPendientes + $totalAprobadas + $totalVerificar + $totalCanceladas + $totalIngresadaTASA + $totalIngresadaAuditor
?>

<div class="row">
                    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <h2><?php echo $vendedor;?></h2>
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Ventas Mensuales</h6>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                </a>
                
            </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            
               <canvas id="PieChart<?php echo $vendedor; ?>" width="380" height="300"></canvas>
            
           
        </div>
    </div>
    <script>
        // Obtener los datos de PHP
        var totalPostVenta = <?php echo $totalIngresoPostVenta; ?>;
        var totalPendientes = <?php echo $totalPendientes; ?>;
        var totalAprobadas = <?php echo $totalAprobadas; ?>;
        var totalCanceladas = <?php echo $totalCanceladas; ?>;
        var totalIngresadaTASA = <?php echo $totalIngresadaTASA; ?>;
        var totalIngresadaAuditoria = <?php echo $totalIngresadaAuditoria; ?>;
        var totalIngresadaRechazo = <?php echo $totalIngresadaRechazo; ?>;
        // Configurar los datos para el gráfico
        var data = {
            labels: ['Pendientes', 'Aprobadas','Canceladas','TASA','Auditoria','Rechazadas','PostVenta'],
            datasets: [{
                data: [totalPendientes, totalAprobadas, totalCanceladas,totalIngresadaTASA,totalIngresadaAuditoria,totalIngresadaRechazo,totalPostVenta],
                backgroundColor: [
                    
                    'rgba(255, 206, 86, 0.5)',
                    'rgba(75, 192, 192, 0.5)',
                    'rgba(255, 99, 132, 0.5)',
                    'rgba(81, 29, 246, 0.8)',
                    'rgba(250, 180, 18, 0.83)',
                    'rgba(84, 18, 77, 0.8)',
                    'rgba(39, 243, 245, 0.8)'

                ],
                borderColor: [
                    
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(81, 29, 246, 0.8)',
                    'rgba(250, 180, 18, 0.83)',
                    'rgba(84, 18, 77, 0.8)',
                    'rgba(39, 243, 245, 0.8)'
                ],
                borderWidth: 1
            }]
        };

        // Configurar opciones del gráfico
        var options = {
        responsive: true,
        maintainAspectRatio: false, // Permitir que el gráfico se expanda para llenar su contenedor
        tooltips: {
            enabled: false // Desactivar los tooltips (etiquetas)
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
        var ctx = document.getElementById('PieChart<?php echo $vendedor; ?>').getContext('2d');

        // Crear el gráfico de torta
        var myPieChart = new Chart(ctx, {
            type: 'doughnut',
            data: data,
            options: options
        });
        myPieChart.config.options.plugins = [];
    </script>  

<div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <h2><?php echo $vendedor;?></h2>
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Ventas Díarias</h6>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                </a>
                
            </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            
               <canvas id="PieChart2<?php echo $vendedor; ?>" width="380" height="300"></canvas>
            
           
        </div>
    </div>
    <script>
        // Obtener los datos de PHP
        var totalPostVenta2 = <?php echo $totalIngresoPostVenta2; ?>;
        var totalPendientes2 = <?php echo $totalPendientes2; ?>;
        var totalAprobadas2 = <?php echo $totalAprobadas2; ?>;
        var totalCanceladas2 = <?php echo $totalCanceladas2; ?>;
        var totalIngresadaTASA2 = <?php echo $totalIngresadaTASA2; ?>;
        var totalIngresadaAuditoria2 = <?php echo $totalIngresadaAuditoria2; ?>;
        var totalIngresadaRechazo2 = <?php echo $totalIngresadaRechazo2; ?>;
        // Configurar los datos para el gráfico
        var data = {
            labels: ['Pendientes', 'Aprobadas','Canceladas','TASA','Auditoria','Rechazadas','PostVenta'],
            datasets: [{
                data: [totalPendientes2, totalAprobadas2, totalCanceladas2,totalIngresadaTASA2,totalIngresadaAuditoria2,totalIngresadaRechazo2,totalPostVenta2],
                backgroundColor: [
                    
                    'rgba(255, 206, 86, 0.5)',
                    'rgba(75, 192, 192, 0.5)',
                    'rgba(255, 99, 132, 0.5)',
                    'rgba(81, 29, 246, 0.8)',
                    'rgba(250, 180, 18, 0.83)',
                    'rgba(84, 18, 77, 0.8)',
                    'rgba(39, 243, 245, 0.8)'

                ],
                borderColor: [
                    
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(81, 29, 246, 0.8)',
                    'rgba(250, 180, 18, 0.83)',
                    'rgba(84, 18, 77, 0.8)',
                    'rgba(39, 243, 245, 0.8)'
                ],
                borderWidth: 1
            }]
        };

        // Configurar opciones del gráfico
        var options = {
        responsive: true,
        maintainAspectRatio: false, // Permitir que el gráfico se expanda para llenar su 
        tooltips: {
            enabled: false // Desactivar los tooltips (etiquetas)
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
        var ctx = document.getElementById('PieChart2<?php echo $vendedor; ?>').getContext('2d');

        // Crear el gráfico de torta
        var myPieChart = new Chart(ctx, {
            type: 'doughnut',
            data: data,
            options: options
        });

        myPieChart.config.options.plugins = [];

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