<?php
// Datos de conexión
$host = "localhost";
$usuario = "root";
$clave = "";
$bd = "sistema";
$puerto = 3306; // ⚠️ si cambias el puerto en XAMPP, cámbialo aquí también

$conexion = new mysqli($host, $usuario, $clave, $bd, $puerto);

if ($conexion->connect_errno) {
    die("Error de conexión: " . $conexion->connect_error);
}
?>
