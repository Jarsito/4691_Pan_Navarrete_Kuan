<?php
session_start();
include "conexion.php";

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $clave = $_POST["clave"];

    // Validar que el usuario no exista
    $query = $conexion->prepare("SELECT id FROM usuarios WHERE usuario = ?");
    $query->bind_param("s", $usuario);
    $query->execute();
    $query->store_result();

    if ($query->num_rows > 0) {
        $mensaje = "El usuario ya existe.";
    } else {
        $claveEncriptada = password_hash($clave, PASSWORD_DEFAULT);

        $insert = $conexion->prepare("INSERT INTO usuarios (usuario, clave) VALUES (?, ?)");
        $insert->bind_param("ss", $usuario, $claveEncriptada);

        if ($insert->execute()) {
            $mensaje = "Usuario registrado. Ahora puedes iniciar sesión.";
        } else {
            $mensaje = "Error al registrar.";
        }
    }
}
?>

<form method="POST">
    <h2>Registro</h2>
    Usuario: <input type="text" name="usuario" required><br><br>
    Clave: <input type="password" name="clave" required><br><br>
    <button type="submit">Registrar</button>
</form>

<p><?= $mensaje ?></p>

<a href="login.php">Ir al Login</a>
