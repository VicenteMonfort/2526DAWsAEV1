<!DOCTYPE html>
<html>
<head>
    <title>FAST ENVIOS PRECIOS</title>
</head>
<body>
    <h1>Precio total del envío</h1>

<?php

// Añadimos todos los valores GET para poder trabajar con ellos
$numPaquetes = $_GET['numPaquetes'];
$ancho = $_GET['ancho'];
$alto = $_GET['alto'];
$largo = $_GET['largo'];
$peso = $_GET['peso'];
$zona = $_GET['zona'];

// Todos los paquetes tendran las mismas caracteristicas
// Realizamos el Calculo por tamaño
    echo "<strong>Número de paquetes: </strong>" . $numPaquetes . " <br><br>";
    $volumen = $ancho * $alto * $largo;
    if ($volumen <= 0.5) {
        $precioVolumen = 50 * $volumen;
    } elseif ($volumen > 0.5 && $volumen <= 1) {
        $precioVolumen = 75 * $volumen;
    } else {
        $precioVolumen = 100 * $volumen;
    }
    echo "<strong>Ancho: </strong>" . $ancho . " m <br>";
    echo "<strong>Alto: </strong>" . $alto . " m <br>";
    echo "<strong>Largo: </strong>" . $largo . " m <br>";

    echo "<strong>El volumen es de: </strong> " . $volumen . " m&sup3" . " <br><br>";
    echo "<strong>Precio del volumen: </strong> " . $precioVolumen . "€" . " <br>";
    echo "<strong>El Precio por metro cubico sera de: </strong> " . $precioVolumen / $volumen . " €/m&sup3" . " <br><br>";
// Realizamos el Calculo por peso

    echo "<strong>Peso: </strong>" . $peso . " kg <br>";
    if ($peso <= 5) {
        $suplementoPeso = 0;
        echo "Suplemento por peso: " . "+" . $suplementoPeso . "%" . " <br><br>";
    } elseif ($peso > 5 && $peso <= 10) {
        $suplementoPeso = 25;
        echo "Suplemento por peso: " . "+" . $suplementoPeso . "%" . " <br><br>";
    } elseif ($peso > 10 && $peso <= 15) {
        $suplementoPeso = 50;
        echo "Suplemento por peso: " . "+" . $suplementoPeso . "%" . " <br><br>";
    } else {
        echo "<strong><span style=\"color:red;\">El peso excede el limite permitido." .  "</span></strong>" . " <br><br>";
    }
    
    
// Realizamos el calculo por zona

    switch ($zona) {
        case 1;
            $suplementoZona = 0;
            echo "<strong>Península" . "<br>" . "</strong>";
            break;
        case 2;
            $suplementoZona = 0;
            echo "<strong>Baleares terrestre o marítimo" . "<br>" . "</strong>";
            break;
        case 3;
            $suplementoZona = 10;
            echo "<strong>Baleares aéreo" . "<br>" . "</strong>";
            break;
        case 4;
            $suplementoZona = 10;
            echo "<strong>Canarias" . "<br>" . "</strong>";
            break;
        
    }
    echo "El suplemento por zona es de: " . "+" . $suplementoZona . "%" . " <br>";

// Calculo del precio total
    if ($peso <= 15) {
    $precioTotal = $numPaquetes * $precioVolumen * (1 + $suplementoPeso / 100) * (1 + $suplementoZona / 100);
    echo "<h2>El precio total del envío es de: " . $precioTotal . "€" . "</m&sup3>" . "</h2>" . " <br>";
    }else {
    echo "<h2>Sentimos las molestias, realice un envío de menor peso." . "</h2>" . " <br>";
    }

?>
</body>
</html>





