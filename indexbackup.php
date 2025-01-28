<!DOCTYPE html>
<html lang="es">
<?php 
session_start(); 
$Equipo = $_SESSION['equipo'];

if (!isset($_SESSION['Nombre'])) {
    session_destroy();
    header("Location: login.php");
    exit;
}

?>
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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">    

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="icon" href="./icono.ico" type="image/x-icon">
    
</head>

<body id="page-top">
<?php
//Verificar si el usuario está autenticado, de lo contrario redirigirlo a la página de inicio de sesión



if (!isset($_SESSION['level'])) {
    // Si no está autenticado, redirigir a la página de inicio de sesión
    header("Location: login.php");
    exit();
}

if($_SESSION['level'] != 1){
    $_SESSION['mensaje'] = "Necesitas permisos administrativos para acceder al sitio.";
    header('Location:index2');
    exit();
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
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="perfil">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Perfil
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Configuracion
                                </a>
                                <a class="dropdown-item" href="actividad_logueo">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Actividad de logueo
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="cerrar" data-toggle="modal" data-target="#logoutModal">
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
                <?php 
                if($Equipo != 'RODRIGO' && $Equipo != 'ADMINISTRACION'){
                  $Query2 = "SELECT COUNT(DISTINCT documentocliente,linea,producto) FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND  equipo LIKE '%$Equipo%'";
                }else{
                  $Query2 = "SELECT COUNT(DISTINCT documentocliente,linea,producto) FROM ventas WHERE DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m')";
                }
                ?>
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Panel general</h1>
                       <!--  <form method="post" action="pdf.php">
                        <input type="hidden" name="consulta" value="<?php echo base64_encode($Query2); ?>">
                        <input type="submit" value="Generar PDF de ventas" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                </form> -->
                              <!--   <form method="post" action="csv.php">
                                <input type="hidden" name="consulta" value="<?php echo base64_encode($Query); ?>">
    <button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" title="Generar reporte">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filetype-csv" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5zM3.517 14.841a1.13 1.13 0 0 0 .401.823q.195.162.478.252.284.091.665.091.507 0 .859-.158.354-.158.539-.44.187-.284.187-.656 0-.336-.134-.56a1 1 0 0 0-.375-.357 2 2 0 0 0-.566-.21l-.621-.144a1 1 0 0 1-.404-.176.37.37 0 0 1-.144-.299q0-.234.185-.384.188-.152.512-.152.214 0 .37.068a.6.6 0 0 1 .246.181.56.56 0 0 1 .12.258h.75a1.1 1.1 0 0 0-.2-.566 1.2 1.2 0 0 0-.5-.41 1.8 1.8 0 0 0-.78-.152q-.439 0-.776.15-.337.149-.527.421-.19.273-.19.639 0 .302.122.524.124.223.352.367.228.143.539.213l.618.144q.31.073.463.193a.39.39 0 0 1 .152.326.5.5 0 0 1-.085.29.56.56 0 0 1-.255.193q-.167.07-.413.07-.175 0-.32-.04a.8.8 0 0 1-.248-.115.58.58 0 0 1-.255-.384zM.806 13.693q0-.373.102-.633a.87.87 0 0 1 .302-.399.8.8 0 0 1 .475-.137q.225 0 .398.097a.7.7 0 0 1 .272.26.85.85 0 0 1 .12.381h.765v-.072a1.33 1.33 0 0 0-.466-.964 1.4 1.4 0 0 0-.489-.272 1.8 1.8 0 0 0-.606-.097q-.534 0-.911.223-.375.222-.572.632-.195.41-.196.979v.498q0 .568.193.976.197.407.572.626.375.217.914.217.439 0 .785-.164t.55-.454a1.27 1.27 0 0 0 .226-.674v-.076h-.764a.8.8 0 0 1-.118.363.7.7 0 0 1-.272.25.9.9 0 0 1-.401.087.85.85 0 0 1-.478-.132.83.83 0 0 1-.299-.392 1.7 1.7 0 0 1-.102-.627zm8.239 2.238h-.953l-1.338-3.999h.917l.896 3.138h.038l.888-3.138h.879z"/>
</svg>
        CSV
    </button>
</form> --></div>

                    <!-- Content Row -->
                    <div class="row">
                        <br>
                        <br>
                        <div class="owl-carousel"></div>
                        <br>
                        <br>
                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script>
$(document).ready(function(){
    // Obtener archivos de PHP
    $.getJSON('get_files.php', function(data) {
        // Crear elementos de carrusel para cada archivo
        $.each(data, function(index, file) {
            $('.owl-carousel').append('<div><img src="./ofertasmovi/' + file + '" alt="Archivo" width="500px" height="350px"></div>');
        });
        
        // Inicializar el carrusel
        $('.owl-carousel').owlCarousel({
            loop:true,
            margin:10,
            navigation:false,
            responsive:{
                0:{
                    items:3
                }
            }
        });
    });
});
</script>
                   
                    <!-- Estados ruedas-->
                   <?php 
                   require 'estados.php';
                   ?>


<div class="row">
                    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Ventas Mensuales VXT <?php echo $TotalMes;?></h6>
            <div class="dropdown no-arrow">
            <a href="graficosTotales.php">Ver más</a>
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                </a>
                
            </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            
               <canvas id="PieChart" width="500" height="500"></canvas>
            
           
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
        var ctx = document.getElementById('PieChart').getContext('2d');

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
            <h6 class="m-0 font-weight-bold text-primary">Ventas Díarias VXT <?php echo $totalDia; ?></h6>
            <div class="dropdown no-arrow">
                <a href="graficosTotales.php">Ver más</a>
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                </a>
                
            </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            
               <canvas id="PieChart2" width="500" height="500"></canvas>
            
           
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
        var ctx = document.getElementById('PieChart2').getContext('2d');

        // Crear el gráfico de torta
        var myPieChart = new Chart(ctx, {
            type: 'doughnut',
            data: data,
            options: options
        });
    </script>
</div>
<br>
<br>
<div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Ventas Mensuales ASM <?php echo $TotalMes;?></h6>
            <div class="dropdown no-arrow">
            <a href="graficosTotales.php">Ver más</a>
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                </a>
                
            </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            
               <canvas id="PieChart" width="500" height="500"></canvas>
            
           
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
        var ctx = document.getElementById('PieChart').getContext('2d');

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
            <h6 class="m-0 font-weight-bold text-primary">Ventas Díarias ASM <?php echo $totalDia; ?></h6>
            <div class="dropdown no-arrow">
                <a href="graficosTotales.php">Ver más</a>
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                </a>
                
            </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            
               <canvas id="PieChart2" width="500" height="500"></canvas>
            
           
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
        var ctx = document.getElementById('PieChart2').getContext('2d');

        // Crear el gráfico de torta
        var myPieChart = new Chart(ctx, {
            type: 'doughnut',
            data: data,
            options: options
        });
    </script>

</div>


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