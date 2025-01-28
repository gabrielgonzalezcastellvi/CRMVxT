<!DOCTYPE html>
<html lang="es">
<?php  session_start(); 
error_reporting(0); ?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Sistema carga - VxT</title>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="icon" href="./icono.ico" type="image/x-icon">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body id="page-top">
<?php
//Verificar si el usuario está autenticado, de lo contrario redirigirlo a la página de inicio de sesión

if (!isset($_SESSION['Nombre'])) {
    session_destroy();
    header("Location: login");
    exit;
}

if($_SESSION['level'] != 1){
$_SESSION['mensaje'] = "Necesitas permisos administrativos para acceder al sitio.";
header('Location:solicitudes2.php');
exit();
}

if (isset($_SESSION['alertasoli'])) {
    // Mostrar el mensaje
    echo '<div class="alert alert-danger" role="alert">' . $_SESSION['alertasoli'] . '</div>';
    // Limpiar el mensaje para que solo se muestre una vez
    unset($_SESSION['alertasoli']);
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
                window.location.href = 'cerrar';
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
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index">
                <div class="sidebar-brand-icon rotate-n-15">
                
                </div>
                <div class="mr-2 d-none d-lg-inline text-black-600 small"><?php echo 'Bienvenid@ '.$_SESSION['Nombre'];?></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

<?php require 'menu.php';?>


            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-1" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-5 static-top shadow">

<!-- Sidebar Toggle (Topbar) -->
<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-4">
    <i class="fa fa-bars"></i>
</button>

<!-- Button to trigger modal -->
<button type="button" class="btn btn-primary ml-auto" data-toggle="modal" data-target="#exampleModal">
    Mostrar Formulario
</button>

<!-- Modal -->
 <!-- Modal -->
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document"> <!-- Clase modal-xl para modal extra grande -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Formulario de Búsqueda</h5>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick="reloadPage()" title="Cerrar">X</button>
            </div>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            <form class="form-inline" method="GET" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                        <p><b>Número solicitud:</b></p>
                            <input type="text" class="form-control" title="Numero solicitud" name="numerosolicitud"
                                    aria-label="Buscar por número solicitud"
                                   aria-describedby="basic-addon2">
                        </div>
                        <div class="col-md-4 mb-3">
                            <p><b>Linea:</b></p>
                            <input type="text" class="form-control" title="Numero linea" name="numerolinea"
                                    aria-label="Buscar por número de línea"
                                   aria-describedby="basic-addon3">
                        </div>
                        <div class="col-md-4 mb-3">
                        <p><b>DNI:</b></p>
                            <input type="text" class="form-control" title="DNI" name="dni"
                                   aria-label="Buscar por DNI" aria-describedby="basic-addon4">
                        </div>
                        <div class="col-md-4 mb-3">
                        <p><b>Fecha portación desde:</b></p>
                            <input type="date" class="form-control" title="Fecha portación desde"
                                   name="fechaportaciondesde" 
                                   aria-label="Buscar por fecha portacion" aria-describedby="basic-addon4">
                        </div>
                        <div class="col-md-4 mb-3">
                        <p><b>Fecha portación hasta:</b></p>
                            <input type="date" class="form-control" title="Fecha portacion hasta"
                                   name="fechaportacionhasta" 
                                   aria-label="Buscar por fecha portacion" aria-describedby="basic-addon4">
                        </div>
                        <div class="col-md-4 mb-3">
                        <p><b>CUIT:</b></p>
                            <input type="text" class="form-control" title="CUIT" name="cuit"
                                   aria-label="Buscar por CUIT" aria-describedby="basic-addon4">
                        </div>
                        <div class="col-md-4 mb-3">
                        <p><b>Fecha de carga desde:</b></p>
                            <input type="date" class="form-control" title="Fecha de carga desde"
                                   name="fechacargadesde" 
                                   aria-label="Buscar por fecha portacion" aria-describedby="basic-addon4">
                        </div>
                        <div class="col-md-4 mb-3">
                        <p><b>Fecha de carga hasta:</b></p>
                            <input type="date" class="form-control" title="Fecha de carga hasta"
                                   name="fechacargahasta" 
                                   aria-label="Buscar por fecha portacion" aria-describedby="basic-addon4">
                        </div>
                        <div class="col-md-4 mb-3">
                        <p><b>Nombre cliente:</b></p>
                            <input type="text" class="form-control" title="Nombre cliente"
                                   name="nombrecliente" 
                                   aria-label="Nombre cliente" aria-describedby="basic-addon4">
                        </div>
                        <div class="col-md-4 mb-3">
                        <p><b>Estados:</b></p>
                            <select class="form-control" title="Estado" name="estado[]" aria-label="Buscar por Estado"
                                    aria-describedby="basic-addon3" size="10" multiple>
                                <?php
                                $opciones = array("","POST VENTA","RECHAZO ABD","CANCELADA","DEVUELTA","PENDIENTE DE VERIFICACION","PENDIENTE AUDITORIA","PAGO DEUDA MOVI","INFORMADA TASA","PENDIENTE CARGA TASA","INGRESADA TASA","EN TRANSITO","EN PROCESO DIGIP-TN","DIFERIDA CARGA TASA","DEVUELTA X VERIFICACION","DEVUELTA X AUDITORIA","DEVUELTA CARGA TASA","DIFERIDA AUDITORIA","CUMPLIDA","DEVUELTA X VENDEDOR","DEVUELTA TASA","SOLICITUD CANCELADA","PENDIENTE CARGA MOVISTAR","DIFERIDA CARGA MOVISTAR","PENDIENTE CARGA IRIS","DEVUELTA CARGA MOVISTAR","INGRESADA MOVISTAR"); // Agrega aquí todas las opciones necesarias
                                foreach ($opciones as $opcion) {
                                    echo "<option>$opcion</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                        <p><b>Fecha de carga:</b></p>
                            <input type="date" class="form-control" title="Fecha" name="fecha" aria-label="Fecha" aria-describedby="basic-addon4">
                        </div>
                        <div class="col-md-4 mb-3">
                        <p><b>Días transcurridos:</b></p>
                            <input type="number" class="form-control" title="Días transcurridos" name="diastranscurridos" aria-label="Fecha" aria-describedby="basic-addon4">
                        </div>
                        <div class="col-md-4 mb-3">
                        <p><b>Producto:</b></p>
                            <select class="form-control" title="Producto" name="producto" aria-label="PRODUCTO"
                                    aria-describedby="basic-addon4" size="1">
                                <?php
                                $opcionesProducto = array("","ALTA NUEVA","FIBRA","PORTA"); // Agrega aquí todas las opciones necesarias
                                foreach ($opcionesProducto as $opcion) {
                                    echo "<option>$opcion</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
    <p><b>Planes:</b></p>
    <select class="form-control" title="Planes" name="planes" aria-label="Planes" aria-describedby="basic-addon4" size="1">
        <!-- Opción en blanco al principio -->
        <option value="" class="form-control"></option>
        <?php
        require 'conexion.php';
        $QueryPlanes = "SELECT producto FROM productos";
        $ResultPlanes = mysqli_query($conexion, $QueryPlanes);
        while ($row = $ResultPlanes->fetch_assoc()) {
        ?>
            <option value="<?php echo $row['producto']; ?>" class="form-control"><?php echo $row['producto']; ?></option>
        <?php
        }
        ?>
    </select>
</div>
                        
                        <div class="col-md-4 mb-3">
                        <p><b>Vendedor:</b></p>
                            <div class="input-group">
                            <select class="form-control" title="Vendedor" name="vendedor" id="vendedor">
                            <?php
                            require 'conexion.php';
    $QueryVendedores = "SELECT nombre FROM usuarios WHERE equipo LIKE '%RODRIGO%' AND bloqueado <> '1'";
    $ResultVendedores = mysqli_query($conexion, $QueryVendedores);
    while($row = $ResultVendedores -> fetch_assoc()){
    ?>
    <option value="<?php echo $row['nombre'];?>" class="form-control"><?php echo $row['nombre'];?></option>   
<?php 
}
?>
</select>
                              
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                <button type="reset" class="btn btn-warning" title="Quitar filtro">Quitar filtro</button>
                <button class="btn btn-success" type="submit" title="Buscar">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
    </svg>
    Buscar
</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Topbar Navbar -->
<ul class="navbar-nav ml-auto">

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
                <div class="container-fluid" >
                <?php
date_default_timezone_set('America/Argentina/Mendoza');
require 'conexion.php';
$Vendedor = $_SESSION['Nombre'];
$Equipo = $_SESSION['equipo'];
// Configuración de la paginación
$registros_por_pagina = 20; // Número de registros a mostrar por página
$pagina_actual = isset($_GET['pagina']) ? $_GET['pagina'] : 1; // Página actual, por defecto 1

// Calcular el offset para la consulta SQL
$offset = ($pagina_actual - 1) * $registros_por_pagina;

// Consulta SQL con LIMIT y OFFSET

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $whereClause = "";

    //Filtro por planes
    if(!empty($_GET['planes'])){
        $planes= $_GET['planes'];
        $whereClause .= "planes = '$planes' AND ";
       }


    //Filtro por Nombre de cliente

    if(!empty($_GET['nombrecliente'])){
     $nombrecliente = $_GET['nombrecliente'];
     $whereClause .= "nombrecliente LIKE '%$nombrecliente%' AND ";
    }

    //Filtro por CUIT

    if(!empty($_GET['cuit'])){
     $cuit = $_GET['cuit'];
     $whereClause .= "cuitcliente = '$cuit' AND ";
    }

    //Filtro fecha de carga desde hasta

    if (!empty($_GET["fechacargadesde"]) && !empty($_GET["fechacargahasta"])) {
        $fechacargadesde = $_GET["fechacargadesde"];
        $fechacargahasta = $_GET["fechacargahasta"];
        $whereClause .= "fechacarga BETWEEN '$fechacargadesde' AND '$fechacargahasta' AND ";
    }

    //Filtro vendedor por fechas de carga
    if (!empty($_GET["fechacargadesde"]) && !empty($_GET["fechacargahasta"]) && !empty($_GET['vendedor'])) {
        $fechacargadesde = $_GET["fechacargadesde"];
        $fechacargahasta = $_GET["fechacargahasta"];
        $vendedor = $_GET["vendedor"];
        $whereClause .= "fechacarga BETWEEN '$fechacargadesde' AND '$fechacargahasta' AND vendedor LIKE '%$vendedor%' AND ";
    }


    //Filtro días transcurridos

    if(!empty($_GET['diastranscurridos'])){
      $dias_transcurridos = $_GET['diastranscurridos'];
      $whereClause .= "dias_transcurridos = '$dias_transcurridos' AND estadoventa != 'SOLICITUD CUMPLIDA' AND ";
    }

    
    //filtro vendedor y dias transcurridos

    if(!empty($vendedor) && !empty($fecha)){
        $vendedor = $_GET['vendedor'];
        $fecha = $_GET['fecha'];
        $whereClause .= "vendedor LIKE '%$vendedor%' AND dias_transcurridos = '$dias_transcurridos' AND ";
        }

    //filtro vendedor y dia

    if(!empty($vendedor) && !empty($fecha)){
    $vendedor = $_GET['vendedor'];
    $fecha = $_GET['fecha'];
    $whereClause .= "vendedor LIKE '%$vendedor%' AND fechacarga LIKE '%$fecha%' AND ";
    }

    //Filtro pagina

    if(!empty($_GET['pagina'])){
      $pagina = $_GET['pagina'];
    }

    //filtro fecha

    if(!empty($_GET["fecha"])){
      $fecha = $_GET['fecha'];
      $whereClause .= "fechacarga LIKE '%$fecha%' AND ";
    }

    //mostrar ventas del día
    if (!empty($_GET["ventasdia"])) {
        $ventasdeldia = $_GET['ventasdia'];
        $whereClause .= "fechacarga LIKE '%$ventasdeldia%' AND ";
    }

    //Verificar producto
    if (!empty($_GET["producto"])) {
        $Producto = $_GET['producto'];
        $whereClause .= "producto LIKE '%$Producto%' AND ";
    }

    //Verificar fecha portacion
    if (!empty($_GET["fechaportaciondesde"]) && !empty($_GET["fechaportacionhasta"])) {
        $fechaportaciondesde = $_GET["fechaportaciondesde"];
        $fechaportacionhasta = $_GET["fechaportacionhasta"];
        $whereClause .= "fechaportacion BETWEEN '$fechaportaciondesde' AND '$fechaportacionhasta' AND ";
    }


    if(!empty($_GET["estado"]) && $_GET["estado"] == 'DEVUELTAS'){
     $Devueltas = $_GET['estado'];
   echo  $whereClause .= "estadoventa LIKE '%$Devueltas%' AND equipo LIKE '%RODRIGO%'";

    }

    // Verificar si se proporcionó un número de solicitud
    if (!empty($_GET["estado"])) {
        $estados = $_GET["estado"];
        $estadoClause = "(";
        foreach ($estados as $estado) {
            $estadoClause .= "estadoventa LIKE '%$estado%' OR ";
        }
        $estadoClause = rtrim($estadoClause, " OR ");
        $estadoClause .= ") AND ";
        $whereClause .= $estadoClause;
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

    if(!empty($_GET["equipo"])){
      $whereClause .= "equipo = 'RODRIGO' AND ";
    }

    // Verificar equipo
    
    $whereClause .= "equipo LIKE '%RODRIGO%' AND ";
    

    // Eliminar el "AND" adicional al final de la cláusula WHERE si está presente
    $whereClause = rtrim($whereClause, " AND ");

    // Construir la consulta SQL
    $Query = "SELECT * FROM ventas";
    $Query5 = "SELECT COUNT(linea) as TotalBusqueda FROM ventas";
    if (!empty($whereClause)) {
        $Query .= " WHERE $whereClause";
        $Query5 .= " WHERE $whereClause";
    }
    $Query .= " ORDER BY id DESC LIMIT $registros_por_pagina OFFSET $offset";
    $Query5 .= " ORDER BY id DESC LIMIT $registros_por_pagina OFFSET $offset";
} else {
    $Query = "SELECT * FROM ventas LIMIT $registros_por_pagina OFFSET $offset";
    $Query5 = "SELECT COUNT(linea) as TotalBusqueda FROM ventas WHERE equipo LIKE '%RODRIGO%' ORDER BY fechacarga DESC LIMIT $registros_por_pagina OFFSET $offset";
}

$Query2 = "SELECT * FROM ventas WHERE equipo LIKE '%RODRIGO%'";
$Query3 = "SELECT COUNT(linea) as total FROM ventas WHERE equipo LIKE '%RODRIGO%'";
$queryDevueltas = "SELECT COUNT(estadoventa) as devueltas FROM `ventas` WHERE estadoventa LIKE '%DEVUELTA%' AND equipo LIKE '%RODRIGO%';";
$Querytotalmes = "SELECT COUNT(linea) as total FROM ventas WHERE equipo LIKE '%RODRIGO%' AND DATE_FORMAT(fechacarga, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m')";
$Resulttotalmes = mysqli_query($conexion, $Querytotalmes);
$Result = mysqli_query($conexion, $Query);
$Result3 = mysqli_query($conexion, $Query3);
$Result5 = mysqli_query($conexion, $Query5);

$TotalBusqueda = "";
while ($row5 = $Result5->fetch_assoc()) {
    $TotalBusqueda = $row5['TotalBusqueda'];
    $_SESSION['totalresultadobusqueda'] = $TotalBusqueda;
}

while ($row = $Result3->fetch_assoc()) {
    $Total = $row['total'];
}

while ($rowtotalmes = $Resulttotalmes -> fetch_assoc()){
    $TotalMes = $rowtotalmes['total'];
}

$date = '';
$date = date('Y-m-d');
$Query4 = "SELECT COUNT(*) as totalcarga FROM ventas WHERE fechacarga = '$date' AND equipo LIKE '%RODRIGO%'";




$Result4 = mysqli_query($conexion, $Query4);
while ($row4 = $Result4->fetch_assoc()) {
    $Date = $row4['totalcarga'];
}


$ResultDevueltas = mysqli_query($conexion,$queryDevueltas);
while($RowDevueltas = $ResultDevueltas -> fetch_assoc()){
     $Devueltas = $RowDevueltas['devueltas'];
}
?>   
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <!-- <h2 class="h3 mb-0 text-gray-800">Total solicitudes de venta:  <b><?php $Total; ?></b></h2> -->
                        <h2 class="h3 mb-0 text-gray-800">Total resultado busqueda:  <b><?php echo $_SESSION['totalresultadobusqueda']; ?></b></h2>
                        <?php 
if ($Date > 0) {
    echo '<h2 class="h3 mb-0 text-gray-800">Solicitudes del día: <b><a href="solicitudes?ventasdia=' . $date . '">' . $Date . '</a></b></h2>';
} else {
    echo '<h2 class="h3 mb-0 text-gray-800">Solicitudes del día: <b>' . $Date . '</b></h2>';
}
?>     
<?php  
if ($Devueltas > 0) {
    echo '<h2 class="h3 mb-0 text-gray-800">Solicitudes devueltas: <b><a href="solicitudes?estado%5B%5D=DEVUELTA">'.$Devueltas.'</a></b></h2>';
}
?>       
<h2 class="h3 mb-0 text-gray-800">Solicitudes cargadas del mes:  <b><?php echo $TotalMes;?></b></h2>               
                       <!-- <form method="GET" action="pdf.php">
                        <input type="hidden" name="consulta" value="<?php echo base64_encode($Query2); ?>">
                        <input type="submit" value="Generar PDF de ventas" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                </form> -->
                                <form method="POST" action="csv">
    <input type="hidden" name="consulta" value="<?php echo base64_encode($Query); ?>">
    <button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" title="Generar reporte">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filetype-csv" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5zM3.517 14.841a1.13 1.13 0 0 0 .401.823q.195.162.478.252.284.091.665.091.507 0 .859-.158.354-.158.539-.44.187-.284.187-.656 0-.336-.134-.56a1 1 0 0 0-.375-.357 2 2 0 0 0-.566-.21l-.621-.144a1 1 0 0 1-.404-.176.37.37 0 0 1-.144-.299q0-.234.185-.384.188-.152.512-.152.214 0 .37.068a.6.6 0 0 1 .246.181.56.56 0 0 1 .12.258h.75a1.1 1.1 0 0 0-.2-.566 1.2 1.2 0 0 0-.5-.41 1.8 1.8 0 0 0-.78-.152q-.439 0-.776.15-.337.149-.527.421-.19.273-.19.639 0 .302.122.524.124.223.352.367.228.143.539.213l.618.144q.31.073.463.193a.39.39 0 0 1 .152.326.5.5 0 0 1-.085.29.56.56 0 0 1-.255.193q-.167.07-.413.07-.175 0-.32-.04a.8.8 0 0 1-.248-.115.58.58 0 0 1-.255-.384zM.806 13.693q0-.373.102-.633a.87.87 0 0 1 .302-.399.8.8 0 0 1 .475-.137q.225 0 .398.097a.7.7 0 0 1 .272.26.85.85 0 0 1 .12.381h.765v-.072a1.33 1.33 0 0 0-.466-.964 1.4 1.4 0 0 0-.489-.272 1.8 1.8 0 0 0-.606-.097q-.534 0-.911.223-.375.222-.572.632-.195.41-.196.979v.498q0 .568.193.976.197.407.572.626.375.217.914.217.439 0 .785-.164t.55-.454a1.27 1.27 0 0 0 .226-.674v-.076h-.764a.8.8 0 0 1-.118.363.7.7 0 0 1-.272.25.9.9 0 0 1-.401.087.85.85 0 0 1-.478-.132.83.83 0 0 1-.299-.392 1.7 1.7 0 0 1-.102-.627zm8.239 2.238h-.953l-1.338-3.999h.917l.896 3.138h.038l.888-3.138h.879z"/>
</svg>
        CSV
    </button>
</form>

                    </div>

<!-- Tabla de ventas -->
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Número solicitud</th>
                <th scope="col">Vendedor</th>
                <th scope="col">Equipo</th>
                <th scope="col">Fecha portación</th>
                <th scope='col'>Estado</th>
                <th scope="col">Días transcurridos</th>
                <th scope='col'>Fecha de carga</th>
                <th scope="col">Nombre cliente</th>
                <th scope="col">DNI</th>
                <th scope="col">CUIT</th>
                <th scope="col">Numero cliente</th>
                <th scope="col">Numero alternativo</th>
                <th scope="col">Producto</th>
                <th scope="col">Plan</th>
                <th scope="col">Acción</th>
            </tr>
        </thead>
        <tbody>
        <style>
    /* Estilos personalizados para la línea negra */
    .black-line {
        border: 3px solid black;
        margin: 20px 0; /* Margen superior e inferior para separar del contenido */
        /* Otras propiedades de estilo que desees agregar */
    }
</style>
            <?php 

           
            // Comienzo del bucle while para imprimir los datos de la tabla
            while ($row = $Result->fetch_assoc()) { ?>
             <?php
             $color = "";
             
             if($row['estadoventa'] == 'DIFERIDA AUDITORIA'){
                $color = "orange";
            }else if($row['estadoventa'] == 'PENDIENTE DE VERIFICACION'){
                $color = "yellow";
            }else if($row['estadoventa'] == 'EN PROCESO DIGIP-TN'){
                $color = "grey";
            }else if($row['estadoventa'] == 'INGRESADA TASA'){
                $color = "#00aae4";
            }
            else if($row['estadoventa'] == 'DEVUELTA X AUDITORIA' || $row['estadoventa'] == 'DEVUELTA' || $row['estadoventa'] == 'DEVUELTA X VERIFICACION' || $row['estadoventa'] == 'DEVUELTA X AUDITORIA' 
            || $row['estadoventa'] == 'DEVUELTA CARGA TASA' || $row['estadoventa'] == 'DEVUELTA X VENDEDOR' || $row['estadoventa'] == 'DEVUELTA TASA'){
                $color = "orange";
            }else if($row['estadoventa'] == 'CANCELADA' || $row['estadoventa'] == 'RECHAZO ABD' || $row['estadoventa'] == 'SOLICITUD CANCELADA'|| $row['estadoventa'] == 'PAGO DEUDA MOVI'){
                $color = "red";
            }else if($row['estadoventa'] == 'PENDIENTE CARGA TASA'){
                $color = "#00aae4";
            }else if($row['estadoventa'] == 'CUMPLIDA' || $row['estadoventa'] == 'SOLICITUD CUMPLIDA'){
                $color = "green";
            }else if($row['estadoventa'] == 'RECHAZO'){
                $color = "rgba(84, 18, 77, 0.8)";
            }
            else if($row['estadoventa'] == 'POST VENTA'){
                $color = "rgba(39, 243, 245, 0.8)";
            }else if($row['estadoventa'] == 'EN TRANSITO'){
                $color = "rgba(225, 38, 211, 1)";
}

// Imprime el mensaje emergente en una sola celda que ocupe todas las columnas
echo '<td colspan="16">';
echo '<hr class="black-line">';
echo '<tr>';
echo '<td colspan="16" style="background-color: ' . $color . '; color: black;">'; // Agregamos clases de Bootstrap para los bordes y el espaciado interno (padding)
echo '<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal' . $row['id'] . '" title="Detalle">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
</svg>
</button> Comentario: <b>' . $row['comentarios']. '</b>';
echo '</td>';
echo '</tr>';
echo '<tr>';
echo '</td>';
echo '</tr>';
echo '<td>';


?>
<div class="modal fade" id="exampleModal<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
  <form action="editarsoli" method="POST" id="formulario_soli" enctype="multipart/form-data">
    <input type="hidden" name="idredireccion" value="<?php echo $Id_foto = $row['id'];?>"> <!--Id fotos-->
    <div class="modal-content"  value="<?php echo $row['id'];?>" id="modal-content<?php echo $row['id'];?>">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Información del Cliente: <?php echo $row['nombrecliente']?></h5>
        <br>
        <?php
// Consulta principal para obtener los nombres de los vendedores
$QueryVendedores = "SELECT nombre FROM usuarios"; // Ajusta el nombre de la tabla según tu estructura
$ResultVendedores = mysqli_query($conexion, $QueryVendedores);



    // Consulta secundaria para obtener el turno del vendedor actual
    $QueryTurnos = "SELECT turno,nombre FROM usuarios WHERE nombre LIKE '%" . $row['vendedor'] . "%'";
    $ResultTurnos = mysqli_query($conexion, $QueryTurnos);

    $Turno = '';
    while ($rowTurno = $ResultTurnos->fetch_assoc()) {
        $Turno = $rowTurno['turno'];
        $Nombre = $rowTurno['nombre'];
    }
    ?>
    <h5 class="modal-title" id="exampleModalLabel">Vendedor: <?php echo $Nombre . " - Turno: " . $Turno; ?></h5>
    <?php
?>
        
        <input type="hidden" name="vendedor" value="<?php echo $row['vendedor'];?>">
        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z"/>
</svg></button>
      </div>
      <div class="modal-body">
        <!-- Pestañas nav -->
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="cliente-tab<?php echo $row['id']; ?>" data-bs-toggle="tab" data-bs-target="#cliente<?php echo $row['id']; ?>" type="button" role="tab" aria-controls="cliente" aria-selected="true">Cliente</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="producto-tab<?php echo $row['id']; ?>" data-bs-toggle="tab" data-bs-target="#producto<?php echo $row['id']; ?>" type="button" role="tab" aria-controls="producto" aria-selected="false">Producto</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="direccion-tab<?php echo $row['id']; ?>" data-bs-toggle="tab" data-bs-target="#direccion<?php echo $row['id']; ?>" type="button" role="tab" aria-controls="direccion" aria-selected="false">Dirección de Entrega</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="informacionadicional-tab<?php echo $row['id']; ?>" data-bs-toggle="tab" data-bs-target="#informacionadicional<?php echo $row['id']; ?>" type="button" role="tab" aria-controls="informacionadicional" aria-selected="false">Informacion Adicional</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="archivo-tab<?php echo $row['id']; ?>" data-bs-toggle="tab" data-bs-target="#archivo<?php echo $row['id']; ?>" type="button" role="tab" aria-controls="archivo<?php echo $row['id']; ?>" aria-selected="false">Archivos</button>
          </li>

          <!--Nuevo dato-->
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="registrodecambio-tab<?php echo $row['id']; ?>" data-bs-toggle="tab" data-bs-target="#registrodecambio<?php echo $row['id']; ?>" type="button" role="tab" aria-controls="registrodecambio<?php echo $row['id']; ?>" aria-selected="false">Registro de cambios</button>
          </li>

          <li class="nav-item" role="presentation">
            <button class="nav-link" id="chicoswpp-tab<?php echo $row['id']; ?>" data-bs-toggle="tab" data-bs-target="#chicoswpp<?php echo $row['id']; ?>" type="button" role="tab" aria-controls="mensajechicos<?php echo $row['id']; ?>" aria-selected="false">Mensaje confirmacion WPP</button>
          </li>

        </ul>
        <!-- Contenido de las pestañas -->
        <div class="tab-content" id="myTabContent<?php echo $row['id']; ?>">
          <!-- Pestaña Cliente -->
          <div class="tab-pane fade show active" id="cliente<?php echo $row['id']; ?>" role="tabpanel" aria-labelledby="cliente-tab<?php echo $row['id']; ?>">
          <input type="hidden" name="iduser" value="<?php echo $row['id']; ?>">
          <input type="hidden" name="dateload" value="<?php echo $row['fechacarga']; ?>">
          <br>
            <p>Fecha de carga: <?php echo $row['fechacarga'];?></p>
            <p>Número solicitud: <input type="text" class="form-control" name="numerosolicitud" id="" value="<?php echo $NumeroSolicitud = $row['numerosolicitud'];?>"></p>
            <p>Nombre: <input type="text" class="form-control" name="name" id="" value="<?php echo $row['nombrecliente']; ?>"></p>
            <p>Documento: <input type="text" class="form-control" name="document" id="" value="<?php echo $row['documentocliente']; ?>"> </p>
            <p>Cuit: <input type="text" class="form-control" name="cuitcliente" id="" value="<?php echo $row['cuitcliente']; ?>"> </p>
            <p>Email: <input type="email" class="form-control" name="email" id="" value="<?php echo $row['email'];?>"></p>
            <p>Fecha nacimiento cliente: <input type="date" class="form-control" name="birthdate" id="" value="<?php echo $row['fechanacimientocliente']; ?>"> </p>
            <p>Linea a portar: <input type="text" class="form-control" name="numberclient" id="" value="<?php echo $row['linea']; ?>"></p>
            <p>Numero Alternativo: <input type="text" class="form-control" name="numberalter" id="" value="<?php echo $row['numeroalternativo'];?>"></p>
            <p>Franja horaria verificación:<input type="text" class="form-control" name="verificacion" id="" value="<?php echo $row['verificacion']; ?>"></p>
            
            
            <!-- Agrega más información del cliente según sea necesario -->
          </div>
          <!-- Pestaña Producto -->
          <div class="tab-pane fade" id="producto<?php echo $row['id']; ?>" role="tabpanel" aria-labelledby="producto-tab<?php echo $row['id']; ?>">
            <!-- Agrega información del producto -->
            <p>Producto: <input type="text" class="form-control" name="product" id="" value="<?php echo $row['producto']?>"></p>
            <p>Empresa: <input type="text" class="form-control" name="empresa" id="" value="<?php echo $row['empresa']?>"></p>
            <p>Condición: <input type="text" class="form-control" name="tipo" id="" value="<?php echo $row['tipo']?>"></p>
            <?php
$planAlmacenado = $row['planes'];
?>

<p>Planes: 
    <select class="form-control" title="Producto" name="plans" aria-label="PLANES" aria-describedby="basic-addon4" size="1">
        <?php
        $opcionesProducto = array("", "3GB", "6GB", "10GB", "15GB", "25GB", "CORPO 3GB", "CORPO 5GB", "CORPO 10GB", "CORPO 15GB", "CORPO 30GB","FIBRA PYME 100","FIBRA PYME 300","FIBRA PYME 700","FIBRA PYME 1GB","FIBRA 100 MG","FIBRA 300 mg","FIBRA 500 MG","FIBRA 700 MG","FIBRA 1 GIGA"); // Agrega aquí todas las opciones necesarias
        foreach ($opcionesProducto as $opcion) {
            // Verifica si la opción actual es la que está almacenada en la base de datos
            $selected = ($opcion == $planAlmacenado) ? "selected" : "";
            echo "<option value='$opcion' $selected>$opcion</option>";
        }
        ?>
    </select>
</p>
            <p>Estado: 
    <select class="form-control" name="status" onchange="updateChangeDate(this)">
        <?php
            $opciones = array("POST VENTA","RECHAZO ABD","CANCELADA","DEVUELTA","PENDIENTE DE VERIFICACION","PENDIENTE AUDITORIA","PAGO DEUDA MOVI","INFORMADA TASA","PENDIENTE CARGA TASA","INGRESADA TASA","EN TRANSITO","EN PROCESO DIGIP-TN","DIFERIDA CARGA TASA","DEVUELTA X VERIFICACION","DEVUELTA X AUDITORIA","DEVUELTA CARGA TASA","DIFERIDA AUDITORIA","SOLICITUD CUMPLIDA","DEVUELTA X VENDEDOR","DEVUELTA TASA","SOLICITUD CANCELADA","PENDIENTE CARGA MOVISTAR","DIFERIDA CARGA MOVISTAR","PENDIENTE CARGA IRIS","DEVUELTA CARGA MOVISTAR","INGRESADA MOVISTAR"); // Agrega aquí todas las opciones necesarias
            foreach ($opciones as $opcion) {
                if ($opcion == $row['estadoventa']) {
                    echo "<option selected>$opcion</option>";
                } else {
                    echo "<option>$opcion</option>";
                }
            }
        ?>
    </select>
</p>
<input type="hidden" name="fechadecambio" id="fechadecambio" value="<?php echo date('Y-m-d');?>">

<script>
    function updateChangeDate(selectElement) {
        var selectedOption = selectElement.value; // Obtenemos el valor seleccionado del select
        var previousState = "<?php echo $row['estadoventa']; ?>"; // Estado anterior guardado en PHP
        if (selectedOption !== previousState) { // Verificar si el estado ha cambiado
            var currentDate = new Date(); // Obtenemos la fecha actual
            var formattedDate = currentDate.getFullYear() + '-' + (currentDate.getMonth() + 1) + '-' + currentDate.getDate(); // Formateamos la fecha como "YYYY-MM-DD"
            document.getElementById("fechadecambio").value = formattedDate; // Actualizamos el valor del campo oculto
        }
    }
</script>
<?php
// Realiza una consulta SQL para obtener la fecha de cambio más reciente
$query = "SELECT MAX(fechadecambio) AS ultima_fecha FROM ventas WHERE numerosolicitud LIKE '%$NumeroSolicitud%'";
$resultado = $conexion->query($query);

if ($resultado) {
    $fila = $resultado->fetch_assoc();
    $ultimaFechaCambio = $fila['ultima_fecha'];
    $fechaActual = date('Y-m-d');
    
    if ($ultimaFechaCambio !== null && $ultimaFechaCambio !== $fechaActual) {
        // Calcula la diferencia de días entre la fecha de cambio más reciente y la fecha actual
        $diferenciaDias = (strtotime($fechaActual) - strtotime($ultimaFechaCambio)) / (60 * 60 * 24);
    } else {
        $diferenciaDias = 0;
    }
    
    // Actualiza la columna dias_transcurridos en la base de datos
    $updateQuery = "UPDATE ventas SET dias_transcurridos = ? WHERE numerosolicitud LIKE '%$NumeroSolicitud%'";
    $stmt = $conexion->prepare($updateQuery);
    $stmt->bind_param("i", $diferenciaDias);
    
    if ($stmt->execute()) {
        echo "<p>Días transcurridos desde el último cambio de estado: " . $diferenciaDias . " días.</p>";
    } else {
        echo "<p>Error al actualizar los días transcurridos en la base de datos: " . $stmt->error . "</p>";
    }
    
    $stmt->close();
} else {
    // Manejar el error en caso de que la consulta falle
    echo "<p>Error al consultar la base de datos: " . $conexion->error . "</p>";
}

?>


            <p>Score: <input type="text" class="form-control" name="score" id="" value="<?php echo $row['score']; ?>"> </p>
            <p>Fecha portación: <input type="date" class="form-control" name="fechaportacion" id="" value="<?php echo $row['fechaportacion']; ?>"> </p>
            
          </div>
          <!-- Pestaña Dirección de Entrega -->
          <div class="tab-pane fade" id="direccion<?php echo $row['id']; ?>" role="tabpanel" aria-labelledby="direccion-tab<?php echo $row['id']; ?>">
            <!-- Agrega información de la dirección de entrega -->
            <p>Direccion: <input type="text" class="form-control" name="street" id="" value="<?php echo $row['calle'];?>"></p>
            <p>Número: <input type="text" class="form-control" name="number" id="" value="<?php echo $row['numero'];?>"></p>
            <p>Piso: <input type="text" class="form-control" name="piso" id="" value="<?php echo $row['piso'];?>"></p>
            <p>Depto: <input type="text" class="form-control" name="depto" id="" value="<?php echo $row['dpto'];?>"></p>
            <p>Entre Calles: <input type="text" class="form-control" name="street2" id="" value="<?php echo $row['entrecalles'];?>"></p>
            <p>Provincia: <input type="text" class="form-control" name="state" id="" value="<?php echo $row['provincia'];?>"></p>
            <p>Código Postal: <input type="text" class="form-control" name="codigopostal" id="" value="<?php echo $row['codigopostal'];?>"></p>
            <p>Localidad: <input type="text" class="form-control" name="located" id="" value="<?php echo $row['localidad'];?>"></th></p>
            <p>Coordenadas: <input type="text" class="form-control" name="latlong" id="coordenadas_porta<?php echo $row['id'];?>" value="<?php echo $row['coordenadas'];?>"></p>
            <input type="hidden" name="linkgooglemaps" value="<?php echo $row['linkgooglemaps']; ?>">
            <p>Link Google Maps: <input type="text" class="form-control" name="linkgooglemaps" id="" value="<?php echo $row['linkgooglemaps'];?>"></p>
            <p>Google Maps: <a href="<?php echo $row['linkgooglemaps'];?>" target="_blank"><?php echo $row['calle']; ?></a></p>
          </div>
          <div class="tab-pane fade" id="informacionadicional<?php echo $row['id']; ?>" role="tabpanel" aria-labelledby="informacionadicional-tab<?php echo $row['id']; ?>">
            <!-- Agrega información de la dirección de entrega -->
            <p>TC: <input type="text" class="form-control" name="creditcard" id="" value="<?php echo $row['tarjetacredito'];?>"></p>
            <p>Central: <input type="text" class="form-control" name="central" id="" value="<?php echo $row['central'];?>"></p>
            <p>Manzana registro: <input type="text" class="form-control" name="registred" id="" value="<?php echo $row['manzanaregistro'];?>"></p>
            <p>PIN: <input type="text" class="form-control" name="pin" id="pin"value="<?php echo $row['pin'];?>"></p>
            <p>Fecha vencimiento: <input type="date" class="form-control" name="fechavencimiento" id="fechavencimiento" value="<?php echo $row['fechavencimiento'];?>"></p>
            <p>Comentarios:</p>
<textarea name="comments" class="form-control" id="" cols="90" rows="5"><?php echo $row['comentarios'];?></textarea>
      
          </div>

          
          <div class="tab-pane fade" id="archivo<?php echo $row['id']; ?>" role="tabpanel" aria-labelledby="archivo-tab<?php echo $row['id']; ?>">
          <?php
// Consulta para obtener los archivos asociados a una venta específica
$query_documentos = "
    SELECT a.nombre_archivo
    FROM ventas v
    LEFT JOIN archivos a ON v.id = a.venta_id
    WHERE v.documentocliente = '" . $row['documentocliente'] . "' 
      AND v.linea = '" . $row['linea'] . "'
";
$result_documentos = mysqli_query($conexion, $query_documentos);

while ($row_documento = mysqli_fetch_assoc($result_documentos)) {
    $archivo = $row_documento['nombre_archivo'];
    $extension = strtolower(pathinfo($archivo, PATHINFO_EXTENSION)); // Obtener la extensión del archivo

    echo '<br><br>';
    // Verificar si es una imagen
    if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'jfif'])) {
        echo '<a download="./archivos/' . $archivo . '" href="./archivos/' . $archivo . '">';
        echo '<img class="form-control" src="./archivos/' . $archivo . '" style="width: 250px; height: 150px;">';
        echo '</a>';
    }
    // Verificar si es un PDF
    elseif ($extension === 'pdf') {
        echo '<a download="./archivos/' . $archivo . '" href="./archivos/' . $archivo . '">';
        echo '<iframe src="./archivos/' . $archivo . '" style="width:550px; height:450px;" frameborder="0"></iframe>';
        echo '</a>';
    }
    if (empty($archivo)) {
        echo '<br>';
    } else {
        echo '<br>';
        echo '<input type="hidden" name="id-soli" value="'. $row['id'].'">';
        echo '<a class="btn btn-danger" href="borrarfoto?foto=' . $archivo . '&id-soli='.$row['id'].'">Eliminar</a>';
    }
}
echo '<br><br><label for="archivos">Archivos:</label>';
echo '<input type="file" name="archivos[]" multiple><br>'; // Asegúrate de agregar corchetes [] al nombre del input para admitir múltiples archivos
echo '</div>';

?>
<div class="tab-pane fade" id="registrodecambio<?php echo $row['id']; ?>" role="tabpanel" aria-labelledby="registrodecambio-tab<?php echo $row['id']; ?>">

    <!-- Agrega información del cambio -->
    <div style="max-height: 300px; overflow-y: auto;"> <!-- Estilo para la barra de desplazamiento -->
        <?php
        // Consulta para obtener el último cambio registrado para esta solicitud
        $query_cambios = "SELECT * FROM cambios_solicitud WHERE id_solicitud = " . $row['id'] . " ORDER BY fecha ASC";
        $resultado_cambios = mysqli_query($conexion, $query_cambios);

        // Verificar si se encontraron cambios
        if (mysqli_num_rows($resultado_cambios) > 0) {
            while ($cambio = mysqli_fetch_assoc($resultado_cambios)) {
                echo "<p>Usuario: <b>{$cambio['usuario']}</b></p>";
                echo "<p>Fecha: <b>{$cambio['fecha']}</b></p>";
                echo "<p>Hora: <b>{$cambio['hora']}</b></p>";
                
                // Dividir la cadena de cambios en partes separadas por coma
                $cambios = explode(',', $cambio['cambios_realizados']);
                
                // Imprimir cada parte en una línea separada
                foreach ($cambios as $cambio_parte) {
                    echo "<p>Cambio registrado: $cambio_parte</p>";
                }
                
                echo "<hr>"; // Añade una línea divisoria entre cada registro
            }
        } else {
            echo "<p>No se encontraron registros de cambios para esta solicitud.</p>";
        }
        ?>
    </div>
</div>

<div class="tab-pane fade" id="chicoswpp<?php echo $row['id']; ?>" role="tabpanel" aria-labelledby="chicoswpp-tab<?php echo $row['id']; ?>">
<p>Te comparto la información para verificar los datos ingresados al sistema</p>
<p>DNI: <?php echo $row['documentocliente']; ?></p>
<p>CUIT: <?php echo $row['cuitcliente']; ?></p>
<p>FN: <?php echo $row['fechanacimientocliente'];?></p>
<p>Correo: <?php echo $row['email']; ?></p>
<p>Calle: <?php echo $row['calle']; ?></p>
<p>Altura: <?php echo $row['numero']; ?></p>
<p>Localidad: <?php echo $row['localidad'];?></p>
<p>CP: <?php echo $row['codigopostal'];?></p>
<p>Número: <?php echo $row['numeroalternativo'];?></p>
<p>Línea a portar: <?php echo $row['linea']; ?></p>
<p>Plan: <?php echo $row['planes']; ?></p>
</div>
</div>
      
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick="reloadPage()">Cerrar</button>
        <button type="submit" class="btn btn-success" title="Guardar">Guardar</button>
      </div>
      </form>
      <div id="resultado"></div>
    </div>
 
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->

<script>

     // Función para obtener el último tiempo de ejecución
     function getLastExecutionTime() {
            return localStorage.getItem('lastExecutionTime');
        }

        // Función para actualizar el último tiempo de ejecución
        function setLastExecutionTime(time) {
            localStorage.setItem('lastExecutionTime', time);
        }

        // Función para ejecutar la solicitud AJAX
        function executeUpdate() {
            const xhr = new XMLHttpRequest();
            xhr.open("GET", "diastranscurridos.php", true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    console.log(xhr.responseText);
                    setLastExecutionTime(Date.now());
                } else {
                    console.error("Error al ejecutar la actualización");
                }
            };
            xhr.send();
        }

        // Función para verificar si ha pasado un día desde la última ejecución
        function checkAndUpdate() {
            const lastExecutionTime = getLastExecutionTime();
            const currentTime = Date.now();
            const oneDay = 24 * 60 * 60 * 1000;

            if (!lastExecutionTime || (currentTime - lastExecutionTime) > oneDay) {
                executeUpdate();
            }
        }

        // Ejecutar la verificación al cargar la página
        window.onload = function() {
            checkAndUpdate();
            // Comprobar cada hora si ha pasado un día
            setInterval(checkAndUpdate, 60 * 60 * 1000);
        };

      function reloadPage() {
        location.reload();
    }
   
