<?php
session_start();
<<<<<<< HEAD
if (!isset($_SESSION["usuario"])) { header("Location: ../login.php"); exit(); }

include "../conexion.php";
$resultado = $conexion->query("SELECT * FROM productos");
?>

<h2>Productos</h2>
<a href="crear.php">Agregar Nuevo</a>
<br><br>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Stock</th>
        <th>Acciones</th>
    </tr>

    <?php while($fila = $resultado->fetch_assoc()): ?>
    <tr>
        <td><?= $fila['id'] ?></td>
        <td><?= $fila['nombre'] ?></td>
        <td><?= $fila['precio'] ?></td>
        <td><?= $fila['stock'] ?></td>
        <td>
            <a href="editar.php?id=<?= $fila["id"] ?>">Editar</a> |
            <a href="eliminar.php?id=<?= $fila["id"] ?>"
            onclick="return confirm('¿Seguro que deseas eliminar?');">
             Eliminar
            </a>

            <?php if ($fila["stock"] == 1): ?>
                | <a href="../stock/cargar.php?id=<?= $fila["id"] ?>">Cargar Stock</a>
            <?php endif; ?>
        </td>

    </tr>
    <?php endwhile; ?>
</table>
=======
if (!isset($_SESSION["usuario"])) {
    header("Location: ../login.php");
    exit;
}

require "../conexion.php";

$resultado = $conexion->query("SELECT * FROM productos ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Productos</title>
</head>
<body>
    <h2>Listado de productos</h2>

    <p><a href="../dashboard.php">Volver al dashboard</a></p>
    <p><a href="crear.php">Agregar nuevo producto</a></p>

    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Acciones</th>
        </tr>
        <?php while ($fila = $resultado->fetch_assoc()): ?>
            <tr>
                <td><?= $fila["id"] ?></td>
                <td><?= htmlspecialchars($fila["nombre"]) ?></td>
                <td><?= number_format($fila["precio"], 2) ?></td>
                <td><?= $fila["stock"] ?></td>
                <td>
                    <a href="editar.php?id=<?= $fila["id"] ?>">Editar</a> |
                    <a href="eliminar.php?id=<?= $fila["id"] ?>" onclick="return confirm('¿Seguro que quieres eliminar este producto?');">Eliminar</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
>>>>>>> 791faf4f1a50c3cd025ef2c64d96fd91ba031904
