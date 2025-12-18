<?php
<<<<<<< HEAD
$conexion = new mysqli(
    "sql302.infinityfree.com",
    "if0_40708952",
    "rNmaZ4R0p4MkjCl",
    "if0_40708952_sistema"
);

if ($conexion->connect_error) {
=======
// Datos de conexión
$host = "localhost";
$usuario = "root";
$clave = "";
$bd = "sistema";
$puerto = 3306; // ⚠️ si cambias el puerto en XAMPP, cámbialo aquí también

$conexion = new mysqli($host, $usuario, $clave, $bd, $puerto);

if ($conexion->connect_errno) {
>>>>>>> 791faf4f1a50c3cd025ef2c64d96fd91ba031904
    die("Error de conexión: " . $conexion->connect_error);
}
?>
