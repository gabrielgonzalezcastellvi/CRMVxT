<?php
require 'conexion.php';
session_start();

date_default_timezone_set('America/Argentina/Mendoza');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores de usuario y contraseña del formulario
    $usuario = $_POST['usuario'];
    $pass = $_POST['pass'];

    // Verificar si hay caracteres no deseados en el usuario o contraseña
    if (preg_match('/[\'!<>]/', $usuario) || preg_match('/[\'!<>]/', $pass)) {
        // Si se encuentran caracteres no deseados, muestra un mensaje de error y detiene el proceso
        echo "<script>alert('Se encontraron caracteres no permitidos en el usuario o contraseña.');window.location.href = 'login';</script>";
    } else {
        // Encriptar la contraseña
        $PasswordEncript = md5(sha1($pass)); // Se encripta con 2 algoritmos md5 y sha1 es mas seguro que md5 solo

        // Obtener el usuario de la base de datos
        $query = "SELECT * FROM usuarios WHERE `nombre` = ? OR `correo` = ?";
        $stmt = $conexion->prepare($query);
        $stmt->bind_param("ss", $usuario, $usuario);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            // Verificar si el usuario está bloqueado
            if ($user['bloqueado'] == 1) {
                echo "<script>alert('Su cuenta está bloqueada por múltiples intentos fallidos.');window.location.href = 'login';</script>";
                exit();
            }

            // Verificar la contraseña
            if (strpos($user['passencrypt'], $PasswordEncript) !== false) {
                // Reiniciar el contador de intentos fallidos
                $stmt = $conexion->prepare("UPDATE usuarios SET intentos = 0 WHERE id = ?");
                $stmt->bind_param("i", $user['id']);
                $stmt->execute();

                // Guardar datos del usuario en la sesión
                $_SESSION['equipo'] = $user['equipo'];
                $_SESSION['level'] = $user['level'];
                $_SESSION['ID'] = $user['id'];
                $_SESSION['Nombre'] = $user['nombre'];
                $_SESSION['logged_in'] = true;
                
                $lastChange = $user['last_password_change'];

                $currentDate = date('Y-m-d');

                // Verificar la última fecha de cambio de contraseña
                if (strtotime($currentDate) >= strtotime($lastChange . ' +1 month')) {
                    header('Location: cambiar_password');
                    exit();
                }
          
                // Redirigir al usuario según su nivel
                if ($user['level'] == 1) {
                    header('Location: ./index');
                } else {
                    header('Location: ./index2');
                }
            } else {
                // Incrementar el contador de intentos fallidos
                $stmt = $conexion->prepare("UPDATE usuarios SET intentos = intentos + 1 WHERE id = ?");
                $stmt->bind_param("i", $user['id']);
                $stmt->execute();

                // Verificar la cantidad de intentos fallidos
                $stmt = $conexion->prepare("SELECT intentos FROM usuarios WHERE id = ?");
                $stmt->bind_param("i", $user['id']);
                $stmt->execute();
                $result = $stmt->get_result();
                $row = $result->fetch_assoc();

                if ($row['intentos'] >= 3) {
                    // Bloquear la cuenta si se han alcanzado los 3 intentos fallidos
                    $stmt = $conexion->prepare("UPDATE usuarios SET bloqueado = 1 WHERE id = ?");
                    $stmt->bind_param("i", $user['id']);
                    $stmt->execute();

                    echo "<script>alert('Su cuenta ha sido bloqueada por múltiples intentos fallidos.');window.location.href = 'login';</script>";
                } else {
                    echo "<script>alert('Datos incorrectos, intente de nuevo');window.location.href='login';</script>";
                }
            }
        } else {
            echo "<script>alert('Datos incorrectos, intente de nuevo');window.location.href='login';</script>";
        }

        $stmt->close();
    }
}
?>