</script>

  </div>
</div>  
                <td><?php echo $row['numerosolicitud'];?></td>
                <td><?php echo $row['vendedor'];?></td>
                <td><?php if($row['equipo'] == 'RODRIGO'){echo "<b>VXT</b>";}else{echo '<b>'.$row['equipo'].'</b>';}?></td>
                <td><?php if(empty($row['fechaportacion'])){echo "Aún sin fecha de portación.";}else{echo $fecha_invertida = date('d-m-Y', strtotime($row['fechaportacion']));} ?></td>
                <td><?php echo'<b><span style="color: black;">'.$row['estadoventa'].'</span></b>';?></td>
                <td><?php if($row['estadoventa'] == 'SOLICITUD CUMPLIDA'){echo "<b>Sin cambio de estado</b>";}else{
// Realiza una consulta SQL para obtener la fecha de cambio más reciente
$query = "SELECT MAX(fechadecambio) AS ultima_fecha FROM ventas WHERE numerosolicitud LIKE '%$NumeroSolicitud%'";
$resultado = $conexion->query($query);

if ($resultado) {
    $fila = $resultado->fetch_assoc();
    $ultimaFechaCambio = $fila['ultima_fecha'];
    $fechaActual = date('Y-m-d');
    
    if ($ultimaFechaCambio !== null && $ultimaFechaCambio !== $fechaActual) {
        // Calcula la diferencia de días entre la fecha de cambio más reciente y la fecha actual
        $diferenciaDias = (strtotime($fechaActual) - strtotime($ultimaFechaCambio)) / (60 * 60 * 24);
    } else {
        $diferenciaDias = 0;
    }
    
    // Actualiza la columna dias_transcurridos en la base de datos
    $updateQuery = "UPDATE ventas SET dias_transcurridos = ? WHERE numerosolicitud LIKE '%$NumeroSolicitud%'";
    $stmt = $conexion->prepare($updateQuery);
    $stmt->bind_param("i", $diferenciaDias);
    
    if ($stmt->execute()) {
        echo "<p>Días transcurridos desde el último cambio de estado: " . $diferenciaDias . " días.</p>";
    } else {
        echo "<p>Error al actualizar los días transcurridos en la base de datos: " . $stmt->error . "</p>";
    }
    
    $stmt->close();
} else {
    // Manejar el error en caso de que la consulta falle
    echo "<p>Error al consultar la base de datos: " . $conexion->error . "</p>";
}}?></td>
                <td><?php $fecha_invertida = date('d-m-Y', strtotime($row['fechacarga'])); echo $fecha_invertida;?></td>
                <td><?php echo $row['nombrecliente'];?></td>
                <td><?php echo $row['documentocliente'];?></td>
                <td><?php echo $row['cuitcliente'];?></td>
                <?php if($row['producto'] == 'FIBRA'){?>
                <td></td>
                <td></td>
              <?php }else{?>
                <td><?php echo $row['linea']; ?></td>
                <td><?php echo $row['numeroalternativo'];?></td>
                <?php } ?>
                <td><?php echo $row['producto']?></td>
                <td><?php echo $row['planes'];?></td>
                <td>
    <a href="#" title="Eliminar" onclick="mostrarModal(event, <?php echo $row['id']; ?>, '<?php echo $row['documentocliente']; ?>', '<?php echo $row['linea']; ?>','<?php echo $row['equipo'];?>')">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash2-fill" viewBox="0 0 16 16">
            <path d="M2.037 3.225A.7.7 0 0 1 2 3c0-1.105 2.686-2 6-2s6 .895 6 2a.7.7 0 0 1-.037.225l-1.684 10.104A2 2 0 0 1 10.305 15H5.694a2 2 0 0 1-1.973-1.671zm9.89-.69C10.966 2.214 9.578 2 8 2c-1.58 0-2.968.215-3.926.534-.477.16-.795.327-.975.466.18.14.498.307.975.466C5.032 3.786 6.42 4 8 4s2.967-.215 3.926-.534c.477-.16.795-.327.975-.466-.18-.14-.498-.307-.975-.466z"/>
        </svg>
    </a>
