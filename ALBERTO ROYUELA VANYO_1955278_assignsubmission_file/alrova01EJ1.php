<?php

$num_paquetes = $_GET['num_paquetes'] ?? 1;
$ancho = $_GET['ancho'] ?? 0;
$largo = $_GET['largo'] ?? 0;
$alto = $_GET['alto'] ?? 0;
$peso = $_GET['peso'] ?? 0;
$zona = $_GET['zona'] ?? 'Península';
$transporte = $_GET['transporte'] ?? 'marítimo';

if ($_GET) {

    $volumen = $ancho * $largo * $alto;


    if ($volumen <= 0.5) {
        $precio_base = 50;
    } elseif ($volumen <= 1) {
        $precio_base = 75;
    } else {
        $precio_base = 100;
    }


    $precio = $precio_base * $volumen;


    if ($peso > 15) {
        echo "<h3>Envío desestimado: el peso supera los 15 kg.</h3>";
        exit;
    } elseif ($peso > 10) {
        $precio *= 1.5;
    } elseif ($peso > 5) {
        $precio *= 1.25;
    }


    switch (strtolower($zona)) {
        case 'península':
        case 'peninsula':

            break;
        case 'baleares':
            if (strtolower($transporte) == 'aéreo' || strtolower($transporte) == 'aereo') {
                $precio *= 1.10;
            }
            break;
        case 'canarias':
            $precio *= 1.10;
            break;
        default:
            echo "<h3>Zona no reconocida.</h3>";
            exit;
    }


    $total = $precio * $num_paquetes;

    echo "<h2>Resultado del cálculo</h2>";
    echo "Número de paquetes: $num_paquetes<br>";
    echo "Volumen de cada paquete: {$volumen} m³<br>";
    echo "Peso: {$peso} kg<br>";
    echo "Zona: {$zona}<br>";
    echo "Transporte: {$transporte}<br>";
    echo "<h3>Precio total del envío: " . number_format($total, 2) . " €</h3>";
} else {

    echo '
    <form method="get">
        <h3>Calculadora de Envíos</h3>
        Nº de paquetes: <input type="number" name="num_paquetes" required><br><br>
        Ancho (m): <input type="number" step="0.01" name="ancho" required><br><br>
        Largo (m): <input type="number" step="0.01" name="largo" required><br><br>
        Alto (m): <input type="number" step="0.01" name="alto" required><br><br>
        Peso (kg): <input type="number" step="0.1" name="peso" required><br><br>
        Zona: 
        <select name="zona">
            <option>Península</option>
            <option>Baleares</option>
            <option>Canarias</option>
        </select><br><br>
        Tipo de transporte: 
        <select name="transporte">
            <option>Marítimo</option>
            <option>Aéreo</option>
        </select><br><br>
        <input type="submit" value="Calcular envío">
    </form>';
}
?>
