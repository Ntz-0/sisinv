<?php
include("../config/conexion.php");

$producto = $_POST['producto_id'];
$tipo     = $_POST['tipo'];
$cantidad = $_POST['cantidad'];

if ($tipo == 'entrada') {
    $conn->query("UPDATE productos SET stock = stock + $cantidad WHERE id=$producto");
} else {
    $conn->query("UPDATE productos SET stock = stock - $cantidad WHERE id=$producto");
}

$conn->query("INSERT INTO movimientos (producto_id, tipo, cantidad)
              VALUES ($producto,'$tipo',$cantidad)");

header("Location: ../productos/listar.php");
