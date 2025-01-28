<?php
 session_start(); // Iniciar la sesión 
 $Equipo = $_SESSION['equipo'];
 if (!isset($_SESSION['Nombre'])) {
    session_destroy();
    header("Location: login.php");
    exit;
}
 if($_SESSION['level'] != '1'){
    $_SESSION['mensaje'] = "Necesitas permisos administrativos para acceder al sitio.";
    header('Location:nuevalinea2');
    exit();
    }
?>
<!DOCTYPE html>
<html lang="en">

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

            <!-- Nav Item - Dashboard -->
            <?php 
if($Equipo == 'ASM'){
    require 'menuasm.php';
}else{
    require 'menu.php';
}
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
                <h2>Cargar nueva linea</h2>
  
<form action="procesar_ventaporta2.php" method="post" id="formulario_venta-porta" enctype="multipart/form-data">
    <?php
    require 'conexion.php';

    $vendedor = $_SESSION['Nombre'] ;
    ?>
    <div class="form-group">
    <div class="col-sm-7">
    <input type="hidden" id="vendedor" name="vendedor" value="<?php echo $vendedor; ?>">
    <input type="hidden" name="producto" value="ALTA NUEVA">
</div>
    <div class="form-control bg-light border-0 small">
    <div class="col-sm-7">
<input type="hidden" name="vendedor" value="<?php echo $_SESSION['Nombre'];?>">
    <label for="cliente">Nueva linea:</label>
    <input type="text" class="form-control" id="linea_porta" name="lineas" maxlength="10" required><br><br>
    <label for="cliente">Número de chip:</label>
    <input type="text" class="form-control" id="numerodechip" name="numerodechip"><br><br>
    <label for="cliente">Empresa:</label>
    <select name='empresa'class="form-control" id='empresa'>
        <option value="CLARO">CLARO</option>
        <option value="PERSONAL">PERSONAL</option>
    </select><br><br>
    <label for="cliente">Servicio:</label>
    <select name='tipo'class="form-control" id='tipo'>
        <option value="ABONO">ABONO</option>
        <option value="PREPAGO">PREPAGO</option>
    </select><br><br>
    <label for="cliente">Nombre cliente:</label>
    <input type="text" class="form-control" id="nombrecliente_porta" name="nombrecliente" required><br><br>
    <label for="cliente">Fecha nacimiento cliente:</label>
    <input type="date" class="form-control" id="fechanacimientocliente_porta" name="fechanacimientocliente" required><br><br>
    <label for="cliente">Documento cliente:</label>
    <input type="number" class="form-control" id="documentocliente_porta" name="documentocliente" required><br><br>
    <label for="cliente">Cuit cliente:</label>
    <input type="text" class="form-control" id="cuitcliente_porta" name="cuitcliente" maxlength="11" required><br><br>
    <label for="cliente">Número Alternativo:</label>
    <input type="number" class="form-control" id="numeroalternativo_porta" name="numeroalternativo" required><br><br>
    <label for="cliente">Email:</label>
    <input type="email" class="form-control" id="email_porta" name="email" required><br><br>
    <label for="producto">Plan:</label>
    <select class="form-control" name='productos' class="form-control">
    <?php
    $query = "SELECT * FROM productos WHERE tipo = 'PORTA'";
    $result = mysqli_query($conexion, $query);
    while($row = $result->fetch_assoc()){
        $producto = $row['producto'];
        echo "<option value='$producto'>" . $row['producto'] . "</option>";
    }
    ?>
    </select>
    <br>
    <br>
    <label for="score">Score:</label>
    <input type="number" class="form-control" id="score_porta" name="score" required><br><br>
    <label for="verificacion">Franja horaria de verificación:</label>
    <select class="form-control" title="Verificacion" name="verificacion" aria-label="Verificacion" aria-describedby="basic-addon4" size="1">
        <?php
        $opcionesVerificacion = array("", "9 a 12", "12 a 15", "15 a 18", "18 a 20", "Todo el dia."); // Agrega aquí todas las opciones necesarias
        foreach ($opcionesVerificacion as $opcion) {
            // Verifica si la opción actual es la que está almacenada en la base de datos
            $selected = ($opcion == $planAlmacenado) ? "selected" : "";
            echo "<option value='$opcion' $selected>$opcion</option>";
        }
        ?>
    </select><br><br>
    <label for="calle">Calle:</label>
    <input type="text" class="form-control" id="calle_porta" name="calle" required><br><br>
    <label for="numero">Número:</label>
    <input type="text" class="form-control" id="numero_porta" name="numero" required><br><br>
    <label for="piso">Piso:</label>
    <input type="text" class="form-control" id="piso_porta" name="piso" value="-"><br><br>
    <label for="dpto">Dpto:</label>
    <input type="text" class="form-control" id="dpto_porta" name="dpto" value="-"><br><br>
    <label for="entrecalles">Entre Calles:</label>
    <input type="text" class="form-control" id="entrecalles_porta" name="entrecalles" required><br><br>
    <label for="provincia">Provincia:</label>
    <select class="form-control" name='provincia'>
    <?php 
    require 'conexion.php';
    $Query = "SELECT provincias FROM provincias";
    $Result = mysqli_query($conexion, $Query);
    while($row = mysqli_fetch_assoc($Result)){
        $provincia = $row['provincias'];
        echo "<option value='$provincia'>" . $provincia . "</option>";
    }
    ?>
