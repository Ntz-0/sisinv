<?php
include("../auth/proteger.php");
include("../auth/solo_admin.php");
include("../config/conexion.php");

if (!isset($_GET['id'])) {
    die("ID no especificado");
}

$id = $_GET['id'];

$stmt = $conn->prepare("DELETE FROM productos WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

header("Location: listar.php");
