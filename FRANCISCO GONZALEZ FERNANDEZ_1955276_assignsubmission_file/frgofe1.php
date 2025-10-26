<!DOCTYPE html>
<html>
<head>
    <title>Ejercicio1</title>
</head>
<body>
    <h1>Ejercicio 1</h1>

    <?php
        // Obtener los valores desde la URL (GET)
        $numero_paquetes = $_GET["paquete"];
        $ancho = $_GET["anchoo"];
        $largo = $_GET["largoo"];
        $alto = $_GET["altoo"];
        $peso = $_GET["pesoo"];
        $zona = $_GET["zonaa"];
        $transporte = $_GET["transporte"]; // solo importa si es baleares

        // Calcular el volumen del paquete
        $volumen = $ancho * $largo * $alto;

        // Determinar el precio por metro cúbico
        if ($volumen <= 0.5) {
            $precio_m3 = 50;
        } elseif ($volumen <= 1) {
            $precio_m3 = 75;
        } else {
            $precio_m3 = 100;
}

        // Calcular precio base por paquete
        $precio_base = $precio_m3 * $volumen;

        // Verificar si el peso permite el envío
        if ($peso > 15) {
            echo "El envío ha sido cancelado porque el peso supera los 15kg.";
        exit;
}

        // Aplicar incremento por peso
        if ($peso > 10) {
            $precio_base = $precio_base * 1.5; // 50% más
        } elseif ($peso > 5) {
            $precio_base = $precio_base * 1.25; // 25% más
}
        // Si es hasta 5kg, no cambia

// Calcular el precio total por todos los paquetes
        $precio_total = $precio_base * $numero_paquetes;

// Aplicar incremento por zona
        if ($zona == "canarias") {
            $precio_total = $precio_total * 1.10; // 10% más
        } elseif ($zona == "baleares" && $transporte == "aereo") {
            $precio_total = $precio_total * 1.10; // 10% más si es aéreo
}
// Península y Baleares marítimo no tienen incremento

// Mostrar resultado
        echo "<h3>Resumen del envío</h3>";
        echo "Número de paquetes: $numero_paquetes<br>";
        echo "Dimensiones: $ancho m x $largo m x $alto m<br>";
        echo "Volumen por paquete: $volumen m³<br>";
        echo "Peso por paquete: $peso kg<br>";
        echo "Zona de envío: $zona<br>";
        echo "Tipo de transporte: $transporte<br>";
        echo "<strong>Precio total: " . round($precio_total, 2) . " €</strong>";
    ?>


</body>
</html>