</select>
<br>

    <!-- <input type="text" class="form-control" id="provincia_porta" name="provincia" required><br><br> -->
    <label for="localidad">Localidad:</label>
    <input type="text" class="form-control" id="localidad_porta" name="localidad" required><br><br>
    <label for="codigopostal">Código Postal:</label>
    <input type="text" class="form-control" id="codigopostal_porta" name="codigopostal" required><br><br>
    <style>
        .form-control {
            width: 750px;
            padding: 5px;
            font-size: 16px;
        }
        #mapContainer {
            width: 750px;
            height: 350px;
        }
    </style>
   <!-- Leaflet CSS -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.css" />

    <!-- Leaflet JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js"></script>
</head>
<body>
    <label for="coordenadas_porta">Coordenadas:</label>
    <input type="text" class="form-control" id="coordenadas_porta" name="coordenadas" required><br><br>

    <label for="maps_porta">Link Google Maps:</label>
    <input type="text" class="form-control" id="maps_porta" name="maps" required><br><br>

    <!-- Contenedor del mapa -->
    <div id="mapContainer"></div>

    <script>
        // Función para mostrar el mapa en el contenedor
        function mostrarMapa() {
            var input = document.getElementById('coordenadas_porta').value;
            var coordenadas = input.split(',').map(coord => parseFloat(coord.trim()));

            if (coordenadas.length === 2) {
                var lat = coordenadas[0];
                var lon = coordenadas[1];

                // Inicialización del mapa utilizando Leaflet.js
                var map = L.map('mapContainer').setView([lat, lon], 18);

                // Capa de OpenStreetMap
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(map);

                // Marcador en las coordenadas
                L.marker([lat, lon]).addTo(map)
                    .bindPopup('Ubicación')
                    .openPopup();
            }
        }

        // Escuchar evento de cambio en el campo de coordenadas
        document.getElementById('coordenadas_porta').addEventListener('change', mostrarMapa);

        // Llamar a la función al cargar la página si hay coordenadas predefinidas
        window.onload = function() {
            mostrarMapa();
        };
    </script>
<br>
<br>
    <label for="linkmaps">Tarjeta de crédito:</label>
    <input type="text" class="form-control" id="tarjetadecredito_fibra" name="tarjetadecredito" required><br><br>
    <label for="comentarios">Comentarios:</label><br><br>
    <textarea name="comentarios" class="form-control" id="comnetarios_porta" cols="150" rows="4"></textarea><br><br>
    <div class="form-group">
    <label for="archivos">Archivos:</label>
    <div id="archivos-container">
        <input type="file" class="form-control-file" id="archivos_porta" name="archivos[]" multiple><br>
    </div>
    </div>
    <button type="button" id="agregar-archivo" class="btn btn-primary">Agregar más archivos</button><br><br>
