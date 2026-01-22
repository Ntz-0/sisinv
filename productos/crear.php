<?php
include("../auth/proteger.php");
include("../config/conexion.php");

if ($_POST) {
    $stmt = $conn->prepare(
        "INSERT INTO productos (nombre, descripcion, stock, stock_minimo)
         VALUES (?, ?, ?, ?)"
    );

    $stmt->bind_param(
        "ssii",
        $_POST['nombre'],
        $_POST['descripcion'],
        $_POST['stock'],
        $_POST['stock_minimo']
    );

    $stmt->execute();
    header("Location: listar.php");
}
