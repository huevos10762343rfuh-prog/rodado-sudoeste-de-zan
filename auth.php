<?php
session_start();
require "conexion.php";

$email = $_POST['email'] ?? '';
$contraseña = $_POST['password'] ?? '';

if (!$email || !$contraseña) {
    echo "todos los campos deben de llenarse";
    exit;
}

$stmt = $conexion->prepare("SELECT * FROM usuarios WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$usuario = $stmt->get_result()->fetch_assoc();

if ($usuario && password_verify($contraseña, $usuario['password'])) {
    $_SESSION['email'] = $usuario['email'];
    header('Location: index.php');
    exit;
}

echo "email o contraseña incorrectos";
?>