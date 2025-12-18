<?php
session_start();
if (!isset($_SESSION["usuario"])) { header("Location: ../login.php"); exit(); }

include "../conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $precio = $_POST["precio"];
    $stock = $_POST["stock"];

    $query = $conexion->prepare("INSERT INTO productos (nombre, precio, stock) VALUES (?, ?, ?)");
    $query->bind_param("sdi", $nombre, $precio, $stock);

    if ($query->execute()) {
        header("Location: index.php");
        exit();
    }
}
?>

<h2>Agregar Producto</h2>

<form method="POST">
    Nombre: <input type="text" name="nombre" required><br><br>
    Precio: <input type="number" step="0.01" name="precio" required><br><br>
    Stock: <input type="number" name="stock" required><br><br>
    <button type="submit">Guardar</button>
</form>