</div>
<style>
.preview-container {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}

.file-preview {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin: 10px;
    position: relative;
}

.file-preview img, .file-preview embed {
    max-width: 270px;
    max-height: 200px;
}

.remove-file {
    position: absolute;
    top: 5px;
    right: 5px;
    background-color: red;
    color: white;
    border: none;
    border-radius: 50%;
    width: 25px;
    height: 25px;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    font-size: 18px;
}
</style>
<div id="resultado"></div>
<div id="preview" class="preview-container"></div>
    <button type="submit" class="btn btn-success" title="Registrar Venta">Registrar Venta</button>
</form>

    </div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->

<script>
$(document).ready(function() {
    // Función para mostrar u ocultar campos según el valor del producto
    $('#producto').change(function() {
        if ($(this).val() == 'PORTA') {
            $('#porta_fields').show();
            $('#fibra_fields').hide();
        } else if ($(this).val() == 'FIBRA') {
            $('#porta_fields').hide();
            $('#fibra_fields').show();
        }
    });

    // Función para agregar nuevos campos de archivo
    $('#agregar-archivo').click(function() {
        var nuevoArchivo = $('<input>')
            .attr('type', 'file')
            .attr('name', 'archivos[]')
            .attr('class', 'form-control-file')
            .attr('multiple', true)
            .change(previsualizarArchivos);
        
        $('#archivos-container').append(nuevoArchivo).append('<br>');
    });

    // Función para previsualizar archivos
    function previsualizarArchivos() {
        $('#preview').empty(); // Limpiar previsualización
        $('#archivos-container input[type="file"]').each(function(index) {
            var archivos = this.files;
            for (var i = 0; i < archivos.length; i++) {
                var archivo = archivos[i];
                var reader = new FileReader();

                reader.onload = (function(file, inputIndex, fileIndex) {
                    return function(e) {
                        var extension = file.name.split('.').pop().toLowerCase();
                        var removeButton = "<button type='button' class='remove-file' data-input-index='" + inputIndex + "' data-file-index='" + fileIndex + "'>&times;</button>";

                        if (['jpg', 'jpeg', 'png', 'gif'].indexOf(extension) !== -1) {
                            $('#preview').append("<div class='file-preview'><img src='" + e.target.result + "'><br>" + file.name + removeButton + "</div>");
                        } else if (extension === 'pdf') {
                            $('#preview').append("<div class='file-preview'><embed src='" + e.target.result + "' type='application/pdf'><br>" + file.name + removeButton + "</div>");
                        }
                    };
                })(archivo, index, i);

                reader.readAsDataURL(archivo);
            }
        });
    }

    // Asignar la función de previsualización al campo de archivo inicial
    $('#archivos_porta').change(previsualizarArchivos);

    // Enviar el formulario mediante AJAX
    $('#formulario_venta-porta').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: 'procesar_ventaporta2.php',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                $('#resultado').html(response);
            }
        });
    });

    // Función para eliminar archivos previsualizados
    $(document).on('click', '.remove-file', function() {
        var inputIndex = $(this).data('input-index');
        var fileIndex = $(this).data('file-index');

        var inputFile = $('#archivos-container input[type="file"]').eq(inputIndex)[0];
        var dt = new DataTransfer();
        var { files } = inputFile;

        for (var i = 0; i < files.length; i++) {
            if (i !== fileIndex) {
                dt.items.add(files[i]);
            }
        }

        inputFile.files = dt.files;
        previsualizarArchivos();
    });
});
</script>




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
                    <a class="btn btn-primary" href="cerrar.php">Cerrar Sesion</a>
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