<?php
include("../auth/proteger.php");
include("../config/conexion.php");

header("Content-Type: text/csv");
header("Content-Disposition: attachment; filename=inventario.csv");

$output = fopen("php://output", "w");
fputcsv($output, ["Producto", "Stock", "Stock mínimo"]);

$result = $conn->query("SELECT nombre, stock, stock_minimo FROM productos");

while ($row = $result->fetch_assoc()) {
    fputcsv($output, $row);
}

fclose($output);
