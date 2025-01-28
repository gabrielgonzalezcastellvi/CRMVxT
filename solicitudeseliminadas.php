<!DOCTYPE html>
<html lang="es">
<?php  session_start(); 
$Equipo = $_SESSION['equipo'];
error_reporting(0);
?>
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
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                
                </div>
                <div class="mr-2 d-none d-lg-inline text-black-600 small"><?php echo 'Bienvenid@ '.$_SESSION['Nombre'];?></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <?php 
if($Equipo == 'ASM'){
    require 'menuasm.php';
}else{
    require 'menu.php';
}
?>


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
                    <div class="container-fluid">
                    <form class="form-inline" method="GET" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="row align-items-center">
    <div class="col-md-2 mr-2">
        <input type="text" class="form-control bg-light border-0 small" title="Numero solicitud" name="numerosolicitud" placeholder="N Soli" aria-label="Buscar por número solicitud" aria-describedby="basic-addon2">
    </div>
    <div class="col-md-2 mr-2">
        <input type="text" class="form-control bg-light border-0 small" title="Numero linea" name="numerolinea" placeholder="Línea" aria-label="Buscar por número de línea" aria-describedby="basic-addon3">
    </div>
    <div class="col-md-2 mr-2">
        <input type="text" class="form-control bg-light border-0 small" title="DNI" name="dni" placeholder="DNI" aria-label="Buscar por DNI" aria-describedby="basic-addon4">
    </div>
    <div class="col-md-2 mr-2">
    <select class="form-control" name="estado">
  <?php
    $opciones = array("","POST VENTA","RECHAZO ABD","CANCELADA","DEVUELTA","PENDIENTE DE VERIFICACION","PENDIENTE AUDTORIA","INFORMADA TASA","PENDIENTE CARGA TASA","INGRESADA TASA","EN TRANSITO","EN PROCESO DIGIP-TN","DIFERIDA CARGA TASA","DEVUELTA X VERIFICACION","DEVUELTA X AUDITORIA","DEVUELTA CARGA TASA","DIFERIDA AUDITORIA","CUMPLIDA","DEVUELTA POR VENDEDOR","DEVUELTA TASA","SOLICITUD CANCELADA","PENDIENTE CARGA MOVISTAR","DIFERIDA CARGA MOVISTAR","PENDIENTE CARGA IRIS","DEVUELTA CARGA MOVISTAR","INGRESADA MOVISTAR"); // Agrega aquí todas las opciones necesarias
    foreach ($opciones as $opcion) {
      if ($opcion == $row['estadoventa']) {
        echo "<option selected>$opcion</option>";
      } else {
        echo "<option>$opcion</option>";
      }
    }
  ?>
</select>
    </div>
    <div class="col-md-2 mr-2">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" title="Vendedor" name="vendedor" placeholder="Vendedor" aria-label="Buscar por vendedor" aria-describedby="basic-addon4">
                    <div class="input-group-append">
                        <button class="btn btn-primary m2-2" type="submit">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </div>
   
</div>

</form>
    </div>
<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
   // Verificar si se envió el formulario
   if(isset($_GET["numerosolicitud"]) || isset($_GET["numerolinea"]) || isset($_GET["dni"]) || isset($_GET["estado"]) || isset($_GET["vendedor"])) {
    // Recuperar los datos del formulario
    $numerosolicitud = $_GET["numerosolicitud"];
    $numerolinea = $_GET["numerolinea"];
    $dni = $_GET["dni"];
    $estado = $_GET["estado"];
    $vendedor = $_GET["vendedor"];
   }
    // Puedes utilizar $numerosolicitud, $numerolinea y $dni en tu consulta SQL
    // También puedes ejecutar tu consulta SQL aquí y mostrar los resultados
}

?>
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
                <?php
date_default_timezone_set('America/Argentina/Mendoza');
require 'conexion.php';
$Vendedor = $_SESSION['Nombre'];
// Configuración de la paginación
$registros_por_pagina = 20; // Número de registros a mostrar por página
$pagina_actual = isset($_GET['pagina']) ? $_GET['pagina'] : 1; // Página actual, por defecto 1

