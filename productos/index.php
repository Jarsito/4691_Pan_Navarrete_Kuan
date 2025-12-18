<?php
session_start();
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
