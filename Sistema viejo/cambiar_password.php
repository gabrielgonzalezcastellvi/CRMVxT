<?php
session_start();
require 'conexion.php';

if (!isset($_SESSION['ID'])) {
    header('Location: login.php');
    exit();
}

$userId = $_SESSION['ID'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $currentPassword = $_POST['current_password'];
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];

    if ($newPassword !== $confirmPassword) {
        echo "<script>alert('Las contraseñas no coinciden.');</script>";
        exit();
    }

    // Verificar la contraseña actual
    $sql = "SELECT passencrypt FROM usuarios WHERE id = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    $currentPasswordEncript = md5(sha1($currentPassword));
    if (strpos($row['passencrypt'], $currentPasswordEncript) !== false) {
        // Actualizar con la nueva contraseña
        $newPasswordEncript = md5(sha1($newPassword));
        $currentDate = date('Y-m-d');

        $sql = "UPDATE usuarios SET contrasena = ?, passencrypt = ?, last_password_change = ? WHERE id = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("sssi", $newPassword, $newPasswordEncript, $currentDate, $userId);
        if ($stmt->execute()) {
            echo "<script>alert('Contraseña cambiada exitosamente.');</script>";
            header('Location: login.php');
            exit();
        } else {
            echo "<script>alert('Error al cambiar la contraseña.');</script>";
        }
    } else {
        echo "<script>alert('La contraseña actual es incorrecta.');</script>";
    }

    $stmt->close();
    $conexion->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cambiar Contraseña</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script>
        function validatePassword() {
            var password = document.getElementById("new_password").value;
            var strengthBar = document.getElementById("strengthBar");
            var strength = 0;

            if (password.match(/[a-z]+/)) {
                strength += 1;
            }
            if (password.match(/[A-Z]+/)) {
                strength += 1;
            }
            if (password.match(/[0-9]+/)) {
                strength += 1;
            }
            if (password.match(/[@$!%*?&]+/)) {
                strength += 1;
            }

            switch(strength) {
                case 0:
                    strengthBar.value = 20;
                    break;
                case 1:
                    strengthBar.value = 40;
                    break;
                case 2:
                    strengthBar.value = 60;
                    break;
                case 3:
                    strengthBar.value = 80;
                    break;
                case 4:
                    strengthBar.value = 100;
                    break;
            }

            var invalidChars = /[!'"=]/;
            if (invalidChars.test(password)) {
                alert("La contraseña contiene caracteres no permitidos: ' \" =");
                return false;
            }
            return true;
        }

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

        function validateForm() {
            return validatePassword();
        }

        function checkPasswordsMatch() {
            var newPassword = document.getElementById("new_password").value;
            var confirmPassword = document.getElementById("confirm_password").value;
            var message = document.getElementById("passwordMessage");

            if (newPassword !== confirmPassword) {
                message.textContent = "Las contraseñas no coinciden";
                message.style.color = "red";
            } else {
                message.textContent = "";
            }
        }
    </script>
</head>
<body class="bg-gradient-primary">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Cambio de contraseña</h1>
                                </div>
                                <form method="POST" onsubmit="return validateForm();">
                                    <div class="form-group">
                                        <label for="current_password">Contraseña actual:</label>
                                        <input type="password" id="current_password" name="current_password" class="form-control form-control-user" required>
                                        <span onclick="togglePasswordVisibility('current_password', 'toggleCurrentPassword')" style="cursor: pointer;">
                                            <i id="toggleCurrentPassword" class="fas fa-eye-slash"></i>
                                        </span><br>
                                    </div>
                                    <div class="form-group">
                                        <label for="new_password">Nueva contraseña:</label>
                                        <input type="password" id="new_password" name="new_password" class="form-control form-control-user" oninput="validatePassword(); checkPasswordsMatch();" required>
                                        <span onclick="togglePasswordVisibility('new_password', 'toggleNewPassword')" style="cursor: pointer;">
                                            <i id="toggleNewPassword" class="fas fa-eye-slash"></i>
                                        </span><br>
                                    </div>
                                    <div class="form-group">
                                        <label for="confirm_password">Confirmar nueva contraseña:</label>
                                        <input type="password" id="confirm_password" name="confirm_password" class="form-control form-control-user" oninput="checkPasswordsMatch();" required>
                                        <span onclick="togglePasswordVisibility('confirm_password', 'toggleConfirmPassword')" style="cursor: pointer;">
                                            <i id="toggleConfirmPassword" class="fas fa-eye-slash"></i>
                                        </span><br>
                                    </div>
                                    <div id="passwordMessage" class="form-group"></div>
                                    <div class="form-group">
                                        <progress id="strengthBar" value="0" max="100"></progress>
                                    </div>
                                    <input type="submit" class="btn btn-primary btn-user btn-block" value="Cambiar contraseña">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>