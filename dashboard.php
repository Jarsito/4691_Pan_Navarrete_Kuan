<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
<<<<<<< HEAD
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
=======
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>
<body>
    <h2>Bienvenido, <?= htmlspecialchars($_SESSION["usuario"]) ?></h2>

    <ul>
        <li><a href="productos/index.php">Gestión de Productos (CRUD)</a></li>
        <li>Carga de stock (para evaluación final)</li>
        <li><a href="logout.php">Cerrar sesión</a></li>
    </ul>
</body>
</html>
>>>>>>> 791faf4f1a50c3cd025ef2c64d96fd91ba031904
