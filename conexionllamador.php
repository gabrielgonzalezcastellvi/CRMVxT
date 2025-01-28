<?php

$conexionllamador = new mysqli("192.168.1.250", "root", "admin2024", "call_center");

if ($conexionllamador->connect_error) {
    die("Connection failed: " . $conexionllamador->connect_error);
}


?>
