<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sistema de Carga de Ventas</title>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

</head>
<style>
    #preview {
        display: flex;
        flex-wrap: wrap;
    }
    .file-preview {
        margin-right: 10px;
        margin-bottom: 10px;
    }
    .file-preview img {
        max-width: 100px;
        max-height: 100px;
    }
</style>
<body>
<div class="container">
<h2>Cargar Venta</h2>
<form id="formulario_venta" enctype="multipart/form-data">
    <?php 
    require 'conexion.php';
    session_start();
    $vendedor = isset($_POST['vendedor']) ? $_POST['vendedor'] : '';
    ?>
    <div class="form-group">
    <input type="hidden" id="vendedor" name="vendedor" value="<?php echo $vendedor; ?>"><br><br>
    <label for="cliente">Producto:</label>
    <select name='producto' id='producto'>
        <option value="PORTA">PORTA</option>
        <option value="FIBRA">FIBRA</option>
    </select><br><br>
</div>
    <div id="porta_fields">
    <h3>Formulario Porta</h3>
    <label for="cliente">Linea:</label>
    <input type="text" id="linea" name="lineas" required><br><br>
    <label for="cliente">Nombre cliente:</label>
    <input type="text" id="nombrecliente" name="nombrecliente" required><br><br>
    <label for="cliente">Fecha nacimiento cliente:</label>
    <input type="date" id="fechanacimientocliente" name="fechanacimientocliente" required><br><br>
    <label for="cliente">Documento cliente:</label>
    <input type="text" id="documentocliente" name="documentocliente" required><br><br>
    <label for="cliente">Cuit cliente:</label>
    <input type="text" id="cuitcliente" name="cuitcliente" required><br><br>
    <label for="cliente">Número Alternativo:</label>
    <input type="number" id="numeroalternativo" name="numeroalternativo" required><br><br>
    <label for="producto">Producto:</label>
    <select name='productos' class="form-control">
    <?php
    $query = "SELECT * FROM productos";
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
    <input type="text" id="score" name="score" required><br><br>

    <label for="calle">Calle:</label>
    <input type="text" id="calle" name="calle" required><br><br>
    <label for="numero">Número:</label>
    <input type="text" id="numero" name="numero" required><br><br>
    <label for="piso">Piso:</label>
    <input type="text" id="piso" name="piso"><br><br>
    <label for="dpto">Dpto:</label>
    <input type="text" id="dpto" name="dpto"><br><br>
    <label for="entrecalles">Entre Calles:</label>
    <input type="text" id="entrecalles" name="entrecalles" required><br><br>
    <label for="provincia">Provincia:</label>
    <input type="text" id="provincia" name="provincia" required><br><br>
    <label for="localidad">Localidad:</label>
    <input type="text" id="localidad" name="localidad" required><br><br>
    <label for="codigopostal">Código Postal:</label>
    <input type="text" id="codigopostal" name="codigopostal" required><br><br>
    <label for="coordenada">Coordenadas:</label>
    <input type="text" id="coordenadas" name="coordenadas"><br><br>
    <label for="linkmaps">Link Google Maps:</label>
    <input type="text" id="maps" name="maps" required><br><br>
    <label for="comentarios">Comentarios:</label><br><br>
    <textarea name="comentarios" id="" cols="150" rows="4"></textarea><br><br>
    <div class="form-group">
    <label for="archivos">Archivos:</label>
    <input type="file" class="form-control-file" id="archivos" name="archivos[]" multiple><br><br>
    </div>
    <div id="preview"></div><br><br>
    <button type="submit" class="btn btn-primary" title="Registrar Venta">Registrar Venta</button>
 
    
