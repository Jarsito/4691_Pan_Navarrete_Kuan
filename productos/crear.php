<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: ../login.php");
    exit;
}

require "../conexion.php";

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = trim($_POST["nombre"] ?? "");
    $precio = $_POST["precio"] ?? "";
    $stock  = $_POST["stock"] ?? "";

    if ($nombre === "" || $precio === "" || $stock === "") {
        $mensaje = "Todos los campos son obligatorios.";
    } elseif (!is_numeric($precio) || !is_numeric($stock)) {
        $mensaje = "Precio y stock deben ser numéricos.";
    } else {
        $precio = (float) $precio;
        $stock  = (int) $stock;

        $stmt = $conexion->prepare("INSERT INTO productos (nombre, precio, stock) VALUES (?, ?, ?)");
        $stmt->bind_param("sdi", $nombre, $precio, $stock);

        if ($stmt->execute()) {
            header("Location: index.php");
            exit;
        } else {
            $mensaje = "Error al guardar el producto.";
        }

        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar producto</title>
</head>
<body>
    <h2>Agregar producto</h2>

    <p><a href="index.php">Volver al listado</a></p>

    <form method="POST" action="crear.php">
        <label>
            Nombre:
            <input type="text" name="nombre" required>
        </label>
        <br><br>
        <label>
            Precio:
            <input type="number" step="0.01" name="precio" required>
        </label>
        <br><br>
        <label>
            Stock:
            <input type="number" name="stock" required>
        </label>
        <br><br>
        <button type="submit">Guardar</button>
    </form>

    <p style="color:red;"><?= htmlspecialchars($mensaje) ?></p>
</body>
</html>
