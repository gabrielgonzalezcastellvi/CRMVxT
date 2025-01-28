<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Búsqueda por DNI</title>
    <link rel="icon" href="../icono.ico" type="image/x-icon">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
            margin-top: 20px;
        }
        .foto-container {
            margin-top: 20px;
            text-align: center;
        }
        .foto-container img {
            max-width: 100%;
            height: auto;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
        }
        .info-container {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <script>
        document.addEventListener('contextmenu', function(event) {
            event.preventDefault();
        });

        window.addEventListener('devtoolschange', function(event) {
            if (event.detail.isOpen) {
                alert('El uso de herramientas de desarrollador está restringido en este sitio.');
            }
        });
    </script>

    <div class="container">
        <div class="form-container">
            <h2 class="mb-4">Búsqueda de DNI</h2>
            <form id="searchForm" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <div class="form-group">
                    <label for="dni">Ingrese el número de DNI:</label>
                    <input type="text" class="form-control" id="dni" name="dni" required>
                </div>
                <button type="submit" class="btn btn-primary">Buscar</button>
            </form>
        </div>

        <div id="resultados" class="row" style="display: none;">
            <div class="col-md-6 foto-container">
                <h3>Fotos de DNI:</h3>
                <div id="fotosDNI"></div>
            </div>
            <div class="col-md-6 info-container">
                <h3>Información:</h3>
                <p>Nombre: <b id="nombrecliente"></b></p>
                <p>Correo: <b id="correo"></b></p>
                <p>Fecha nacimiento: <b id="fechanacimiento"></b></p>
                <p>Edad: <b id="edad"></b></p>
                <p>Número documento: <b id="dniText"></b></p>
                <p>Cuit: <b id="cuitcliente"></b></p>
                <p>Domicilio: <b id="domicilio"></b></p>
                <p>Localidad: <b id="localidad"></b></p>
                <p>Provincia: <b id="provincia"></b></p>
                <p>Lineas ligadas: <b id="totallineas"></b></p>
            </div>
        </div>

        <div class="alert alert-danger mt-4" role="alert" id="noResultados" style="display: none;">
            No se encontraron fotos relacionadas con el DNI ingresado.
        </div>
    </div>

    <?php 
    require '../conexion.php';

    if(isset($_POST['dni'])){
        $dni = trim($_POST['dni']);

        $Querydatosadicionales = "SELECT COUNT(linea) as numerodelineas, nombrecliente, fechanacimientocliente, documentocliente, cuitcliente, calle, numero, localidad, provincia, email FROM ventas WHERE documentocliente = '$dni' AND producto LIKE '%PORTA%'";
        $Resultdatosadicionales = mysqli_query($conexion,$Querydatosadicionales);
        while($row = $Resultdatosadicionales -> fetch_assoc()){
            $totallineas = $row['numerodelineas'];
            $nombrecliente = $row['nombrecliente'];
            $fechanacimiento = $row['fechanacimientocliente'];
            $documentocliente = $row['documentocliente'];
            $cuitcliente = $row['cuitcliente'];
            $calle = $row['calle'];
            $altura = $row['numero'];
            $localidad = $row['localidad'];
            $provincia = $row['provincia'];
            $correo = $row['email'];
        }

        $query = "SELECT DISTINCT a.nombre_archivo
                  FROM ventas v 
                  INNER JOIN archivos a ON v.id = a.venta_id 
                  WHERE LOWER(RIGHT(a.nombre_archivo, 4)) != '.pdf' AND v.documentocliente = '$dni' LIMIT 2;";

        $Result = mysqli_query($conexion, $query);

        $numRows = mysqli_num_rows($Result);

        if($numRows > 0){
    ?>
    <script>
        document.addEventListener('DOMContentLoaded', function(){
            var clave = prompt("Ingrese la clave para ver los resultados:");

            if(clave === '2024'){
                document.getElementById('resultados').style.display = 'flex';
                document.getElementById('nombrecliente').textContent = '<?php echo $nombrecliente; ?>';
                document.getElementById('correo').textContent = '<?php echo $correo; ?>';
                document.getElementById('fechanacimiento').textContent = '<?php echo date('d-m-Y', strtotime($fechanacimiento)); ?>';
                document.getElementById('dniText').textContent = '<?php echo $dni; ?>';
                document.getElementById('cuitcliente').textContent = '<?php echo $cuitcliente; ?>';
                document.getElementById('domicilio').textContent = '<?php echo $calle . ', ' . $altura; ?>';
                document.getElementById('localidad').textContent = '<?php echo $localidad; ?>';
                document.getElementById('provincia').textContent = '<?php echo $provincia; ?>';
                document.getElementById('totallineas').textContent = '<?php echo $totallineas > 1 ? "$totallineas Lineas" : "$totallineas Linea"; ?>';

                var edad = new Date().getFullYear() - new Date('<?php echo $fechanacimiento; ?>').getFullYear();
                document.getElementById('edad').textContent = edad + ' años';

                <?php while($row = $Result->fetch_assoc()){ ?>
                    var a = document.createElement('a');
                    a.href = '../archivos/<?php echo $row["nombre_archivo"]; ?>';
                    a.download = '<?php echo $row["nombre_archivo"]; ?>';

                    var img = document.createElement('img');
                    img.src = '../archivos/<?php echo $row["nombre_archivo"]; ?>';
                    img.style.width = '350px';
                    img.style.height = '250px';

                    a.appendChild(img);
                    document.getElementById('fotosDNI').appendChild(a);
                <?php } ?>
            } else {
                alert('Clave incorrecta.');
            }
        });
    </script>
    <?php
        } else {
    ?>
    <script>
        document.addEventListener('DOMContentLoaded', function(){
            document.getElementById('noResultados').style.display = 'block';
        });
    </script>
    <?php
        }
    }
    ?>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
