<?php
session_start();
include("../config/conexion.php");

if (!$_POST) {
    header("Location: ../index.php");
    exit;
}

$email = $_POST['email'];
$pass  = $_POST['password'];

$stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();

    if (password_verify($pass, $user['password'])) {
        $_SESSION['user'] = $user;
        header("Location: ../dashboard.php");
        exit;
    }
}

header("Location: ../index.php?error=1");
exit;
