<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit;
}

//Sistema basico de login para el panel principal
// Aquí puedes agregar más lógica del panel principal si es necesario
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel Principal</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <div class="contenedor">
        <h2>Bienvenido, <?php echo $_SESSION['usuario']; ?></h2>
        <p>Selecciona un ejercicio:</p>
        <a href="figuras.php">Cálculo de Figuras</a>
        <a href="cuadrantes.php">Identificación de Cuadrantes</a>
        <a href="logout.php">Cerrar Sesión</a>
    </div>
    <?php include 'includes/footer.php'; ?>
</body>
</html>