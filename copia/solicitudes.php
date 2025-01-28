<!DOCTYPE html>
<html lang="es">
<?php  session_start();  ?>
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

<?php require 'menu.php';?>


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
        <input type="text" class="form-control bg-light border-0 small" title="Estado solicitud" name="estado" placeholder="Estado" aria-label="Buscar por estado" aria-describedby="basic-addon4">
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
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   // Verificar si se envió el formulario
   if(isset($_POST["numerosolicitud"]) || isset($_POST["numerolinea"]) || isset($_POST["dni"]) || isset($_POST["estado"]) || isset($_POST["vendedor"])) {
    // Recuperar los datos del formulario
    $numerosolicitud = $_POST["numerosolicitud"];
    $numerolinea = $_POST["numerolinea"];
    $dni = $_POST["dni"];
    $estado = $_POST["estado"];
    $vendedor = $_POST["vendedor"];
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $whereClause = "";

      // Verificar si se proporcionó un número de solicitud
      if (!empty($_POST["estado"])) {
        $estado = $_POST["estado"];
        $whereClause .= "estadoventa LIKE '%$estado%' AND ";
    }

    // Verificar si se proporcionó un número de solicitud
    if (!empty($_POST["numerosolicitud"])) {
        $numerosolicitud = $_POST["numerosolicitud"];
        $whereClause .= "numerosolicitud = '$numerosolicitud' AND ";
    }

    // Verificar si se proporcionó un número de línea
    if (!empty($_POST["numerolinea"])) {
        $numerolinea = $_POST["numerolinea"];
        $whereClause .= "linea = '$numerolinea' AND ";
    }

    // Verificar si se proporcionó un DNI
    if (!empty($_POST["dni"])) {
        $dni = $_POST["dni"];
        $whereClause .= "documentocliente = '$dni' AND ";
    }

      // Verificar por nombre de vendedor
      if (!empty($_POST["vendedor"])) {
        $vendedor = $_POST["vendedor"];
        $whereClause .= "vendedor LIKE '%$vendedor%' AND ";
    }

      // Verificar por nombre de vendedor y estado venta
      if (!empty($_POST["vendedor"]) && !empty($_POST["estadoventa"])) {
        $vendedor = $_POST["vendedor"];
        $estado = $_POST["estadoventa"];
        $whereClause .= "vendedor LIKE '%$vendedor%' AND estadoventa LIKE '%$estado%' AND ";
    }

    // Verificar por nombre de vendedor,estado venta y numero de solicitud
    if (!empty($_POST["vendedor"]) && !empty($_POST["estadoventa"]) && !empty($_POST["numerosolicitud"])) {
        $vendedor = $_POST["vendedor"];
        $estado = $_POST["estadoventa"];
        $numerosolicitud = $_POST["numerosolicitud"];
        $whereClause .= "vendedor = '$vendedor' AND estadoventa = '$estado' AND numerosolicitud LIKE '%$numerosolicitud%' AND ";
    }

    // Eliminar el "AND" adicional al final de la cláusula WHERE si está presente
    $whereClause = rtrim($whereClause, " AND ");

    // Construir la consulta SQL
    $Query = "SELECT * FROM ventas";
    $Query5 = "SELECT COUNT(DISTINCT linea, documentocliente) as TotalBusqueda FROM ventas";
    if (!empty($whereClause)) {
        $Query .= " WHERE $whereClause";
        $Query5 .= " WHERE $whereClause";
    }
    $Query .= " GROUP BY documentocliente, linea ORDER BY id DESC LIMIT $registros_por_pagina OFFSET $offset";
    $Query5 .= " ORDER BY id DESC LIMIT $registros_por_pagina OFFSET $offset";

} else {
    $Query = "SELECT * FROM ventas GROUP BY documentocliente, linea ORDER BY id DESC LIMIT $registros_por_pagina OFFSET $offset";
    $Query5 = "SELECT COUNT(DISTINCT linea,documentocliente) as TotalBusqueda FROM ventas  ORDER BY id DESC LIMIT $registros_por_pagina OFFSET $offset";
}

$Query2 = "SELECT * FROM ventas GROUP BY documentocliente,linea ORDER BY id DESC";
$Query3 = "SELECT COUNT(DISTINCT linea,documentocliente) as total FROM ventas";
$Result = mysqli_query($conexion, $Query);
$Result3 = mysqli_query($conexion, $Query3);

$Result5 = mysqli_query($conexion, $Query5);


while($row5 = $Result5 -> fetch_assoc()){
        $TotalBusqueda = $row5['TotalBusqueda'];
}


while($row = $Result3 -> fetch_assoc()){
     $Total = $row['total'];
}
$date = '';
$date = date('Y-m-d'); 
$Query4 = "SELECT COUNT(DISTINCT linea,documentocliente) as totalcarga FROM ventas WHERE fechacarga = '$date'";
$Result4 = mysqli_query($conexion,$Query4);
while($row4 = $Result4 -> fetch_assoc()){
$Date = $row4['totalcarga'];
}

