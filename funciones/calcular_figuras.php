<?php
function calcularFigura($data) {
    if (isset($data['calcular'])) {
        $tipo = $data['calcular'];
        
        echo "<div class='resultado-figura-container'>";
        
        if ($tipo === 'cilindro') {
            if (!empty($data['radio']) && !empty($data['altura'])) {
                $r = floatval($data['radio']);
                $h = floatval($data['altura']);
                
                if ($r > 0 && $h > 0) {
                    $area = 2 * pi() * $r * ($h + $r);
                    $volumen = pi() * pow($r, 2) * $h;
                    
                    echo "<div class='figura-info' style='border-left: 5px solid #4A90E2;'>";
                    echo "<div class='figura-imagen'>";
                    echo "<img src='img/cilindro.svg' alt='Cilindro' title='Cilindro'>";
                    echo "</div>";
                    
                    echo "<div class='figura-detalles'>";
                    echo "<h3>Resultados del Cilindro</h3>";
                    echo "<p><strong>Radio:</strong> $r</p>";
                    echo "<p><strong>Altura:</strong> $h</p>";
                    echo "<div class='resultado-calculado' style='background-color: #4A90E220;'>";
                    echo "<p><strong>Área total:</strong> " . number_format($area, 2) . " unidades cuadradas</p>";
                    echo "<p><strong>Volumen:</strong> " . number_format($volumen, 2) . " unidades cúbicas</p>";
                    echo "</div>";
                    echo "<p class='formula'>Fórmula del volumen: π × r² × h</p>";
                    echo "</div>"; // cierre de figura-detalles
                    echo "</div>"; // cierre de figura-info
                } else {
                    mostrarError("Los valores del cilindro deben ser mayores que cero.");
                }
            } else {
                mostrarError("Por favor ingresa todos los valores del cilindro.");
            }
        }
        
        if ($tipo === 'rectangulo') {
            if (!empty($data['base']) && !empty($data['altura_rect'])) {
                $b = floatval($data['base']);
                $h = floatval($data['altura_rect']);
                
                if ($b > 0 && $h > 0) {
                    $area = $b * $h;
                    $perimetro = 2 * ($b + $h);
                    
                    echo "<div class='figura-info' style='border-left: 5px solid #50C878;'>";
                    echo "<div class='figura-imagen'>";
                    echo "<img src='img/rectangulo.svg' alt='Rectángulo' title='Rectángulo'>";
                    echo "</div>";
                    
                    echo "<div class='figura-detalles'>";
                    echo "<h3>Resultados del Rectángulo</h3>";
                    echo "<p><strong>Base:</strong> $b</p>";
                    echo "<p><strong>Altura:</strong> $h</p>";
                    echo "<div class='resultado-calculado' style='background-color: #50C87820;'>";
                    echo "<p><strong>Área:</strong> " . number_format($area, 2) . " unidades cuadradas</p>";
                    echo "<p><strong>Perímetro:</strong> " . number_format($perimetro, 2) . " unidades</p>";
                    echo "</div>";
                    echo "<p class='formula'>Fórmula del área: base × altura</p>";
                    echo "</div>"; // cierre de figura-detalles
                    echo "</div>"; // cierre de figura-info
                } else {
                    mostrarError("Los valores del rectángulo deben ser mayores que cero.");
                }
            } else {
                mostrarError("Por favor ingresa todos los valores del rectángulo.");
            }
        }
        
        echo "</div>"; // cierre de resultado-figura-container
    }
}

function mostrarError($mensaje) {
    echo "<div class='error-message'>";
    echo "<p>$mensaje</p>";
    echo "</div>";
}
?>
?>