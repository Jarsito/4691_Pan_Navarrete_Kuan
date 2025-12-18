<?php
session_start();
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