// Calcular el offset para la consulta SQL
$offset = ($pagina_actual - 1) * $registros_por_pagina;


// Consulta SQL con LIMIT y OFFSET

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $whereClause = "";

      // Verificar si se proporcionó un número de solicitud
      if (!empty($_GET["estado"])) {
        $estado = $_GET["estado"];
        $whereClause .= "estadoventa LIKE '%$estado%' AND ";
    }

    // Verificar si se proporcionó un número de solicitud
    if (!empty($_GET["numerosolicitud"])) {
        $numerosolicitud = $_GET["numerosolicitud"];
        $whereClause .= "numerosolicitud = '$numerosolicitud' AND ";
    }

    // Verificar si se proporcionó un número de línea
    if (!empty($_GET["numerolinea"])) {
        $numerolinea = $_GET["numerolinea"];
        $whereClause .= "linea = '$numerolinea' AND ";
    }

    // Verificar si se proporcionó un DNI
    if (!empty($_GET["dni"])) {
        $dni = $_GET["dni"];
        $whereClause .= "documentocliente = '$dni' AND ";
    }

      // Verificar por nombre de vendedor
      if (!empty($_GET["vendedor"])) {
        $vendedor = $_GET["vendedor"];
        $whereClause .= "vendedor LIKE '%$vendedor%' AND ";
    }

      // Verificar por nombre de vendedor y estado venta
      if (!empty($_GET["vendedor"]) && !empty($_GET["estadoventa"])) {
        $vendedor = $_GET["vendedor"];
        $estado = $_GET["estadoventa"];
        $whereClause .= "vendedor LIKE '%$vendedor%' AND estadoventa LIKE '%$estado%' AND ";
    }

    // Verificar por nombre de vendedor,estado venta y numero de solicitud
    if (!empty($_GET["vendedor"]) && !empty($_GET["estadoventa"]) && !empty($_GET["numerosolicitud"])) {
        $vendedor = $_GET["vendedor"];
        $estado = $_GET["estadoventa"];
        $numerosolicitud = $_GET["numerosolicitud"];
        $whereClause .= "vendedor = '$vendedor' AND estadoventa = '$estado' AND numerosolicitud LIKE '%$numerosolicitud%' AND ";
    }

    // Eliminar el "AND" adicional al final de la cláusula WHERE si está presente
    $whereClause = rtrim($whereClause, " AND ");

    // Construir la consulta SQL
if($Equipo != 'RODRIGO' && $Equipo != 'ADMINISTRACION'){
    $Query = "SELECT * FROM ventaseliminadas WHERE equipo LIKE '%$Equipo%'";
    $Query5 = "SELECT COUNT(DISTINCT linea, documentocliente,vendedor) as TotalBusqueda FROM ventaseliminadas WHERE equipo LIKE '%$Equipo%'";
}else{
    $Query = "SELECT * FROM ventaseliminadas";
    $Query5 = "SELECT COUNT(DISTINCT linea, documentocliente,vendedor) as TotalBusqueda FROM ventaseliminadas";
}
    

    if (!empty($whereClause)) {
        $Query .= " WHERE $whereClause";
        $Query5 .= " WHERE $whereClause";
    }

    $Query .= " GROUP BY documentocliente, linea,vendedor ORDER BY id DESC LIMIT $registros_por_pagina OFFSET $offset";

    $Query5 .= " ORDER BY id DESC LIMIT $registros_por_pagina OFFSET $offset";

} else {

    if($Equipo != 'RODRIGO' && $Equipo != 'ADMINISTRACION'){
        $Query = "SELECT * FROM ventaseliminadas WHERE equipo LIKE '%$Equipo%' ORDER BY id DESC LIMIT $registros_por_pagina OFFSET $offset";
        $Query5 = "SELECT COUNT(DISTINCT linea,documentocliente) as TotalBusqueda FROM ventaseliminadas WHERE equipo LIKE '%$Equipo%' ORDER BY id DESC LIMIT $registros_por_pagina OFFSET $offset";
    }else{
        $Query = "SELECT * FROM ventaseliminadas ORDER BY id DESC LIMIT $registros_por_pagina OFFSET $offset";
        $Query5 = "SELECT COUNT(DISTINCT linea,documentocliente) as TotalBusqueda FROM ventaseliminadas ORDER BY id DESC LIMIT $registros_por_pagina OFFSET $offset";
    }

}

