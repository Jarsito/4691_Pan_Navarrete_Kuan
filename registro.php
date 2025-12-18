<?php
session_start();
<<<<<<< HEAD
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
=======
require "conexion.php";

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $usuario = trim($_POST["usuario"] ?? "");
    $clave   = $_POST["clave"] ?? "";
    $clave2  = $_POST["clave2"] ?? "";

    if ($usuario === "" || $clave === "" || $clave2 === "") {
        $mensaje = "Todos los campos son obligatorios.";
    } elseif ($clave !== $clave2) {
        $mensaje = "Las contraseñas no coinciden.";
    } else {
        // Verificar que el usuario no exista
        $stmt = $conexion->prepare("SELECT id FROM usuarios WHERE usuario = ?");
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $mensaje = "El usuario ya existe.";
        } else {
            $hash = password_hash($clave, PASSWORD_DEFAULT);

            $insert = $conexion->prepare("INSERT INTO usuarios (usuario, clave) VALUES (?, ?)");
            $insert->bind_param("ss", $usuario, $hash);

            if ($insert->execute()) {
                $mensaje = "Usuario registrado correctamente. Ahora puedes iniciar sesión.";
            } else {
                $mensaje = "Error al registrar el usuario.";
            }

            $insert->close();
        }

        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
</head>
<body>
    <h2>Registro de usuario</h2>

    <form method="POST" action="registro.php">
        <label>
            Usuario:
            <input type="text" name="usuario" required>
        </label>
        <br><br>
        <label>
            Contraseña:
            <input type="password" name="clave" required>
        </label>
        <br><br>
        <label>
            Repetir contraseña:
            <input type="password" name="clave2" required>
        </label>
        <br><br>
        <button type="submit">Registrar</button>
    </form>

    <p style="color: red;"><?= htmlspecialchars($mensaje) ?></p>

    <p>¿Ya tienes cuenta? <a href="login.php">Inicia sesión aquí</a></p>
</body>
</html>
>>>>>>> 791faf4f1a50c3cd025ef2c64d96fd91ba031904
