<!DOCTYPE html>
<html>
<head>
    <title>Ejercicio 1: Cálculo del precio total del envío</title>
</head>
<body>
    <h1>Cálculo del precio total del envío</h1>

    <?php
// Pasamos por GET los valores de entrada
$num_paquetes = $_GET["num_paquetes"];
$ancho = $_GET["ancho"];
$largo = $_GET["largo"];
$alto  = $_GET["alto"];
$peso  = $_GET["peso"];
$zona  = $_GET["zona"];
$transporte = $_GET["transporte"];

// Se calcula el volumen del paquete en m³
$volumen = $ancho * $largo * $alto;

// Se determina el precio base según el volumen (m³)
if ($volumen <= 0.5){
    $precioBase = 50;
} elseif ($volumen <= 1) {
    $precioBase = 75;
} else {
    $precioBase = 100;
}

// Si el precio es por m³, multiplicamos por el volumen
$precioPaquete = $precioBase * $volumen;

// Se calcula el volumen del paquete en m³
$volumen = $ancho * $largo * $alto;


// Se determina el precio base según el volumen
if ($volumen <= 0.5) {
    $precioBase = 50;
} elseif ($volumen <= 1) {
    $precioBase = 75;
} else {
    $precioBase = 100;
}

// Se calcula el precio del paquete (base sin incrementos)
$precioPaquete = $precioBase * $volumen;

//Incremento por peso, hasta 5 kg no hay incremento
if ($peso <= 5) {
    $precioPaquete = $precioPaquete;
} elseif ($peso > 5 && $peso <= 10) {
    // entre 5 y 10 kg se aplica un 25%
    $precioPaquete = $precioPaquete * 1.25;
} elseif ($peso > 10 && $peso <= 15) {
    // entre 10 y 15 kg se aplica un 50%
    $precioPaquete = $precioPaquete * 1.50;
} else {
    echo "El envío no se puede realizar porque el paquete pesa más de 15 kg.<br>";
}

//Se comprueba la zona de envío
if ($zona == "Península") {
    echo "Zona Península: sin coste adicional.<br>";
} elseif ($zona == "Baleares") {
    if ($transporte == "aereo") {
        echo "Zona Baleares (aéreo): +10% adicional.<br>";
        $precioPaquete = $precioPaquete * 1.10;
    } else {
        echo "Zona Baleares (marítimo): sin coste adicional.<br>";
    }
} elseif ($zona == "Canarias") {
    echo "Zona Canarias: +10% adicional.<br>";
    $precioPaquete = $precioPaquete * 1.10;
}

// Se calcula el precio final del envío
$precioTotal = $precioPaquete * $num_paquetes;

// Se muestran resultados finales
echo "<h2>Resultado del cálculo</h2>";
echo "Número de paquetes: " . $num_paquetes . "<br>";
echo "Volumen del paquete: " . $volumen . " m³<br>";
echo "Precio base aplicado: " . $precioBase . " €/m³<br>";
echo "Peso del paquete: " . $peso . " kg<br>";
echo "Zona de envío: " . $zona . "<br>";
echo "Transporte: " . $transporte . "<br><br>";
echo "Precio de un paquete (con incrementos): " . $precioPaquete . " €<br>";
echo "Precio total del envío: " . $precioTotal . " €<br>";
?>
</body>
</html>