<?php
include("auth/proteger.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Inventario</title>
</head>
<body>

<h2>Dashboard</h2>

<p>
    Bienvenido,
    <strong><?= $_SESSION['user']['nombre'] ?></strong>
    (<?= $_SESSION['user']['rol'] ?>)
</p>

<hr>

<h3>Menú</h3>

<ul>
    <li><a href="productos/listar.php">Productos</a></li>
    <li><a href="movimientos/listar.php">Movimientos</a></li>
    <li><a href="reportes/inventario.php">Reporte de inventario</a></li>

    <?php if ($_SESSION['user']['rol'] == 'admin'): ?>
        <li><a href="productos/crear.php">Agregar producto</a></li>
    <?php endif; ?>

    <li><a href="auth/logout.php">Cerrar sesión</a></li>
</ul>

</body>
</html>
