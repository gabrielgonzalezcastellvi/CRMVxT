<!DOCTYPE html>
<html lang="es">
<?php session_start();  ?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Sistema carga - VxT</title>
    <style>
        /* Estilos para el modal */
        .modal {
            display: none; 
            position: fixed; 
            z-index: 1; 
            left: 0;
            top: 0;
            width: 100%; 
            height: 100%; 
            overflow: auto; 
            background-color: rgba(0,0,0,0.5); 
        }

        .modal-content {
            position: relative;
            margin: auto;
            padding: 0;
            width: 80%;
            max-width: 1200px;
            top: 10%;
            background-color: #fff;
            border: 1px solid #888;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
            animation: animatetop 0.4s;
        }

        @keyframes animatetop {
            from {top: -300px; opacity: 0} 
            to {top: 10%; opacity: 1}
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <link rel="icon" href="./icono.ico" type="image/x-icon">
</head>

<body id="page-top">
<?php
// Verificar si el usuario está autenticado, de lo contrario redirigirlo a la página de inicio de sesión
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
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index2.php">
                <div class="sidebar-brand-icon rotate-n-15">
                
                </div>
                <div class="mr-2 d-none d-lg-inline text-black-600 small"><?php echo 'Bienvenid@ '.$_SESSION['Nombre'];?></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
<?php  require 'menu2.php'; ?>


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
    <form class="form-inline" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
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
                <input type="text" class="form-control bg-light border-0 small" title="Nombre Cliente" name="nombrecliente" placeholder="Nombre cliente" aria-label="Buscar por Nombre cliente" aria-describedby="basic-addon4">
            </div>
            <div class="col-md-2 mr-2">
                <div class="input-group">
                <select class="form-control" name="estado">
  <?php
    $opciones = array("","POST VENTA","RECHAZO ABD","CANCELADA","DEVUELTA","PENDIENTE DE VERIFICACION","PENDIENTE AUDTORIA","INFORMADA TASA","PENDIENTE CARGA TASA","INGRESADA TASA","EN TRANSITO","EN PROCESO DIGIP-TN","DIFERIDA CARGA TASA","DEVUELTA X VERIFICACION","DEVUELTA X AUDITORIA","DEVUELTA CARGA TASA","DIFERIDA AUDITORIA","CUMPLIDA","DEVUELTA X VENDEDOR","DEVUELTA TASA","SOLICITUD CANCELADA","PENDIENTE CARGA MOVISTAR","DIFERIDA CARGA MOVISTAR","PENDIENTE CARGA IRIS","DEVUELTA CARGA MOVISTAR","INGRESADA MOVISTAR"); // Agrega aquí todas las opciones necesarias
    foreach ($opciones as $opcion) {
      if ($opcion == $row['estadoventa']) {
        echo "<option selected>$opcion</option>";
      } else {
        echo "<option>$opcion</option>";
      }
    }
  ?>
</select>   <div class="input-group-append">
                        <button class="btn btn-primary mr-2" type="submit">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>



                    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   // Verificar si se envió el formulario
   if(isset($_POST["numerosolicitud"]) || isset($_POST["numerolinea"]) || isset($_POST["dni"]) || isset($_POST["estado"]) || isset($_POST["nombrecliente"])) {
    // Recuperar los datos del formulario
    $numerosolicitud = $_POST["numerosolicitud"];
    $numerolinea = $_POST["numerolinea"];
    $dni = $_POST["dni"];
    $estado = $_POST["estado"];
    $nombrecliente = $_POST["nombrecliente"];

    // Puedes utilizar $numerosolicitud, $numerolinea y $dni en tu consulta SQL
    // También puedes ejecutar tu consulta SQL aquí y mostrar los resultados
}

  
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
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="perfil2">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Perfil
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Configuracion
                                </a>
                                <a class="dropdown-item" href="actividad_logueo2.php">
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
require 'conexion.php';
#error_reporting(0);
#session_start();
$Vendedor = $_SESSION['Nombre'];
// Configuración de la paginación
$registros_por_pagina = 20; // Número de registros a mostrar por página
$pagina_actual = isset($_GET['pagina']) ? $_GET['pagina'] : 1; // Página actual, por defecto 1

// Calcular el offset para la consulta SQL
$offset = ($pagina_actual - 1) * $registros_por_pagina;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $whereClause = " WHERE vendedor LIKE '%$Vendedor%' AND ";

       // Verificar si se proporcionó un número de solicitud
       if (!empty($_POST["estado"])) {
        $estado = $_POST["estado"];
        $whereClause .= "estadoventa LIKE '%$estado%' AND ";
    }

    // Verificar si se proporcionó un número de solicitud
    if (!empty($_POST["numerosolicitud"])) {
        $numerosolicitud = $_POST["numerosolicitud"];
        $whereClause .= "numerosolicitud LIKE '%$numerosolicitud%'";
    }

    // Verificar si se proporcionó un número de solicitud
    if (!empty($_POST["nombrecliente"])) {
      $nombrecliente = $_POST["nombrecliente"];
      $whereClause .= "nombrecliente LIKE '%$nombrecliente%'";
  }

    // Verificar si se proporcionó un número de línea
    if (!empty($_POST["numerolinea"])) {
        $numerolinea = $_POST["numerolinea"];
        $whereClause .= "linea LIKE '%$numerolinea%'";
    }

    // Verificar si se proporcionó un DNI
    if (!empty($_POST["dni"])) {
        $dni = $_POST["dni"];
        $whereClause .= "documentocliente LIKE '%$dni%'";
    }

    // Eliminar el "AND" adicional al final de la cláusula WHERE si está presente
    $whereClause = rtrim($whereClause, " AND ");

    // Construir la consulta SQL
      $Query = "SELECT * FROM ventas";
      $Query5 = "SELECT COUNT(DISTINCT linea, documentocliente,producto) as TotalBusqueda FROM ventas ";

    if (!empty($whereClause)) {
      $Query .= " $whereClause";
      $Query5 .= " $whereClause";
    }
    $Query .= " GROUP BY linea, documentocliente,producto,calle,numero,piso,dpto,entrecalles,provincia,localidad,codigopostal ORDER BY id DESC LIMIT $registros_por_pagina OFFSET $offset";
    $Query5 .= " ORDER BY id DESC LIMIT $registros_por_pagina OFFSET $offset";
  } else {
    $Query = "SELECT * FROM ventas WHERE vendedor = '$Vendedor' GROUP BY linea, documentocliente,producto,calle,numero,piso,dpto,entrecalles,provincia,localidad,codigopostal ORDER BY fechacarga DESC LIMIT $registros_por_pagina OFFSET $offset";
    $Query5 = "SELECT COUNT(DISTINCT linea, documentocliente,producto,calle,numero,piso,dpto,entrecalles,provincia,localidad,codigopostal) as TotalBusqueda FROM ventas WHERE vendedor = '$Vendedor' ORDER BY fechacarga DESC LIMIT $registros_por_pagina OFFSET $offset";
  }

