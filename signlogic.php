<?php
session_start();
require "conexion.php";

$email = $_POST['email'] ?? '';
$contraseña = $_POST['password'] ?? '';

if (!$email || !$contraseña) {
    exit("Todos los campos deben llenarse");
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    exit("El email no es válido");
}

$contra_hash = password_hash($contraseña, PASSWORD_DEFAULT);

$consulta = $conexion->prepare(
    "INSERT INTO usuarios (email, password) VALUES (:email, :contra)"
);
$consulta->execute([
    ":email"  => $email,
    ":contra" => $contra_hash,
]);

$_SESSION["email"] = $email;

header("Location: index.php");
exit;