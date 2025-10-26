<?php
//Recogemos los datos por GET
$num = $_GET['num'];
$ancho = $_GET['ancho'];
$largo = $_GET['largo'];
$alto = $_GET['alto'];
$peso = $_GET['peso'];
$zona = $_GET['zona'];
$transporte = $_GET['transporte'];

//Volumen
$volumen = $ancho * $largo * $alto;

//Precio base según volumen
if ($volumen <= 0.5) {
    $precio_m3 = 50;
} else if ($volumen <= 1) {
    $precio_m3 = 75;
} else {
    $precio_m3 = 100;
}

$precio_base = $volumen * $precio_m3;

//Recargo por peso
if ($peso >= 15) {
    echo "No se puede enviar. Peso mayor o igual a 15 kg.";
    exit;
} else if ($peso >= 10) {
    $recargo_peso = 0.50;
} else if ($peso >= 5) {
    $recargo_peso = 0.25;
} else {
    $recargo_peso = 0;
}

//Recargo zona
$recargo_zona = 0;

if ($zona == "Baleares") {
    if ($transporte == "aereo") {
        $recargo_zona = 0.10;
    }
} else if ($zona == "Canarias") {
    $recargo_zona = 0.10;
}

//Precio final
$precio_final_paquete = $precio_base + ($precio_base * $recargo_peso);
$precio_final_paquete = $precio_final_paquete + ($precio_final_paquete * $recargo_zona);
$precio_total = $precio_final_paquete * $num;

//Mostrar resultado
echo "Volumen: " . $volumen . " m3<br>";
echo "Precio base por paquete: " . $precio_base . " €<br>";
echo "Precio final por paquete: " . $precio_final_paquete . " €<br>";
echo "Precio TOTAL del envío: " . $precio_total . " €";
?>