if($Equipo != 'RODRIGO' && $Equipo != 'ADMINISTRACION'){
    $Query2 = "SELECT * FROM ventaseliminadas WHERE equipo LIKE '$Equipo' GROUP BY documentocliente,linea ORDER BY id DESC";
    $Query3 = "SELECT COUNT(DISTINCT linea, documentocliente,vendedor) as total FROM ventaseliminadas WHERE equipo LIKE '&$Equipo&'";
}else{
    $Query2 = "SELECT * FROM ventaseliminadas GROUP BY documentocliente,linea ORDER BY id DESC";
    $Query3 = "SELECT COUNT(DISTINCT linea, documentocliente,vendedor) as total FROM ventaseliminadas";
}

$Result = mysqli_query($conexion, $Query);
$Result3 = mysqli_query($conexion, $Query3);
$Result5 = mysqli_query($conexion, $Query5);

$TotalBusqueda = "";
while($row5 = $Result5 -> fetch_assoc()){
        $TotalBusqueda = $row5['TotalBusqueda'];
}



while($row = $Result3 -> fetch_assoc()){
     $Total = $row['total'];
}


?>
                
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h2 class="h3 mb-0 text-gray-800">Total solicitudes de venta eliminadas:  <b><?php echo $Total; ?></b></h2>
                        <h2 class="h3 mb-0 text-gray-800">Total resultado busqueda eliminadas:  <b><?php echo $TotalBusqueda; ?></b></h2>
                       <!-- <form method="GET" action="pdf.php">
                        <input type="hidden" name="consulta" value="<?php echo base64_encode($Query2); ?>">
                        <input type="submit" value="Generar PDF de ventaseliminadas" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                </form> -->
                                <form method="POST" action="csv.php">
    <input type="hidden" name="consulta" value="<?php echo base64_encode($Query); ?>">
    <button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" title="Generar reporte">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filetype-csv" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5zM3.517 14.841a1.13 1.13 0 0 0 .401.823q.195.162.478.252.284.091.665.091.507 0 .859-.158.354-.158.539-.44.187-.284.187-.656 0-.336-.134-.56a1 1 0 0 0-.375-.357 2 2 0 0 0-.566-.21l-.621-.144a1 1 0 0 1-.404-.176.37.37 0 0 1-.144-.299q0-.234.185-.384.188-.152.512-.152.214 0 .37.068a.6.6 0 0 1 .246.181.56.56 0 0 1 .12.258h.75a1.1 1.1 0 0 0-.2-.566 1.2 1.2 0 0 0-.5-.41 1.8 1.8 0 0 0-.78-.152q-.439 0-.776.15-.337.149-.527.421-.19.273-.19.639 0 .302.122.524.124.223.352.367.228.143.539.213l.618.144q.31.073.463.193a.39.39 0 0 1 .152.326.5.5 0 0 1-.085.29.56.56 0 0 1-.255.193q-.167.07-.413.07-.175 0-.32-.04a.8.8 0 0 1-.248-.115.58.58 0 0 1-.255-.384zM.806 13.693q0-.373.102-.633a.87.87 0 0 1 .302-.399.8.8 0 0 1 .475-.137q.225 0 .398.097a.7.7 0 0 1 .272.26.85.85 0 0 1 .12.381h.765v-.072a1.33 1.33 0 0 0-.466-.964 1.4 1.4 0 0 0-.489-.272 1.8 1.8 0 0 0-.606-.097q-.534 0-.911.223-.375.222-.572.632-.195.41-.196.979v.498q0 .568.193.976.197.407.572.626.375.217.914.217.439 0 .785-.164t.55-.454a1.27 1.27 0 0 0 .226-.674v-.076h-.764a.8.8 0 0 1-.118.363.7.7 0 0 1-.272.25.9.9 0 0 1-.401.087.85.85 0 0 1-.478-.132.83.83 0 0 1-.299-.392 1.7 1.7 0 0 1-.102-.627zm8.239 2.238h-.953l-1.338-3.999h.917l.896 3.138h.038l.888-3.138h.879z"/>