// Consulta SQL con LIMIT y OFFSET
#$Query = "SELECT * FROM ventas WHERE vendedor = '$Vendedor' GROUP BY documentocliente,linea ORDER BY fechacarga DESC LIMIT $registros_por_pagina OFFSET $offset";
$Query2 = "SELECT * FROM ventas WHERE vendedor = '$Vendedor' GROUP BY linea, documentocliente,producto,calle,numero,piso,dpto,entrecalles,provincia,localidad,codigopostal ORDER BY fechacarga DESC";
$Result = mysqli_query($conexion, $Query);
$Query3 = "SELECT COUNT(DISTINCT linea, documentocliente,producto,calle,numero,piso,dpto,entrecalles,provincia,localidad,codigopostal) as total FROM ventas WHERE vendedor = '$Vendedor'";
$Result = mysqli_query($conexion, $Query);
$Result3 = mysqli_query($conexion, $Query3);
$Result5 = mysqli_query($conexion, $Query5);

while($row5 = $Result5 -> fetch_assoc()){
        $TotalBusqueda = $row5['TotalBusqueda'];
}

while($row = $Result3 -> fetch_assoc()){
     $Total = $row['total'];
}
date_default_timezone_set('America/Argentina/Mendoza');
$date = '';
$date = date('Y-m-d'); 
$Query4 = "SELECT COUNT(DISTINCT linea, documentocliente,producto,calle,numero,piso,dpto,entrecalles,provincia,localidad,codigopostal) as totalcarga FROM ventas WHERE fechacarga = '$date' AND vendedor = '$Vendedor'";
$Result4 = mysqli_query($conexion,$Query4);
while($row4 = $Result4 -> fetch_assoc()){
$Date = $row4['totalcarga'];
}
?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h2 class="h3 mb-0 text-gray-800">Total solicitudes de venta:  <b><?php echo $Total; ?></b></h2>
                <h2 class="h3 mb-0 text-gray-800">Total resultado busqueda:  <b><?php echo $TotalBusqueda; ?></b></h2>
                        <h2 class="h3 mb-0 text-gray-800">Solicitudes del día:  <b><?php echo $Date; ?></b></h2>

                        <?php
                        if ($Date == 5) {
    echo '<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <iframe width="100%" height="600" src="https://www.youtube.com/embed/RXKabdUBiWM?autoplay=1" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Mostrar el modal cuando la página se carga
        var modal = document.getElementById("myModal");
        var span = document.getElementsByClassName("close")[0];
        
        modal.style.display = "block";

        // Cerrar el modal cuando se hace clic en el botón de cerrar
        span.onclick = function() {
            modal.style.display = "none";
        }

        // Cerrar el modal cuando se hace clic fuera del contenido del modal
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    });
</script>';
}
?>
<!-- Tabla de ventas -->
</div>
<div class="table-responsive">
    <table class="table">
        <thead>
        
                <th scope="col">Info</th>
                <th scope="col">Número solicitud</th>
                <th scope="col">Vendedor</th>
                <th scope="col">Fecha Portación</th>
                <th scope='col'>Estado</th>
                <th scope='col'>Fecha de carga</th>
                <th scope="col">Nombre Cliente</th>
                <th scope="col">DNI</th>
                <th scope="col">Numero Cliente</th>
                <th scope="col">Numero Alternativo</th>
                <th scope="col">Producto</th>
                <th scope="col">Plan</th>
            
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
            <?php while ($row = $Result->fetch_assoc()) { ?>
                <?php
                $EstadoVenta = $row['estadoventa'];
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
               }else if($row['estadoventa'] == 'CANCELADA'){
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
echo '<td colspan="12">';
echo '<hr class="black-line">';
echo '<tr>';
echo '<td colspan="12" style="background-color: ' . $color . '; color: black;">'; // Agregamos clases de Bootstrap para los bordes y el espaciado interno (padding)
echo '<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal' . $row['id'] . '">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
</svg>
</button ><div class="comment-text"> Comentario: <b>' . $row['comentarios']. '</b></div>';
echo '</td>';
echo '</tr>';
echo '<tr>';
echo '</td>';
echo '</tr>';
echo '<td>';
?>
<style>
    .comment-text {
        word-wrap: break-word;
        max-width: 100%;
    }
</style>
<div class="modal fade" id="exampleModal<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">

  <?php
  if($EstadoVenta == 'DEVUELTA' || $EstadoVenta == 'DEVUELTA X VERIFICACION' || $EstadoVenta == 'DEVUELTA X AUDITORIA' || $EstadoVenta == 'DEVUELTA CARGA TASA' || $EstadoVenta == 'DEVUELTA X VENDEDOR' || $EstadoVenta == 'DEVUELTA TASA' || $EstadoVenta == 'DEVUELTA CARGA MOVISTAR'){
?>
<form action="editarsoli2.php" method="POST" id="formulario_soli" enctype="multipart/form-data">
    <div class="modal-content">
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
        </ul>
        <!-- Contenido de las pestañas -->
        <div class="tab-content" id="myTabContent<?php echo $row['id']; ?>">
          <!-- Pestaña Cliente -->
          <div class="tab-pane fade show active" id="cliente<?php echo $row['id']; ?>" role="tabpanel" aria-labelledby="cliente-tab<?php echo $row['id']; ?>">
          <input type="hidden" name="iduser" value="<?php echo $row['id']; ?>">
          <input type="hidden" name="fechacarga " value="<?php echo $row['fechacarga']; ?>">
          <input type="hidden" name="numerosolicitud" value="<?php echo $row['numerosolicitud']; ?>">
          <input type="hidden" name="iduser" value="<?php echo $row['id']; ?>">
            <p>Fecha de carga: <?php echo $row['fechacarga'];?></p>
            <p>Número solicitud: <?php echo $row['numerosolicitud'];?></p>
            <p>Nombre: <input type="text" class="form-control" name="name" id="" value="<?php echo $row['nombrecliente']; ?>"></p>
            <p>Documento: <input type="text" class="form-control" name="document" id="" value="<?php echo $row['documentocliente']; ?>"> </p>
            <p>Cuit: <input type="text" class="form-control" name="cuitcliente" id="" value="<?php echo $row['cuitcliente']; ?>"> </p>
            <p>Email: <input type="email" class="form-control" name="email" id="" value="<?php echo $row['email'];?>"></p>
            <p>Fecha nacimiento cliente: <input type="date" class="form-control" name="birthdate" id="" value="<?php echo $row['fechanacimientocliente']; ?>"> </p>
            <p>Linea a portar: <input type="text" class="form-control" name="numberclient" id="" value="<?php echo $row['linea']; ?>"></p>
            <p>Numero Alternativo: <input type="text" class="form-control" name="numberalter" id="" value="<?php echo $row['numeroalternativo'];?>"></p>
            <p>Franja horaria verificación: <input type="text" class="form-control" name="verificacion" id="" value="<?php echo $row['verificacion'];?>"></p>
            
            
            <!-- Agrega más información del cliente según sea necesario -->
          </div>
          <!-- Pestaña Producto -->
          <div class="tab-pane fade" id="producto<?php echo $row['id']; ?>" role="tabpanel" aria-labelledby="producto-tab<?php echo $row['id']; ?>">
            <!-- Agrega información del producto -->
            <p>Producto: <input type="text" class="form-control" name="product" id="" value="<?php echo $row['producto']?>"></p>
            <p>Empresa: <input type="text" class="form-control" name="empresa" id="" value="<?php echo $row['empresa']?>"></p>
            <p>Condición: <input type="text" class="form-control" name="tipo" id="" value="<?php echo $row['tipo']?>"></p>
            <p>Planes: <input type="text" class="form-control" name="plans" id="" value="<?php echo $row['planes']?>"></p>
            <p>Estado: 
            <select class="form-control" name="status" onchange="updateChangeDate(this)">
  <?php
    $opciones = array("POST VENTA","DEVUELTA","DEVUELTA X VERIFICACION","DEVUELTA X AUDITORIA","DEVUELTA CARGA TASA","DEVUELTA X VENDEDOR","DEVUELTA TASA","DEVUELTA CARGA MOVISTAR"); // Agrega aquí todas las opciones necesarias
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
        var currentDate = new Date(); // Obtenemos la fecha actual
        var formattedDate = currentDate.getFullYear() + '-' + (currentDate.getMonth() + 1) + '-' + currentDate.getDate(); // Formateamos la fecha como "YYYY-MM-DD"
        document.getElementById("fechadecambio").value = formattedDate; // Actualizamos el valor del campo oculto
    }
</script>
<?php
// Supongamos que aquí ya has realizado la conexión a la base de datos
// y que tienes la variable $conexion apuntando a la conexión establecida

// Realiza una consulta SQL para obtener la fecha de cambio más reciente

if($row['estadoventa'] != 'CUMPLIDA' && $row['estadoventa'] != 'SOLICITUD CUMPLIDA'){
  $query = "SELECT MAX(fechadecambio) AS ultima_fecha FROM ventas WHERE numerosolicitud LIKE '%" . $row['numerosolicitud'] . "%'";
  $resultado = $conexion->query($query);
  
  
  if ($resultado) {
      $fila = $resultado->fetch_assoc();
      $ultimaFechaCambio = $fila['ultima_fecha'];
      
      
      if ($ultimaFechaCambio !== null) {
          // Calcula la diferencia de días entre la fecha de cambio más reciente y la fecha actual
          $fechaActual = date('Y-m-d');
          $diferenciaDias = (strtotime($fechaActual) - strtotime($ultimaFechaCambio)) / (60 * 60 * 24);
      
          echo "<p>Días transcurridos desde el último cambio de estado: " . $diferenciaDias . " días</p>";
      } else {
          echo "<p>No se encontraron cambios de estado.</p>";
      }
  } else {
      // Manejar el error en caso de que la consulta falle
      echo "<p>Error al consultar la base de datos.</p>";
  }
  
  }

// Cierre de la conexión a la base de datos si es necesario
// $conexion->close();
?>
            <p>Score: <input type="text" class="form-control" name="score" id="" value="<?php echo $row['score']; ?>"> </p>
            <p>Fecha portación: <?php if(empty($row['fechaportacion'])){echo "Aún sin fecha de portación";}else{$row['fechaportacion'];} ?></p>
            
          </div>
          <!-- Pestaña Dirección de Entrega -->
          <div class="tab-pane fade" id="direccion<?php echo $row['id']; ?>" role="tabpanel" aria-labelledby="direccion-tab<?php echo $row['id']; ?>">
            <!-- Agrega información de la dirección de entrega -->
            <p>Direccion: <input type="text" class="form-control" name="street" id="" value="<?php echo $row['calle']?>"></p>
            <p>Número: <input type="text" class="form-control" name="number" id="" value="<?php echo $row['numero']?>"></p>
            <p>Piso: <input type="text" class="form-control" name="piso" id="" value="<?php echo $row['piso']?>"></p>
            <p>Depto: <input type="text" class="form-control" name="depto" id="" value="<?php echo $row['dpto']?>"></p>
            <p>Entre Calles: <input type="text" class="form-control" name="street2" id="" value="<?php echo $row['entrecalles']?>"></p>
            <p>Provincia: <input type="text" class="form-control" name="state" id="" value="<?php echo $row['provincia']?>"></p>
            <p>Código postal: <input type="text" class="form-control" name="codigopostal" id="" value="<?php echo $row['codigopostal']?>"></p>
            <p>Localidad: <input type="text" class="form-control" name="located" id="" value="<?php echo $row['localidad']?>"></th></p>
            <p>Coordenadas: <input type="text" class="form-control" name="latlong" id="" value="<?php echo $row['coordenadas']?>"></p>
            <input type="hidden" name="linkgooglemaps" value="<?php echo $row['linkgooglemaps']; ?>">
            <p>Link Google Maps: <input type="text" class="form-control" name="linkgooglemaps" id="" value="<?php echo $row['linkgooglemaps']?>"></p>
            <!-- <p>Google Maps: <a href="<?php echo $row['linkgooglemaps'];?>" target="_blank"><?php echo $row['calle']; ?></a></p> -->

          </div>
          <div class="tab-pane fade" id="informacionadicional<?php echo $row['id']; ?>" role="tabpanel" aria-labelledby="informacionadicional-tab<?php echo $row['id']; ?>">
            <!-- Agrega información de la dirección de entrega -->
            <p>TC: <input type="text" class="form-control" name="creditcard" id="" value="<?php echo $row['tarjetacredito']?>"></p>
            <p>Central: <input type="text" class="form-control" name="central" id="" value="<?php echo $row['central']?>"></p>
            <p>Manzana registro: <input type="text" class="form-control" name="registred" id="" value="<?php echo $row['manzanaregistro']?>"></p>
            <p>Comentarios:</p>
<textarea name="comments" class="form-control" id="" cols="90" rows="5"><?php echo $row['comentarios']?></textarea>
      
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
        echo '<a class="btn btn-danger" href="borrarfoto?foto=' . $archivo . '">Eliminar</a>';
    }
}
echo '<br><br><label for="archivos">Archivos:</label>';
echo '<input type="file" name="archivos[]" multiple><br>'; // Asegúrate de agregar corchetes [] al nombre del input para admitir múltiples archivos
echo '</div>';
?>      
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick="reloadPage()">Cerrar</button>
        <button type="submit" class="btn btn-success" title="Guardar">Guardar</button>
      </div>
      </form>
    <?php }else {?>
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Información del Cliente: <?php echo $row['nombrecliente']?></h5>
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
            <p>Cuit:<?php echo $row['cuitcliente']; ?></p>
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
            <p>Estado: <?php echo $row['estadoventa'];?></p>
            <?php
// Supongamos que aquí ya has realizado la conexión a la base de datos
// y que tienes la variable $conexion apuntando a la conexión establecida

if($row['estadoventa'] != 'CUMPLIDA' && $row['estadoventa'] != 'SOLICITUD CUMPLIDA'){
  $query = "SELECT MAX(fechadecambio) AS ultima_fecha FROM ventas WHERE numerosolicitud LIKE '%" . $row['numerosolicitud'] . "%'";
  $resultado = $conexion->query($query);
  
  
  if ($resultado) {
      $fila = $resultado->fetch_assoc();
      $ultimaFechaCambio = $fila['ultima_fecha'];
      
      
      if ($ultimaFechaCambio !== null) {
          // Calcula la diferencia de días entre la fecha de cambio más reciente y la fecha actual
          $fechaActual = date('Y-m-d');
          $diferenciaDias = (strtotime($fechaActual) - strtotime($ultimaFechaCambio)) / (60 * 60 * 24);
      
          echo "<p>Días transcurridos desde el último cambio de estado: " . $diferenciaDias . " días</p>";
      } else {
          echo "<p>No se encontraron cambios de estado.</p>";
      }
  } else {
      // Manejar el error en caso de que la consulta falle
      echo "<p>Error al consultar la base de datos.</p>";
  }
  
  }



// Cierre de la conexión a la base de datos si es necesario
// $conexion->close();
?>
            <p>Score: <?php echo $row['score']; ?></p>
            <p>Fecha portación: <?php if(empty($row['fechaportacion'])){echo "Aún sin fecha de portación. Solicitud N° <b>".$row['numerosolicitud'].'</b>';}else{echo $row['fechaportacion'];} ?></p>

          </div>
          <!-- Pestaña Dirección de Entrega -->
          <div class="tab-pane fade" id="direccion<?php echo $row['id']; ?>" role="tabpanel" aria-labelledby="direccion-tab<?php echo $row['id']; ?>">
            <!-- Agrega información de la dirección de entrega -->
            <p>Direccion: <?php echo $row['calle']?></p>
            <p>Número: <?php echo $row['numero']?></p>
            <p>Piso: <?php echo $row['piso']?></p>
            <p>Depto: <?php echo $row['dpto']?></p>
            <p>Entre Calles: <?php echo $row['entrecalles']?></p>
            <p>Localidad: <?php echo $row['localidad']?></th></p>
            <p>Provincia: <?php echo $row['provincia']?></p>
            <p>Código postal: <?php echo $row['codigopostal']?></p>
            <p>Coordenadas: <?php echo $row['coordenadas']?></p>
            <p>Google Maps: <a href="<?php echo $row['linkgooglemaps']?>" target="_blank"><?php echo $row['calle']; ?></a></p>

          </div>
          <div class="tab-pane fade" id="informacionadicional<?php echo $row['id']; ?>" role="tabpanel" aria-labelledby="informacionadicional-tab<?php echo $row['id']; ?>">
            <!-- Agrega información de la dirección de entrega -->
            <p>TC: <?php echo $row['tarjetacredito']?></p>
            <p>Central: <?php echo $row['central']?></p>
            <p>Manzana registro: <?php echo $row['manzanaregistro']?></p>
            <p>Comentarios: <?php echo $row['comentarios']?></p>      
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
    
}

