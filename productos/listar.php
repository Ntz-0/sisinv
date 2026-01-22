<?php
include("../auth/proteger.php");
include("../config/conexion.php");

$sql = "
SELECT m.*, p.nombre AS producto
FROM movimientos m
JOIN productos p ON m.producto_id = p.id
ORDER BY m.fecha DESC
";

$result = $conn->query($sql);
?>

<table border="1">
<tr>
    <th>Producto</th>
    <th>Tipo</th>
    <th>Cantidad</th>
    <th>Fecha</th>
</tr>

<?php while($m = $result->fetch_assoc()): ?>
<tr>
    <td><?= $m['producto'] ?></td>
    <td><?= $m['tipo'] ?></td>
    <td><?= $m['cantidad'] ?></td>
    <td><?= $m['fecha'] ?></td>
    <td>
    <a href="editar.php?id=<?= $p['id'] ?>">Editar</a>

    <?php if ($_SESSION['user']['rol'] == 'admin'): ?>
        | <a href="eliminar.php?id=<?= $p['id'] ?>"
             onclick="return confirm('¿Eliminar producto?')">
             Eliminar
          </a>
    <?php endif; ?>
</td>
</tr>

<?php endwhile; ?>
</table>
