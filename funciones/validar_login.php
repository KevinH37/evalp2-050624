<?php
session_start();
$usuario_valido = "admin";
$clave_valida = "1234";
$usuario = $_POST['usuario'];
$password = $_POST['password'];
if ($usuario === $usuario_valido && $password === $clave_valida) {
    $_SESSION['usuario'] = $usuario;
    header("Location: ../dashboard.php");
} else {
    header("Location: ../index.php?error=1");
}
?>