?>
          
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick="reloadPage()">Cerrar</button>
      </div>
<?php } ?>

      <div id="resultado"></div>
    </div>
 
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>

      function reloadPage() {
        location.reload();
    }
</script>
  </div>
</div>
                <td><?php echo $row['numerosolicitud'];?></td> 
                <td><?php echo $row['vendedor'];?></td>
                <td><?php if(empty($row['fechaportacion'])){echo "Aún sin fecha de portación.";}else{echo $fecha_invertida = date('d-m-Y', strtotime($row['fechaportacion']));} ?></td>
                <td><?php echo '<b><span style="color: black;">'.$row['estadoventa'].'</span></b>';?></td>
                <td><?php $fecha_invertida = date('d-m-Y', strtotime($row['fechacarga'])); echo $fecha_invertida;?></td>
                <td><?php echo $row['nombrecliente'];?></td>
                <td><?php echo $row['documentocliente'];?></td>
                <td><?php echo '<a href="https://wa.me/'.$row['linea'].'" target="_blank">'.$row['linea'].'</a>';?></td>
                <td><?php echo '<a href="https://wa.me/'.$row['numeroalternativo'].'" target="_blank">'.$row['numeroalternativo'].'</a>';?></td>
                <td><?php echo $row['producto'];?></td>
                <td><?php echo $row['planes'];?></td>
            </tr>
            <tr><!-- Espacio --></tr>
            <tr><!-- Espacio --></tr>
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
        $total_query = "SELECT COUNT(DISTINCT documentocliente,linea) AS total FROM ventas WHERE vendedor = '$Vendedor'";
        $total_result = mysqli_query($conexion, $total_query);
        $total_row = mysqli_fetch_assoc($total_result);
        $total_registros = $total_row['total'];
        $total_paginas = ceil($total_registros / $registros_por_pagina);

        // Mostrar botón de página anterior si no está en la primera página
        if ($pagina_actual > 1) {
            echo '<li class="page-item"><a class="page-link" href="?pagina=' . ($pagina_actual - 1) . '">Anterior</a></li>';
        }

        // Mostrar números de página
        for ($i = 1; $i <= $total_paginas; $i++) {
            echo '<li class="page-item ' . ($i == $pagina_actual ? 'active' : '') . '"><a class="page-link" href="?pagina=' . $i . '">' . $i . '</a></li>';
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