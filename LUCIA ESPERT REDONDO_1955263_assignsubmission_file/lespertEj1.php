<?php
/*
* AEV1 - Ejercicio 1: Calculadora de Envíos Lucia Espert
*/

header('Content-Type: text/html; charset=utf-8');

// (Opcional 0.5 puntos) Establecemos valores por GET.
// Usamos valores por defecto para que el script no falle si no se pasan todos.
$num_paquetes = (int)($_GET['num_paquetes'] ?? 1);
$ancho = (float)($_GET['ancho'] ?? 0.5);
$largo = (float)($_GET['largo'] ?? 0.5);
$alto = (float)($_GET['alto'] ?? 0.5);
$peso = (float)($_GET['peso'] ?? 4);
$zona = $_GET['zona'] ?? 'Peninsula'; // 'Peninsula', 'Baleares', 'Canarias'
$tipo_transporte = $_GET['tipo_transporte'] ?? 'maritimo'; // 'maritimo', 'aereo'

echo "<h1>Calculadora de Precios de Envío</h1>";
echo "<b>Datos Introducidos:</b><br>";
echo "Nº Paquetes: $num_paquetes <br>";
echo "Medidas (An/La/Al): $ancho x $largo x $alto m<br>";
echo "Peso: $peso kg<br>";
echo "Zona: $zona <br>";
echo "Transporte (para Baleares): $tipo_transporte <br>";
echo "<hr>";

// (1.5 punto) Comprobación del peso
if ($peso >= 15) {
    echo "<h2>Envio DESESTIMADO</h2>";
    echo "Motivo: El peso por paquete ( $peso kg) es igual o superior a 15kg.";
    exit; // Detenemos la ejecución
}

// (1.5 punto) Calculamos elvolumen y precio base
$volumen = $ancho * $largo * $alto; // m³
$precio_base = 0;

if ($volumen <= 0.5) {
    $precio_base = 50 * $volumen;
} elseif ($volumen <= 1) {
    $precio_base = 75 * $volumen;
} else { // Más de 1 m³
    $precio_base = 100 * $volumen;
}

echo "Volumen por paquete: " . number_format($volumen, 2) . " m³<br>";
echo "Precio base (por volumen): " . number_format($precio_base, 2) . " €<br>";


// (1.5 punto) Cálculo de plus por peso
// El precio_base ya lo tenemos, ahora calculamos el precio con el plus de peso
$precio_con_peso = $precio_base; // Por defecto (si pesa <= 5kg)

if ($peso > 10 && $peso < 15) { // Entre 10.01kg y 14.99kg
    $precio_con_peso = $precio_base * 1.50; // 50%
} elseif ($peso > 5 && $peso <= 10) { // Entre 5.01kg y 10kg
    $precio_con_peso = $precio_base * 1.25; // 25%
}

echo "Precio + plus peso: " . number_format($precio_con_peso, 2) . " €<br>";


// (1.5 punto) Cálculo de plus por zona
$precio_con_zona = $precio_con_peso; // Por defecto (Península)

switch ($zona) {
    case 'Baleares':
        if ($tipo_transporte == 'aereo') {
            $precio_con_zona = $precio_con_peso * 1.10; // 10%
        }
        // Si es 'maritimo', no hay coste adicional (se queda como $precio_con_peso)
        break;
    case 'Canarias':
        $precio_con_zona = $precio_con_peso * 1.10; // 10%
        break;
    case 'Peninsula':
    default:
        // Sin coste adicional
        break;
}

echo "Precio + plus zona (Precio por paquete): " . number_format($precio_con_zona, 2) . " €<br>";
echo "<hr>";

// (1 punto) Cálculo total (precio por paquete * número de paquetes)
$precio_total = $precio_con_zona * $num_paquetes;

echo "<h2>Precio TOTAL del Envío: " . number_format($precio_total, 2) . " €</h2>";

?>

