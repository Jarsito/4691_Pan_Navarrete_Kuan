<?php
session_start();
<<<<<<< HEAD
if (!isset($_SESSION["usuario"])) { header("Location: ../login.php"); exit(); }

include "../conexion.php";

$id = $_GET["id"];
$producto = $conexion->query("SELECT * FROM productos WHERE id = $id")->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $precio = $_POST["precio"];
    $stock = $_POST["stock"];

    $query = $conexion->prepare("UPDATE productos SET nombre=?, precio=?, stock=? WHERE id=?");
    $query->bind_param("sdii", $nombre, $precio, $stock, $id);
    $query->execute();

    header("Location: index.php");
    exit();
}
?>

<h2>Editar Producto</h2>

<form method="POST">
    Nombre: <input type="text" name="nombre" value="<?= $producto['nombre'] ?>" required><br><br>
    Precio: <input type="number" step="0.01" name="precio" value="<?= $producto['precio'] ?>" required><br><br>
    Stock: <input type="number" name="stock" value="<?= $producto['stock'] ?>" required><br><br>
    <button type="submit">Actualizar</button>
</form>
=======
if (!isset($_SESSION["usuario"])) {
    header("Location: ../login.php");
    exit;
}

require "../conexion.php";

$id = $_GET["id"] ?? null;
if (!$id || !is_numeric($id)) {
    header("Location: index.php");
    exit;
}

$mensaje = "";

// Obtener datos del producto
$stmt = $conexion->prepare("SELECT nombre, precio, stock FROM productos WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->bind_result($nombreActual, $precioActual, $stockActual);

if (!$stmt->fetch()) {
    $stmt->close();
    header("Location: index.php");
    exit;
}
$stmt->close();

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

        $update = $conexion->prepare("UPDATE productos SET nombre = ?, precio = ?, stock = ? WHERE id = ?");
        $update->bind_param("sdii", $nombre, $precio, $stock, $id);

        if ($update->execute()) {
            header("Location: index.php");
            exit;
        } else {
            $mensaje = "Error al actualizar el producto.";
        }

        $update->close();
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar producto</title>
</head>
<body>
    <h2>Editar producto</h2>

    <p><a href="index.php">Volver al listado</a></p>

    <form method="POST" action="editar.php?id=<?= $id ?>">
        <label>
            Nombre:
            <input type="text" name="nombre" value="<?= htmlspecialchars($nombreActual) ?>" required>
        </label>
        <br><br>
        <label>
            Precio:
            <input type="number" step="0.01" name="precio" value="<?= $precioActual ?>" required>
        </label>
        <br><br>
        <label>
            Stock:
            <input type="number" name="stock" value="<?= $stockActual ?>" required>
        </label>
        <br><br>
        <button type="submit">Actualizar</button>
    </form>

    <p style="color:red;"><?= htmlspecialchars($mensaje) ?></p>
</body>
</html>
>>>>>>> 791faf4f1a50c3cd025ef2c64d96fd91ba031904