</svg>
        CSV
    </button>
</form>

                    </div>

<!-- Tabla de ventaseliminadas -->
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Info</th>
                <th scope="col">Número solicitud</th>
                <th scope="col">Vendedor</th>
                <th scope="col">Equipo</th>
                <th scope="col">Fecha Portación</th>
                <th scope='col'>Estado</th>
                <th scope='col'>Fecha de carga</th>
                <th scope="col">Nombre Cliente</th>
                <th scope="col">DNI</th>
                <th scope="col">Numero Cliente</th>
                <th scope="col">Numero Alternativo</th>
                <th scope="col">Producto</th>
                <th scope="col">Acción</th>
            </tr>
        </thead>
        <tbody>
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
            }else if($row['estadoventa'] == 'DEVUELTA X AUDITORIA' || $row['estadoventa'] == 'DEVUELTA' || $row['estadoventa'] == 'DEVUELTA X VERIFICACION' || $row['estadoventa'] == 'DEVUELTA X AUDITORIA' 
            || $row['estadoventa'] == 'DEVUELTA CARGA TASA' || $row['estadoventa'] == 'DEVUELTA X VENDEDOR' || $row['estadoventa'] == 'DEVUELTA TASA'){
                $color = "orange";
            }else if($row['estadoventa'] == 'CANCELADA' || $row['estadoventa'] == 'RECHAZO ABD'){
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
            }

// Imprime el mensaje emergente en una sola celda que ocupe todas las columnas

echo '<tr colspan="13" class="color" style="background-color: ' . $color . '; !important; color: black;">';
echo '<td colspan="13" class="color" style="background-color: ' . $color . '; !important; color: black;">';
echo '<div class="color" style="background-color: ' . $color . '; !important; color: black;"">';
echo '<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal' . $row['id'] . '" title="Detalle">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
</svg>
</button> Comentario: <b>' . $row['comentarios']. '</b>';
echo '</div>';
echo '</td>';
echo '</tr>';
echo '<td>';