</td>
</tr>
<div class="modal" id="confirmarEliminarModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><b>Confirmar eliminación</b></h5>
                <button type="button" class="btn btn-outline-danger" onclick="recargarPagina()" data-bs-dismiss="modal" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z"/>
</svg></button>
            </div>
            <div class="modal-body">
                <b>¿Está seguro de que desea eliminar la solicitud <?php echo $row['numerosolicitud'];?>?</b>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn btn-danger" data-bs-dismiss="modal" onclick="recargarPagina()">No</button>
                <button type="button" class="btn btn-success" id="confirmarEliminar">Sí</button>
            </div>
        </div>
    </div>
</div>

<script>
    function mostrarModal(event, id, documentocliente, linea, equipo) {
        event.preventDefault(); // Prevenir el comportamiento predeterminado del enlace

        // Asignar los valores de la solicitud al modal
        document.getElementById('confirmarEliminar').onclick = function() {
            // Redirigir a la página de eliminación si el usuario confirma
            window.location.href = 'ventaseliminadas?id=' + id + '&documentocliente=' + documentocliente + '&linea=' + linea + '&equipo=' + equipo;
        };

        // Mostrar el modal
        var modal = new bootstrap.Modal(document.getElementById('confirmarEliminarModal'));
        modal.show();
    }

    function recargarPagina() {
        location.reload();
    }
