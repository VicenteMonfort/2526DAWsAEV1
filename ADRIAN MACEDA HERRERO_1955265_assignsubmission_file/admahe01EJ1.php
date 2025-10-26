<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>AEV1</title>
    </head>

    <body>
        <h1>Ejercicio 1.</h1>
        <p> El servicio de envíos de una empresa de paquetería necesita una aplicación web que calcule el precio total
            del envío (0.5 punto) en función de los datos que provee el usuario. En este caso, los criterios són los
            siguientes:<br>

            (1 punto) El usuario puede enviar más de un paquete en el envío (todos serán de las mismas
            características).<br>

            (1.5 punto) El tamaño del paquete se calcula en m3, a partir de pedir al usuario las medidas de ancho, largo
            y alto, y tiene los siguientes precios base:
            hasta 0.5 m3, 50€ por m3
            hasta 1m3, 75€ por m3
            a partir de 1m3, 100€ por m3<br>

            (1.5 punto) el peso del paquete tiene un plus sobre el precio base de la siguiente forma:
            hasta 5kg no tiene incremento de precio anteriormente calculado
            a partir de 5 kg se aplica un 25% sobre el precio anteriormente calculado
            a partir de 10 kg se aplica un 50% sobre el precio anteriormente calculado
            a partir de 15kg se desestima el envio<br>

            (1.5 punto) las zonas de envío posibles són:
            Península, sin coste adicional
            Baleares, sin coste adicional si es transporte marítimo o un 10% si és transporte aéreo
            Canarias, con un 10% adicional, independientemente del tipo de transporte<br>

            (Opcional 0.5 puntos) Puedes establecer los valores de entrada por GET. Pasaremos los valores de número de
            paquetes, ancho, largo, alto, peso y zona.</p>

        <?php
        $p = $_GET['p'];//numero de paquetes
        $a = $_GET['a'];//ancho
        $l = $_GET['l'];//largo
        $h = $_GET['h'];//alto
        $w = $_GET['w'];//peso
        $z = $_GET['z'];//zona
        $t = $_GET['t'];//transporte
        $priceVol = 0;
        $priceZone = 0;
        $priceWeight = null;
        //Calculo peso
        $volume = $a * $l * $h;
        if ($volume <= 0.5) {
            $priceVol = 50;
        } elseif ($volume <= 1) {
            $priceVol = 75;
        } else {
            $priceVol = 100;
        }

        // Peso del paquete 
        if ($w <= 5) {
            $priceWeightt = 1;
        } elseif ($w <= 10) {
            $priceWeight = 1.25;
        } elseif ($w <= 15) {
            $priceWeight = 1.50;
        } else {
            $priceWeight = 0;//aqui hay que anyadir algo que diga que si el resultado es 0 se descarta el envio
        }


        if ($priceWeight == 0) {
            echo "Exceso de peso";
            echo "<br>";
        } else {

            echo "El extra de peso es  " . $priceWeight . " euros" . "\n";
            echo "<br>";
        }
        echo "<br>";


        //Zona de envio
if ($z === 'peninsula') {
    switch ($t) {
        case 'tierra':
        case 'mar':
        case 'aire':
            $priceZone = 1.00; break;
        default: exit('Transporte inválido. Usa: tierra, mar o aire.');
    }
} elseif ($z === 'baleares') {
    switch ($t) {
        case 'tierra': exit('No se puede hacer por tierra a Baleares.');
        case 'mar':    $priceZone = 1.00; break;
        case 'aire':   $priceZone = 1.10; break;
        default: exit('Transporte inválido. Usa: tierra, mar o aire.');
    }
} elseif ($z === 'canarias') {
    switch ($t) {
        case 'tierra':
        case 'mar':
        case 'aire':
            $priceZone = 1.10; break;
        default: exit('Transporte inválido. Usa: tierra, mar o aire.');
    }
} else {
    exit('No existe zona. Usa: peninsula, baleares o canarias.');
}


        //Precio total envio
        $totalPrice = $p * $priceVol * $priceWeight * $priceZone;

        if ($priceWeight == 0) {
            echo "Se descarta el envio por exceso de peso";
            echo "<br>";
        } else {
        }
        echo "Volumen por paquete: " . number_format($volume, 3, ',', '.') . " m³<br>";
        echo "<br>";
        echo "Precio base (por paquete): " . number_format($priceVol, 2, ',', '.') . " €<br>";
        echo "<br>";
        echo "Factor por peso: " . number_format((float)$priceWeight, 2, ',', '.') . "<br>";
        echo "<br>";
        echo "Zona: $z | Transporte: $t | Factor zona/transporte: " . number_format($priceZone, 2, ',', '.') . "<br>";
        echo "<br>";
        echo "Número de paquetes: $p<br>";
        echo "<br>";
        echo "Precio total: <strong>" . number_format($totalPrice, 2, ',', '.') . " €</strong>";
        ?>
    </body>

</html>