?>
                
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h2 class="h3 mb-0 text-gray-800">Total solicitudes de venta:  <b><?php echo $Total; ?></b></h2>
                        <h2 class="h3 mb-0 text-gray-800">Total resultado busqueda:  <b><?php echo $TotalBusqueda; ?></b></h2>
                        <h2 class="h3 mb-0 text-gray-800">Solicitudes del día:  <b><?php echo $Date; ?></b></h2>
                       <!-- <form method="post" action="pdf.php">
                        <input type="hidden" name="consulta" value="<?php echo base64_encode($Query2); ?>">
                        <input type="submit" value="Generar PDF de ventas" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                </form> -->
                                <form method="post" action="csv.php">
    <input type="hidden" name="consulta" value="<?php echo base64_encode($Query); ?>">
    <button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" title="Generar reporte">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-download" viewBox="0 0 16 16">
            <path d="M4.406 1.342A5.53 5.53 0 0 1 8 0c2.69 0 4.923 2 5.166 4.579C14.758 4.804 16 6.137 16 7.773 16 9.569 14.502 11 12.687 11H10a.5.5 0 0 1 0-1h2.688C13.979 10 15 8.988 15 7.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 2.825 10.328 1 8 1a4.53 4.53 0 0 0-2.941 1.1c-.757.652-1.153 1.438-1.153 2.055v.448l-.445.049C2.064 4.805 1 5.952 1 7.318 1 8.785 2.23 10 3.781 10H6a.5.5 0 0 1 0 1H3.781C1.708 11 0 9.366 0 7.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383"/>
            <path d="M7.646 15.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 14.293V5.5a.5.5 0 0 0-1 0v8.793l-2.146-2.147a.5.5 0 0 0-.708.708z"/>
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

echo '<tr colspan="12" class="color" style="background-color: ' . $color . '; !important; color: black;">';
echo '<td colspan="12" class="color" style="background-color: ' . $color . '; !important; color: black; border-radius: 45px;">';
echo '<div class="color" style="background-color: ' . $color . '; !important; color: black;"">';
echo '<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal' . $row['id'] . '">
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
  <form action="editarsoli.php" method="POST" id="formulario_soli" enctype="multipart/form-data">
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
            <p>Fecha de carga: <input type="text" class="form-control" name="dateload" id="" value="<?php echo $row['fechacarga'];?>"></p>
            <p>Número solicitud: <input type="text" class="form-control" name="numerosolicitud" id="" value="<?php echo $row['numerosolicitud'];?>"></p>
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
            <p>Score: <input type="text" class="form-control" name="score" id="" value="<?php echo $row['score']; ?>"> </p>
            <p>Fecha portación: <input type="date" class="form-control" name="fechaportacion" id="" value="<?php echo $row['fechaportacion']; ?>"> </p>
            
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
            <p>Google Maps: <a href="<?php echo $row['linkgooglemaps'];?>" target="_blank"><?php echo $row['calle']; ?></a></p>

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
  $query_documentos = "SELECT DISTINCT(archivo) FROM ventas WHERE documentocliente = '" . $row['documentocliente'] . "'";
  $result_documentos = mysqli_query($conexion, $query_documentos);

  while ($row_documento = mysqli_fetch_assoc($result_documentos)) {
    $archivo = $row_documento['archivo'];
    $extension = strtolower(pathinfo($archivo, PATHINFO_EXTENSION)); // Obtener la extensión del archivo

    echo '<br>';
    echo '<br>';
    // Verificar si es una imagen
    if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif'])) {
        echo '<a download="./archivos/' . $archivo . '" href="./archivos/' . $archivo . '">';
        echo '<img class="form-control" src="./archivos/' . $archivo . '" style="width: 250px; height: 150px;">';
        echo '</a>';
    }
    // Verificar si es un PDF
    elseif ($extension === 'pdf') {
        echo '<iframe src="./archivos/' . $archivo . '" style="width:550px;height:450px;" frameborder="0"></iframe>';
    }
    if(empty($archivo)){
        echo '<br>';
    }else{
        echo '<br>';
        echo '<a class="btn btn-danger" href="borrarfoto.php?foto=' . $archivo . '">Eliminar</a>';
    }
    
}
  echo '<br><br><label for="archivos">Archivos:</label>
  <input type="file" name="archivos" multiple><br>
';
  echo '</div>';
          ?>          
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
                <td><?php echo'<b><span style="color: black;">'.$row['estadoventa'].'</span></b>';?></td>
                <td><?php $fecha_invertida = date('d-m-Y', strtotime($row['fechacarga'])); echo $fecha_invertida;?></td>
                <td><?php echo $row['nombrecliente'];?></td>
                <td><?php echo $row['documentocliente'];?></td>
                <td><?php echo $row['linea']; ?></td>
                <td><?php echo $row['numeroalternativo'];?></td>
                <td><?php echo $row['producto']?></td>
            </tr>
           
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
        $total_query = "SELECT COUNT(DISTINCT documentocliente,linea) AS total FROM ventas";
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