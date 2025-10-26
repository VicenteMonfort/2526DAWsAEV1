<!DOCTYPE html>
<html>
<head>
    <title>Envíos</title>
</head>
<body>
    <h1>Desglose Factura Envío</h1>
    <?php

    //Marcamos en el código los valores que posteriormente serán pasados por GET.
    $numeroPaquetes = $_GET ["numeroPaquetes"];
    $ancho = $_GET ["ancho"];
    $largo = $_GET ["largo"];
    $alto = $_GET ["alto"];
    $peso = $_GET ["peso"];
    $zona = $_GET ["zona"];
    $transporte = $_GET ["transporte"];

    //Calculamos el volumen del paquete.
    $volumen = $ancho * $alto * $largo;

    if ($numeroPaquetes <= 0) {
        die ("Error en el número de paquetes. (El número de paquetes debe ser mayor a cero).");
    }


    //Calculamos el precio base del paquete según el volúmen.
    if ($volumen <= 0.5) {
        $precioBase = 50;
    } elseif ($volumen <= 1) {
        $precioBase = 75;
    } else {
        $precioBase = 100;
    }

    //Calculamos el precio base según el volumen del paquete.
    $precioPaquete = $precioBase * $volumen;

    $incrementoPeso = 1;

       //Verificamos el peso máximo que puede tener un paquete y su incremento según el peso.
    if ($peso > 15) {
        die("Envío rechazado: el peso de $peso kg supera el límite (15 kg por paquete).");
    }

    if ($peso >= 10) {
        $incrementoPeso *= 0.5;
    } elseif ($peso >= 5) {
        $incrementoPeso *= 0.25;
    } elseif ($peso >= 0) {
        $incrementoPeso *= 0;
    }


    $valorPaquete = $precioPaquete * $incrementoPeso;



    //Aplicamos un coste adicional por zona, o se desestima el envio.

    if ($zona == "península") {
        $incremento = 0;
    } elseif ($zona == "baleares" ) {
        if ($transporte == "aéreo") {
            $incremento = 0.1;
        } elseif ($transporte == "marítimo") {
            $incremento = 0;
        }
    } elseif ($zona == "canarias") {
        $incremento = 0.1;
    } else {
        die("La zona no es válida, solo enviamos a: peninsula, baleares o canarias.");
    }
    
    $precioZona = $precioPaquete * $incremento;

    //Calculamos el precio total del paquete.
    $precioTotal = $precioBase + $valorPaquete + $precioZona;

    // Calculamos precio total del envío (En este caso por si son varios paquetes).
    $totalEnvio = $precioTotal * $numeroPaquetes;

    //Definimos los echos de nuestra URL.

echo "<h2>Detalles del envío</h2>";
echo "Alto del Paquete : $alto m<br>";
echo "Ancho del Paquete : $ancho m<br>";
echo "Largo del Paquete : $largo m<br>";
echo "Número de paquetes: $numeroPaquetes<br>";
echo "Volumen por paquete: " . number_format($volumen) . " m³<br>";
echo "Peso por paquete: $peso kg<br>";
echo "Zona de envío: $zona<br>";
echo "Metodo Transporte: $transporte<br>";
echo "<h3>Desglose del precio por paquete</h3>";
echo "Precio base (según volumen): €" . number_format($precioBase, 2, ',' , '.') . "<br>";
echo "Incremento por peso: €" . number_format($valorPaquete, 2, ',' , '.') . "<br>";
echo "Incremento por zona: €" . number_format($precioZona, 2, ',' , '.') . "<br>";
echo "<b> Precio final por paquete: €" . number_format($precioTotal, 2, ',' , '.') . "</b><br>";
echo "<b> Precio total del envío: €" . number_format($totalEnvio, 2, ',' , '.') . "</b><br>";

    ?>
</body>
</html>