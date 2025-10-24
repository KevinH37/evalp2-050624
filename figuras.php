<?php
session_start();
include 'funciones/calcular_figuras.php';
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit;
}
//Sistema basico para calculo de figuras

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Figuras</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
<?php include 'includes/header.php'; ?>
<div class="contenedor">
    <h2>Cálculo de Área y Volumen</h2>
    <div class="form-container">
        <form method="POST" class="figure-form">
            <fieldset>
                <legend>Cilindro</legend>
                <input type="number" name="radio" placeholder="Radio" step="0.01" required>
                <input type="number" name="altura" placeholder="Altura" step="0.01" required>
                <button type="submit" name="calcular" value="cilindro">Calcular Cilindro</button>
            </fieldset>
        </form>

        <form method="POST" class="figure-form">
            <fieldset>
                <legend>Rectángulo</legend>
                <input type="number" name="base" placeholder="Base" step="0.01" required>
                <input type="number" name="altura_rect" placeholder="Altura" step="0.01" required>
                <button type="submit" name="calcular" value="rectangulo">Calcular Rectángulo</button>
            </fieldset>
        </form>
    </div>
    
    <div class="back-button">
        <a href="dashboard.php" class="btn">Volver al Dashboard</a>
    </div>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        echo "<div class='resultado'>";
        calcularFigura($_POST);
        echo "</div>";
    }
    ?>
</div>
<?php include 'includes/footer.php'; ?>
</body>
</html>