<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit;
}
//Sistema basico para identificacion de cuadrantes


function determinarCuadrante($x, $y) {
    if (!is_numeric($x) || !is_numeric($y)) {
        return "Por favor ingrese valores numéricos válidos";
    }
    
    $x = floatval($x);
    $y = floatval($y);
    
    if ($x === 0.0 && $y === 0.0) {
        return "El punto está en el origen (0,0)";
    } elseif ($x === 0.0) {
        return "El punto está sobre el eje Y";
    } elseif ($y === 0.0) {
        return "El punto está sobre el eje X";
    } else {
        $cuadrante = 0;
        if ($x > 0 && $y > 0) $cuadrante = 1;
        elseif ($x < 0 && $y > 0) $cuadrante = 2;
        elseif ($x < 0 && $y < 0) $cuadrante = 3;
        else $cuadrante = 4;
        
        return "El punto ($x, $y) se encuentra en el $cuadrante° cuadrante";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Identificación de Cuadrantes</title>
    <link rel="stylesheet" href="css/estilos.css">
    <style>
        .plano-cartesiano {
            max-width: 400px;
            margin: 20px auto;
            position: relative;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
        }
        .plano-cartesiano img {
            width: 100%;
            height: auto;
            display: block;
        }
        .resultado {
            margin-top: 20px;
            padding: 15px;
            border-radius: 5px;
            background-color: #f0f8ff;
            text-align: center;
            font-size: 1.2em;
        }
    </style>
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <div class="contenedor">
        <h2>Identificación de Cuadrantes en el Plano Cartesiano</h2>
        <form method="POST">
            <input type="number" name="coordenada_x" placeholder="Coordenada X" step="any" required>
            <input type="number" name="coordenada_y" placeholder="Coordenada Y" step="any" required>
            <button type="submit">Identificar Cuadrante</button>
        </form>
        
        <div class="plano-cartesiano">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/0e/Cartesian-coordinate-system.svg/400px-Cartesian-coordinate-system.svg.png" alt="Plano Cartesiano">
        </div>

        <div class="back-button">
            <a href="dashboard.php" class="btn">Volver al Dashboard</a>
        </div>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            echo "<div class='resultado'>";
            echo determinarCuadrante($_POST['coordenada_x'], $_POST['coordenada_y']);
            echo "</div>";
        }
        ?>
    </div>
    <?php include 'includes/footer.php'; ?>
</body>
</html>
