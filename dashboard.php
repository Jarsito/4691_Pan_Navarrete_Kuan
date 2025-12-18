<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
    exit();
}
?>

<h2>Bienvenido, <?= $_SESSION["usuario"] ?></h2>

<ul>
    <li><a href="productos/index.php">Gestión de Productos (CRUD)</a></li>
    <li><a href="productos/index.php">Carga de Stock</a></li>
    <li><a href="stock/reporte.php">Reporte de Stock</a></li>
    <li><a href="logout.php">Cerrar Sesión</a></li>
</ul>
