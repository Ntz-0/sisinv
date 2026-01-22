<?php
session_start();

if (isset($_SESSION['user'])) {
    header("Location: dashboard.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Inventario - Login</title>
</head>
<body>

<h2>Iniciar sesión</h2>

<?php if (isset($_GET['error'])): ?>
    <p style="color:red;">Credenciales inválidas</p>
<?php endif; ?>

<form method="POST" action="auth/login.php">
    <label>Email</label><br>
    <input type="email" name="email" required><br><br>

    <label>Contraseña</label><br>
    <input type="password" name="password" required><br><br>

    <button type="submit">Ingresar</button>
</form>

</body>
</html>
