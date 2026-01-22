<?php
include("../config/conexion.php");

if ($_POST) {
    $nombre = $_POST['nombre'];
    $desc   = $_POST['descripcion'];
    $stock  = $_POST['stock'];
    $min    = $_POST['stock_minimo'];

    $sql = "INSERT INTO productos (nombre, descripcion, stock, stock_minimo)
            VALUES ('$nombre','$desc',$stock,$min)";
    $conn->query($sql);

    header("Location: listar.php");
}
?>