</script>
           <input type="hidden" name="estado" value="<?php $estado = $row['estadoventa'];?>">
           <input type="hidden" name="vendedor" value="<?php $vendedor = $row['vendedor'];?>">
            <?php
        }
        ?>
        </tbody>
    </table>
</div>
<div class="pagination-control">
    <ul class="pagination">
        <?php
        // Calcular el número total de páginas considerando los filtros aplicados
        $whereClause = "equipo LIKE '%RODRIGO%'";

        // Filtros de búsqueda
        if (!empty($_GET["estado"])) {
            $estados = $_GET["estado"];
            $estadoClause = "(";
            foreach ((array)$estados as $estado) {
                $estadoClause .= "estadoventa LIKE '%$estado%' OR ";
            }
            $estadoClause = rtrim($estadoClause, " OR ");
            $estadoClause .= ")";
            $whereClause .= " AND " . $estadoClause;
        }

        if (!empty($_GET["vendedor"])) {
            $vendedor = $_GET["vendedor"];
            $whereClause .= " AND vendedor LIKE '%$vendedor%'";
        }

        if (!empty($_GET["fecha"])) {
            $fecha = $_GET["fecha"];
            $whereClause .= " AND fechacarga LIKE '%$fecha%'";
        }

        if (!empty($_GET["fechaportaciondesde"]) && !empty($_GET["fechaportacionhasta"])) {
            $fechaportaciondesde = $_GET["fechaportaciondesde"];
            $fechaportacionhasta = $_GET["fechaportacionhasta"];
            $whereClause .= " AND fechaportacion BETWEEN '$fechaportaciondesde' AND '$fechaportacionhasta'";
        }

        if (!empty($_GET["numeroventa"])) {
            $numeroventa = $_GET["numeroventa"];
            $whereClause .= " AND numeroventa = '$numeroventa'";
        }

        // Contar el total de registros con los filtros aplicados
        $total_query = "SELECT COUNT(*) AS total FROM ventas WHERE $whereClause";
        $total_result = mysqli_query($conexion, $total_query);
        $total_row = mysqli_fetch_assoc($total_result);
        $total_registros = $total_row['total'];
        $total_paginas = ceil($total_registros / $registros_por_pagina);

        // Reconstruir los parámetros para la URL
        $estado_param = '';
        if (!empty($_GET["estado"])) {
            foreach ((array)$_GET["estado"] as $estado) {
                $estado_param .= 'estado[]=' . urlencode($estado) . '&';
            }
        }

        $vendedor_param = !empty($_GET["vendedor"]) ? 'vendedor=' . urlencode($_GET["vendedor"]) . '&' : '';
        $numeroventa_param = !empty($_GET["numeroventa"]) ? 'numeroventa=' . urlencode($_GET["numeroventa"]) . '&' : '';
        $fecha_param = !empty($_GET["fecha"]) ? 'fecha=' . urlencode($_GET["fecha"]) . '&' : '';
        $fechaportaciondesde_param = !empty($_GET["fechaportaciondesde"]) ? 'fechaportaciondesde=' . urlencode($_GET["fechaportaciondesde"]) . '&' : '';
        $fechaportacionhasta_param = !empty($_GET["fechaportacionhasta"]) ? 'fechaportacionhasta=' . urlencode($_GET["fechaportacionhasta"]) . '&' : '';

        // Mostrar botón de página anterior si no está en la primera página
        if ($pagina_actual > 1) {
            echo '<li class="page-item"><a class="page-link" href="?pagina=' . ($pagina_actual - 1) . '&' . $estado_param . $vendedor_param . $numeroventa_param . $fecha_param . $fechaportaciondesde_param . $fechaportacionhasta_param . '">Anterior</a></li>';
        }

        // Mostrar números de página
        for ($i = 1; $i <= $total_paginas; $i++) {
            echo '<li class="page-item ' . ($i == $pagina_actual ? 'active' : '') . '"><a class="page-link" href="?pagina=' . $i . '&' . $estado_param . $vendedor_param . $numeroventa_param . $fecha_param . $fechaportaciondesde_param . $fechaportacionhasta_param . '">' . $i . '</a></li>';
        }

        // Mostrar botón de página siguiente si no está en la última página
        if ($pagina_actual < $total_paginas) {
            echo '<li class="page-item"><a class="page-link" href="?pagina=' . ($pagina_actual + 1) . '&' . $estado_param . $vendedor_param . $numeroventa_param . $fecha_param . $fechaportaciondesde_param . $fechaportacionhasta_param . '">Siguiente</a></li>';
        }
        ?>
    </ul>
</div>

<style>
.pagination {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    padding: 0;
    list-style: none;
}

.pagination .page-item {
    margin: 5px;
}

.pagination .page-link {
    display: block;
    padding: 0.5rem 0.75rem;
    margin-left: -1px;
    line-height: 1.25;
    color: #007bff;
    background-color: #fff;
    border: 1px solid #dee2e6;
    text-decoration: none;
}

.pagination .page-link:hover {
    color: #0056b3;
    background-color: #e9ecef;
    border-color: #dee2e6;
}

.pagination .active .page-link {
    z-index: 1;
    color: #fff;
    background-color: #007bff;
    border-color: #007bff;
}

@media (max-width: 768px) {
    .pagination .page-item {
        flex: 1 1 auto;
        margin: 2px;
    }

    .pagination .page-link {
        padding: 0.4rem 0.6rem;
    }
}
</style>

</form>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

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
                        <span aria-hidden="true">X</span>
                    </button>
                </div>
                <div class="modal-body">Selecciona Cerrar sesión para salir o cancelar para permanecer en esta página.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="cerrar">Cerrar sesion</a>
                </div>
            </div>
        </div>
    </div>

 
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!--<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>-->

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