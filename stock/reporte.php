<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: ../login.php");
    exit;
}

require "../conexion.php";

$resultado = $conexion->query(
    "SELECT id, nombre, stock FROM productos ORDER BY nombre ASC"
);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Stock</title>
</head>
<body>

<h2>Reporte de Stock de Productos</h2>

<p><a href="../dashboard.php">Volver al Dashboard</a></p>

<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>Código</th>
        <th>Producto</th>
        <th>Stock</th>
        <th>Estado</th>
    </tr>

    <?php while ($fila = $resultado->fetch_assoc()): ?>
        <tr>
            <td><?= $fila["id"] ?></td>
            <td><?= htmlspecialchars($fila["nombre"]) ?></td>
            <td><?= $fila["stock"] ?></td>
            <td>
                <?php if ($fila["stock"] == 1): ?>
                    <strong style="color:red;">STOCK CRÍTICO</strong>
                <?php else: ?>
                    OK
                <?php endif; ?>
            </td>
        </tr>
    <?php endwhile; ?>
</table>

</body>
</html>
