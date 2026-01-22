<?php
include("../config/conexion.php");
$result = $conn->query("SELECT * FROM productos");
?>

<table border="1">
<tr>
    <th>Producto</th>
    <th>Stock</th>
    <th>Estado</th>
</tr>

<?php while($p = $result->fetch_assoc()): ?>
<tr>
    <td><?= $p['nombre'] ?></td>
    <td><?= $p['stock'] ?></td>
    <td>
        <?php if ($p['stock'] <= $p['stock_minimo']): ?>
            <span style="color:red;">Stock bajo</span>
        <?php else: ?>
            OK
        <?php endif; ?>
    </td>
</tr>
<?php endwhile; ?>
</table>
