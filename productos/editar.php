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
?>


<h3>Editar producto</h3>

<form method="POST">
    <label>Nombre</label><br>
    <input type="text" name="nombre"
           value="<?= $producto['nombre'] ?>" required><br><br>

    <label>Descripción</label><br>
    <textarea name="descripcion"><?= $producto['descripcion'] ?></textarea><br><br>

    <label>Stock mínimo</label><br>
    <input type="number" name="stock_minimo"
           value="<?= $producto['stock_minimo'] ?>" required><br><br>

    <button type="submit">Guardar cambios</button>
</form>

