<?php 
session_start();
$Equipo = $_SESSION['equipo'];
?>
<!DOCTYPE html>
<html lang="es">
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
</head>

<body id="page-top">

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
                                <a class="dropdown-item" href="perfil">
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
                
            
                    <!-- Content Row -->
                    <div class="row">

                        

                    <div class="container-fluid">
                <?php
require 'conexion.php';
$Equipo = $_SESSION['equipo'];
$Vendedor = $_SESSION['Nombre'];
// Configuración de la paginación
$registros_por_pagina = 20; // Número de registros a mostrar por página
$pagina_actual = isset($_GET['pagina']) ? $_GET['pagina'] : 1; // Página actual, por defecto 1

// Calcular el offset para la consulta SQL
$offset = ($pagina_actual - 1) * $registros_por_pagina;

// Consulta SQL con LIMIT y OFFSET
if($Equipo != 'RODRIGO' && $Equipo != 'ADMINISTRACION'){
    $Query = "SELECT * FROM usuarioseliminados WHERE equipo <> '' AND nombre <> '' AND equipo LIKE '%$Equipo%' ORDER BY equipo ASC LIMIT $registros_por_pagina OFFSET $offset ";
    $Query2 = "SELECT * FROM usuarioseliminados WHERE equipo <> '' AND nombre <> '' AND equipo LIKE '%$Equipo%' ORDER BY equipo ASC";
}else{
    $Query = "SELECT * FROM usuarioseliminados WHERE equipo <> '' AND nombre <> '' ORDER BY equipo ASC LIMIT $registros_por_pagina OFFSET $offset ";
    $Query2 = "SELECT * FROM usuarioseliminados WHERE equipo <> '' AND nombre <> '' ORDER BY equipo ASC";
}
$Result = mysqli_query($conexion, $Query);
?>
                
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h2 class="h3 mb-0 text-gray-800">Usuarios eliminados</h2>
                        <?php
// Verificar si hay un mensaje almacenado en la sesión
if (isset($_SESSION['mensaje'])) {
    echo '<div class="alert alert-success" role="alert">' . $_SESSION['mensaje'] . '</div>';
    // Limpiar el mensaje de la sesión para que no se muestre de nuevo
    unset($_SESSION['mensaje']);
}
                        ?>
                        <script>
$(document).ready(function(){    
    $('.eliminarusuario').click(function(e){
        e.preventDefault(); // Prevenir el comportamiento predeterminado del enlace

        // Obtener la URL del enlace
        var url = $(this).attr('href');

        // Realizar la solicitud AJAX
        $.ajax({
            type: 'GET', // Usar GET o POST dependiendo de cómo se maneje en tu archivo eliminarUsuarios.php
            url: url,
            success: function(response){
                // Manejar la respuesta
                $('#resultado').html(response);
            }
        });
    });
});
</script>
       
                    </div>
<!-- Tabla de ventas -->
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Vendedor</th>
                <th scope="col">Dni</th>
                <th scope="col">Correo</th>
                <th scope="col">Equipo</th>
                <th scope="col">Nivel</th>
                <th scope="col">Contraseña</th>
                <th scope="col">Restablecer</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $Result->fetch_assoc()) { ?>

            <tr>
    
</td>
<div class="modal fade" id="exampleModal<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg"> 
        <!-- Contenido de las pestañas -->
        
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
                <td><?php echo $row['nombre'];?></td>
                <td><?php echo $row['dni'];?></td>
                <td><?php echo $row['correo'];?></td>
                <td><?php echo $row['equipo'];?></td>
                <td>
                <?php 
                if($row['level'] == '0')
                {echo "Vendedor";}
                else{echo "Administrador";};?>
                </td>
                <td><?php echo $row['contrasena'];?></td>
                <td><a href="restablecerUsuario.php?id=<?php echo $row['id']; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z"/>
  <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466"/>
</svg></a></td>
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
        if($Equipo != 'RODRIGO' && $Equipo != 'ADMINISTRACION'){
            $total_query = "SELECT COUNT(*) AS usuarios FROM usuarios WHERE nombre <> '' AND equipo <> '' AND equipo LIKE '%$Equipo%'";
        }else{
            $total_query = "SELECT COUNT(*) AS usuarios FROM usuarios WHERE nombre <> '' AND equipo <> ''";
        }
        $total_result = mysqli_query($conexion, $total_query);
        $total_row = mysqli_fetch_assoc($total_result);
        $total_registros = $total_row['usuarios'];
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

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                       <div class="col-xl-8 col-lg-7">
                    

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-6 mb-4">

                        </div>

                        <div class="col-lg-6 mb-4">

                            </div>

                        </div>
                    </div>

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