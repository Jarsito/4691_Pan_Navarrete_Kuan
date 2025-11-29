<?php
session_start();
require "conexion.php";

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $usuario = trim($_POST["usuario"] ?? "");
    $clave   = $_POST["clave"] ?? "";

    if ($usuario === "" || $clave === "") {
        $mensaje = "Ingresa usuario y contraseña.";
    } else {
        $stmt = $conexion->prepare("SELECT id, clave FROM usuarios WHERE usuario = ?");
        if (!$stmt) {
            die("Error en la consulta: " . $conexion->error);
        }

        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $hashBD);
            $stmt->fetch();

            if (password_verify($clave, $hashBD)) {
                $_SESSION["usuario"] = $usuario;
                $_SESSION["usuario_id"] = $id;
                header("Location: dashboard.php");
                exit;
            } else {
                $mensaje = "Contraseña incorrecta.";
            }
        } else {
            $mensaje = "Usuario no encontrado.";
        }

        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h2>Iniciar sesión</h2>

    <form method="POST" action="login.php">
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
        <button type="submit">Ingresar</button>
    </form>

    <p style="color: red;"><?= htmlspecialchars($mensaje) ?></p>

    <p>¿No tienes cuenta? <a href="registro.php">Regístrate aquí</a></p>
</body>
</html>