?>
<div class="modal fade" id="exampleModal<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
  <form action="#" method="POST" id="formulario_soli" enctype="multipart/form-data">
    <input type="hidden" name="idredireccion" value="<?php echo $row['id'];?>">
    <div class="modal-content"  value="<?php echo $row['id'];?>" id="modal-content<?php echo $row['id'];?>">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Información del Cliente: <?php echo $row['nombrecliente']?></h5>
        <br>
        <h5 class="modal-title" id="exampleModalLabel">Vendedor: <?php echo $row['vendedor']?></h5>
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
        </ul>
        <!-- Contenido de las pestañas -->
        <div class="tab-content" id="myTabContent<?php echo $row['id']; ?>">
          <!-- Pestaña Cliente -->
          <div class="tab-pane fade show active" id="cliente<?php echo $row['id']; ?>" role="tabpanel" aria-labelledby="cliente-tab<?php echo $row['id']; ?>">
          <input type="hidden" name="iduser" value="<?php echo $row['id']; ?>">
            <p>Fecha de carga: <?php echo $row['fechacarga'];?></p>
            <p>Número solicitud: <?php echo $row['numerosolicitud'];?></p>
            <p>Nombre: <?php echo $row['nombrecliente']; ?></p>
            <p>Documento: <?php echo $row['documentocliente']; ?></p>
            <p>Cuit: <?php echo $row['cuitcliente']; ?></p>
            <p>Email: <?php echo $row['email'];?></p>
            <p>Fecha nacimiento cliente: <?php echo $row['fechanacimientocliente']; ?></p>
            <p>Linea a portar: <?php echo $row['linea']; ?></p>
            <p>Numero Alternativo: <?php echo $row['numeroalternativo'];?></p>
            <p>Franja horaria verificación: <?php echo $row['verificacion'];?></p>
            
            
            <!-- Agrega más información del cliente según sea necesario -->
          </div>
          <!-- Pestaña Producto -->
          <div class="tab-pane fade" id="producto<?php echo $row['id']; ?>" role="tabpanel" aria-labelledby="producto-tab<?php echo $row['id']; ?>">
            <!-- Agrega información del producto -->
            <p>Producto: <?php echo $row['producto']?></p>
            <p>Empresa: <?php echo $row['empresa']?></p>
            <p>Condición: <?php echo $row['tipo']?></p>
            <p>Planes: <?php echo $row['planes']?></p>
            <p>Estado: 
            <select class="form-control" name="status">
  <?php
    $opciones = array("POST VENTA","RECHAZO ABD","CANCELADA","DEVUELTA","PENDIENTE DE VERIFICACION","PENDIENTE AUDTORIA","INFORMADA TASA","PENDIENTE CARGA TASA","INGRESADA TASA","EN TRANSITO","EN PROCESO DIGIP-TN","DIFERIDA CARGA TASA","DEVUELTA X VERIFICACION","DEVUELTA X AUDITORIA","DEVUELTA CARGA TASA","DIFERIDA AUDITORIA","SOLICITUD CUMPLIDA","DEVUELTA POR VENDEDOR","DEVUELTA TASA","SOLICITUD CANCELADA","PENDIENTE CARGA MOVISTAR","DIFERIDA CARGA MOVISTAR","PENDIENTE CARGA IRIS","DEVUELTA CARGA MOVISTAR","INGRESADA MOVISTAR"); // Agrega aquí todas las opciones necesarias
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
            <p>Score: <?php echo $row['score']; ?></p>
            <p>Fecha portación: <?php echo $row['fechaportacion']; ?></p>
            
          </div>
          <!-- Pestaña Dirección de Entrega -->
          <div class="tab-pane fade" id="direccion<?php echo $row['id']; ?>" role="tabpanel" aria-labelledby="direccion-tab<?php echo $row['id']; ?>">
            <!-- Agrega información de la dirección de entrega -->
            <p>Direccion: <?php echo $row['calle']?></p>
            <p>Número: <?php echo $row['numero']?></p>
            <p>Piso: <?php echo $row['piso']?></p>
            <p>Depto: <?php echo $row['dpto']?></p>
            <p>Entre Calles: <?php echo $row['entrecalles']?></p>
            <p>Provincia: <?php echo $row['provincia']?></p>
            <p>Código Postal: <?php echo $row['codigopostal']?></p>
            <p>Localidad: <?php echo $row['localidad']?></th></p>
            <p>Coordenadas: <?php echo $row['coordenadas']?></p>
            <input type="hidden" name="linkgooglemaps" value="<?php echo $row['linkgooglemaps']; ?>">
            <p>Link Google Maps: <input type="text" class="form-control" name="" id="" value="<?php echo $row['linkgooglemaps']?>" disabled></p>
            <p>Google Maps: <a href="<?php echo $row['linkgooglemaps'];?>" target="_blank"><?php echo $row['calle']; ?></a></p>
            

          </div>
          <div class="tab-pane fade" id="informacionadicional<?php echo $row['id']; ?>" role="tabpanel" aria-labelledby="informacionadicional-tab<?php echo $row['id']; ?>">
            <!-- Agrega información de la dirección de entrega -->
            <p>TC: <?php echo $row['tarjetacredito']?></p>
            <p>Central: <?php echo $row['central']?></p>
            <p>Manzana registro: <?php echo $row['manzanaregistro']?></p>
            <p>Comentarios:</p>
            <?php echo $row['comentarios']?>
      
          </div>

          
          <div class="tab-pane fade" id="archivo<?php echo $row['id']; ?>" role="tabpanel" aria-labelledby="archivo-tab<?php echo $row['id']; ?>">
          <?php
// Consulta para obtener los archivos asociados a una venta específica
$query_documentos = "
SELECT a.nombre
FROM archivoseliminados a
LEFT JOIN ventaseliminadas v ON a.venta_id = v.id
WHERE v.documentocliente = '" . $row['documentocliente'] . "' 
  AND v.linea = '" . $row['linea'] . "'

";
$result_documentos = mysqli_query($conexion, $query_documentos);

