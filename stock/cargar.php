<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: ../login.php");
    exit;
}

require "../conexion.php";

$id = $_GET["id"] ?? null;
$mensaje = "";

if (!$id || !is_numeric($id)) {
    die("Producto inválido.");
}

// Obtener producto
$stmt = $conexion->prepare(
    "SELECT nombre, stock FROM productos WHERE id = ?"
);
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->bind_result($nombre, $stockActual);
$stmt->fetch();
$stmt->close();

// Validación clave
if ($stockActual != 1) {
    die("Solo se puede cargar stock cuando el stock es 1.");
}

// Procesar carga
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $cantidad = $_POST["cantidad"] ?? "";

    if ($cantidad === "" || !is_numeric($cantidad) || $cantidad <= 0) {
        $mensaje = "Ingrese una cantidad válida.";
    } else {
        $nuevoStock = $stockActual + (int)$cantidad;

        if ($nuevoStock <= 0) {
            $mensaje = "El stock no puede quedar en 0.";
        } else {
            $update = $conexion->prepare(
                "UPDATE productos SET stock = ? WHERE id = ?"
            );
            $update->bind_param("ii", $nuevoStock, $id);
            $update->execute();
            $update->close();

            header("Location: ../productos/index.php");
            exit;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cargar Stock</title>
</head>
<body>

<h2>Cargar stock</h2>

<p><strong>Producto:</strong> <?= htmlspecialchars($nombre) ?></p>
<p><strong>Stock actual:</strong> <?= $stockActual ?></p>

<form method="POST">
    <label>
        Cantidad a agregar:
        <input type="number" name="cantidad" min="1" required>
    </label>
    <br><br>
    <button type="submit">Cargar Stock</button>
</form>

<p style="color:red;"><?= htmlspecialchars($mensaje) ?></p>

<p><a href="../productos/index.php">Volver</a></p>

</body>
</html>
