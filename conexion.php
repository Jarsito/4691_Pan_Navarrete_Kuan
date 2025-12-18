<?php
$conexion = new mysqli(
    "sql302.infinityfree.com",
    "if0_40708952",
    "rNmaZ4R0p4MkjCl",
    "if0_40708952_sistema"
);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
?>