</form>
<div id="resultado"></div>
    </div>
    <div id="fibra_fields" style="display:none;">
    <h3>Formulario Fibra</h3>
    <label for="cliente">Linea:</label>
    <input type="text" id="linea" name="lineas" required><br><br>
    <label for="cliente">Nombre cliente:</label>
    <input type="text" id="nombrecliente" name="nombrecliente" required><br><br>
    <label for="cliente">Fecha nacimiento cliente:</label>
    <input type="date" id="fechanacimientocliente" name="fechanacimientocliente" required><br><br>
    <label for="cliente">Documento cliente:</label>
    <input type="text" id="documentocliente" name="documentocliente" required><br><br>
    <label for="cliente">Cuit cliente:</label>
    <input type="text" id="cuitcliente" name="cuitcliente" required><br><br>
    <label for="cliente">Número Alternativo:</label>
    <input type="number" id="numeroalternativo" name="numeroalternativo" required><br><br>
    <label for="producto">Producto:</label>
    <select name='productos' class="form-control">
    <?php
    $query = "SELECT * FROM productos";
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
    <input type="text" id="score" name="score" required><br><br>

    <label for="calle">Calle:</label>
    <input type="text" id="calle" name="calle" required><br><br>
    <label for="numero">Número:</label>
    <input type="text" id="numero" name="numero" required><br><br>
    <label for="piso">Piso:</label>
    <input type="text" id="piso" name="piso"><br><br>
    <label for="dpto">Dpto:</label>
    <input type="text" id="dpto" name="dpto"><br><br>
    <label for="entrecalles">Entre Calles:</label>
    <input type="text" id="entrecalles" name="entrecalles" required><br><br>
    <label for="provincia">Provincia:</label>
    <input type="text" id="provincia" name="provincia" required><br><br>
    <label for="localidad">Localidad:</label>
    <input type="text" id="localidad" name="localidad" required><br><br>
    <label for="codigopostal">Código Postal:</label>
    <input type="text" id="codigopostal" name="codigopostal" required><br><br>
    <label for="coordenada">Coordenadas:</label>
    <input type="text" id="coordenadas" name="coordenadas" required><br><br>
    <label for="linkmaps">Link Google Maps:</label>
    <input type="text" id="maps" name="maps" required><br><br>
    <label for="linkmaps">Tarjeta de credito:</label>
    <input type="text" id="tarjetadecredito" name="tarjetadecredito" required><br><br>
    <label for="linkmaps">Central:</label>
    <input type="text" id="central" name="central" required><br><br>
    <label for="linkmaps">Manzana de registro:</label>
    <input type="text" id="manzanaderegistro" name="manzanaderegistro" required><br><br>
    <label for="comentarios">Comentarios:</label><br><br>
    <textarea name="comentarios" id="" cols="150" rows="4"></textarea>
    <br>
    <br>
    <div class="form-group">
    <label for="archivos">Archivos:</label>
    <input type="file" class="form-control-file" id="archivos" name="archivos[]" multiple><br><br>
    </div>
    <div id="preview"></div><br><br>
    <button type="submit" class="btn btn-primary" title="Registrar Venta">Registrar Venta</button>
  

</form>
<div id="resultado"></div>
</div>    


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
$(document).ready(function(){
    $('#producto').change(function(){
        if($(this).val() == 'PORTA') {
            $('#porta_fields').show();
            $('#fibra_fields').hide();
        } else if($(this).val() == 'FIBRA') {
            $('#porta_fields').hide();
            $('#fibra_fields').show();
        }
    });
    
    $('#archivos').change(function(){
        $('#preview').empty();
        var archivos = $(this)[0].files;
        for(var i = 0; i < archivos.length; i++) {
            var archivo = archivos[i];
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#preview').append("<div class='file-preview'><img src='" + e.target.result + "'><br>" + archivo.name + "</div>");
            };
            reader.readAsDataURL(archivo);
        }
    });
    
    $('#formulario_venta').submit(function(e){
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: 'procesar_venta.php',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response){
                $('#resultado').html(response);
            }
        });
    });
});
</script>
</body>
</html>
