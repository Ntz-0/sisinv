<?php
session_start();
include("../config/conexion.php");

if ($_POST) {
    $email = $_POST['email'];
    $pass  = $_POST['password'];

    $sql = "SELECT * FROM usuarios WHERE email='$email'";
    $res = $conn->query($sql);

    if ($res->num_rows == 1) {
        $user = $res->fetch_assoc();

        if (password_verify($pass, $user['password'])) {
            $_SESSION['user'] = $user;
            header("Location: ../dashboard.php");
        }
    }
}
?>
