<?php
include("../auth/proteger.php");
include("../config/conexion.php");

$result = $conn->query("
SELECT nombre, stock, stock_minimo
FROM productos
");
?>

<h3>Reporte de Inventario</h3>

<table border="1">
<tr>
    <th>Producto</th>
    <th>Stock</th>
    <th>Stock mínimo</th>
</tr>

<?php while($p = $result->fetch_assoc()): ?>
<tr>
    <td><?= $p['nombre'] ?></td>
    <td><?= $p['stock'] ?></td>
    <td><?= $p['stock_minimo'] ?></td>
</tr>
<?php endwhile; ?>
</table>
