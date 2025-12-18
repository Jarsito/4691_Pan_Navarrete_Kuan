<?php
session_start();
<<<<<<< HEAD
if (!isset($_SESSION["usuario"])) { header("Location: ../login.php"); exit(); }

include "../conexion.php";

$id = $_GET["id"];
$conexion->query("DELETE FROM productos WHERE id = $id");

header("Location: index.php");
exit();
=======
if (!isset($_SESSION["usuario"])) {
    header("Location: ../login.php");
    exit;
}

require "../conexion.php";

$id = $_GET["id"] ?? null;

if ($id && is_numeric($id)) {
    $stmt = $conexion->prepare("DELETE FROM productos WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}

header("Location: index.php");
exit;
>>>>>>> 791faf4f1a50c3cd025ef2c64d96fd91ba031904
