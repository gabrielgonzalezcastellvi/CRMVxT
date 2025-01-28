<?php
 session_start(); // Iniciar la sesión 
 if($_SESSION['level'] != 1){
    $_SESSION['mensaje'] = "Necesitas permisos administrativos para acceder al sitio.";
    header('Location:perfil2.php');
    exit();
    }
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
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index2.php">
                <div class="sidebar-brand-icon rotate-n-15">
                
                </div>
                <div class="mr-2 d-none d-lg-inline text-black-600 small"><?php echo 'Bienvenid@ '.$_SESSION['Nombre'];?></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

<?php
require 'menu.php';
?>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

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
  
<form action="procesar_perfil.php" method="post" id="formulario_perfil" enctype="multipart/form-data">
    <?php
    require 'conexion.php';

    $vendedor = $_SESSION['Nombre'] ;
    ?>
    <div class="form-group">
    <div class="form-control bg-light border-0 small">
    <div class="row">
        <div class="col-sm-8">
            <h3>Perfil</h3>

            <input type="hidden" name="vendedor" value="<?php echo $_SESSION['Nombre'];?>">

            <?php 
            require 'conexion.php';
            $Nombre = $_SESSION['Nombre'];
            $Query = "SELECT * FROM usuarios WHERE nombre LIKE '%$Nombre%' OR correo LIKE '%$Nombre%'";
            $Result = mysqli_query($conexion, $Query);
            while($row = $Result->fetch_assoc()){
            ?>
            <form action="procesar_perfil.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" value="<?php echo $row['nombre'];?>" id="nombre" name="nombre">
                <br>
                
                <label for="apellido">Apellido:</label>
                <input type="text" name="apellido" class="form-control" value="<?php echo $row['apellido'];?>" id="apellido">
                <br>
                
                <label for="dni">Dni 📄:</label>
                <input type="number" name="dni" class="form-control" value="<?php echo $row['dni'];?>" id="dni">
                <br>
                
                <label for="celular">Celular 📲:</label>
                <input type="number" name="celular" class="form-control" value="<?php echo $row['celular'];?>" id="">
                <br>
                
                <label for="correo">Correo 📧:</label>
                <input type="email" name="correo" class="form-control" value="<?php echo $row['correo'];?>" id="">
                <br>

                <script>
                                            function togglePasswordVisibility(inputId, toggleId) {
            var input = document.getElementById(inputId);
            var toggle = document.getElementById(toggleId);
            if (input.type === "password") {
                input.type = "text";
                toggle.className = "fas fa-eye";
            } else {
                input.type = "password";
                toggle.className = "fas fa-eye-slash";
            }
        }
                                            </script>
                
                <label for="correo">Clave 🔑:</label>
                <input type="password" name="clave" id="pass" class="form-control" value="<?php echo $row['contrasena'];?>" id="">
                <br>
                <span onclick="togglePasswordVisibility('pass', 'togglePass')" style="cursor: pointer;">
                                            <i id="togglePass" class="fas fa-eye-slash"></i>
                                        </span><br><br>
                
                <label for="cumple">Cumple 🥳🥳🥳:</label>
                <input type="date" name="cumple" class="form-control" value="<?php echo $row['cumple'];?>" id="">
                <br>
                
                <label for="empresa">Empresa actual:</label>
                <p>(Aah re que les vendian despues)</p>
                <br>
                
                <div class="form-group">
                    <label for="archivos">Foto perfil:</label>
                    <input type="file" class="form-control-file" id="foto_perfil" name="archivos[]" multiple><br><br>
                </div>
                
                <button type="submit" class="btn btn-success" title="Guardar cambios" onclick="reloadPage()">Guardar cambios</button>
            </form>
            <script>

      function reloadPage() {
        location.reload();
    }
   
</script>
        </div>
        
        <div class="col-sm-4 text-center">
        <?php if (!empty($row['foto'])): ?>
    <img src="./perfiles/<?php echo $row['foto']; ?>" class="img-fluid rounded-circle" alt="<?php echo $row['foto']; ?>" style="max-width: 450px;">
    <br>
    <br>
    <a class="btn btn-danger" href="borrarfotoperfil?foto=<?php echo $row['foto']; ?>">Eliminar</a>
<?php else: ?>
    <img src="./perfiles/Captura de pantalla 2024-05-22 213747.png" class="img-fluid rounded-circle" alt="Foto de perfil" style="max-width: 450px;">
<?php endif; ?>

        </div>
           <?php } ?>
    </div>
</div>
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
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-success" href="cerrar">Cerrar sesion</a>
                </div>
            </div>
        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->

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
                <div class="modal-body">Adios</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="login.html">Cerrar Sesion</a>
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