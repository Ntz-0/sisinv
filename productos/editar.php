<?php
include("../auth/proteger.php");
include("../config/conexion.php");

if (!isset($_GET['id'])) {
    die("ID no válido");
}

$id = $_GET['id'];

/* GUARDAR CAMBIOS */
if ($_POST) {
    $stmt = $conn->prepare(
        "UPDATE productos
         SET nombre = ?, descripcion = ?, stock_minimo = ?
         WHERE id = ?"
    );

    $stmt->bind_param(
        "ssii",
        $_POST['nombre'],
        $_POST['descripcion'],
        $_POST['stock_minimo'],
        $id
    );

    $stmt->execute();
    header("Location: listar.php");
}

/* OBTENER PRODUCTO */
$stmt = $conn->prepare("SELECT * FROM productos WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$producto = $stmt->get_result()->fetch_assoc();