while ($row_documento = mysqli_fetch_assoc($result_documentos)) {
    $archivo = $row_documento['nombre'];
    $extension = strtolower(pathinfo($archivo, PATHINFO_EXTENSION)); // Obtener la extensión del archivo

    echo '<br><br>';
    // Verificar si es una imagen
    if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif'])) {
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
            echo "<p>Fecha: {$cambio['fecha']}</p>";
            echo "<p>Hora: {$cambio['hora']}</p>";
            
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

      function reloadPage() {
        location.reload();
    }
   
</script>

  </div>
</div>  
                <td><?php echo $row['numerosolicitud'];?></td>
                <td><?php echo $row['vendedor'];?></td>
                <td><?php echo $row['equipo'];?></td>
                <td><?php if(empty($row['fechaportacion'])){echo "Aún sin fecha de portación.";}else{echo $fecha_invertida = date('d-m-Y', strtotime($row['fechaportacion']));} ?></td>
                <td><?php echo'<b><span style="color: black;">'.$row['estadoventa'].'</span></b>';?></td>
                <td><?php $fecha_invertida = date('d-m-Y', strtotime($row['fechacarga'])); echo $fecha_invertida;?></td>
                <td><?php echo $row['nombrecliente'];?></td>
                <td><?php echo $row['documentocliente'];?></td>
                <td><?php echo $row['linea']; ?></td>
                <td><?php echo $row['numeroalternativo'];?></td>
                <td><?php echo $row['producto']?></td>
                <td><a href="restaurarventaseliminadas.php?id=<?php echo $row['id'];?>&documentocliente=<?php echo $row['documentocliente'];?>&linea=<?php echo $row['linea'];?>" title="Eliminar"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z"/>
  <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466"/>
</svg></a></td>
            </tr>
           <input type="hidden" name="estado" value="<?php $estado = $row['estadoventa'];?>">
           <input type="hidden" name="vendedor" value="<?php $vendedor = $row['vendedor'];?>">
            <?php
        }
        ?>
        </tbody>
    </table>
</div>
<div class="pagination">
    <ul class="pagination">
        <?php
        // Calcular el número total de páginas
        if($Equipo != 'RODRIGO' && $Equipo != 'ADMINISTRACION'){
            $total_query = "SELECT COUNT(DISTINCT documentocliente,linea) AS total FROM ventaseliminadas WHERE equipo LIKE '%$Equipo%' LIMIT $registros_por_pagina OFFSET $offset";
        }else{
            $total_query = "SELECT COUNT(DISTINCT documentocliente,linea) AS total FROM ventaseliminadas LIMIT $registros_por_pagina OFFSET $offset";
        }
    
        $total_result = mysqli_query($conexion, $total_query);
        $total_row = mysqli_fetch_assoc($total_result);
        $total_registros = $total_row['total'];
        $total_paginas = ceil($total_registros / $registros_por_pagina);

      
        // Mostrar botón de página anterior si no está en la primera página

        $estado = isset($_GET['estado']) ? $_GET['estado'] : '';
        $vendedor = isset($_GET['vendedor']) ? $_GET['vendedor'] : '';

        if ($pagina_actual > 1) {
            echo '<li class="page-item"><a class="page-link" href="?pagina=' . ($pagina_actual - 1) . '&estado='.urlencode($estado).'&vendedor='.urlencode($vendedor).'&numeroventa='.urlencode($numerosolicitud).'">Anterior</a></li>';
        }

        // Mostrar números de página
        for ($i = 1; $i <= $total_paginas; $i++) {
            echo '<li class="page-item ' . ($i == $pagina_actual ? 'active' : '') . '"><a class="page-link" href="?pagina=' . $i . '&estado='.urlencode($estado).'&vendedor='.urlencode($vendedor).'&numeroventa='.urlencode($numerosolicitud ).'">' . $i . '</a></li>';
        }

        // Mostrar botón de página siguiente si no está en la última página
        if ($pagina_actual < $total_paginas) {
            echo '<li class="page-item"><a class="page-link" href="?pagina=' . ($pagina_actual + 1) . '">Siguiente</a></li>';
        }

        
        ?>
    </ul>
</div> 
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