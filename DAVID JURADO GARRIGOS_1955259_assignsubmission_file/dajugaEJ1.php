<?php

// El servicio de envíos de una empresa de paquetería necesita una aplicaón web que calcule el envío en función de los datos que provee el usuario.

//El usuario puede enviar más de un paquete en el envío. Todos los paquetes serán de las mismas características.

     $paquetes = $_GET['paquetes'];

/* El tamaño del paquete se calcula en metros cúbicos, y tiene los siguientes precios
 Hasta 0.5 m3: 50 €     
 Hasta 1 m3: 75 €
 A partir de 1 m3: 100 € */

    $ancho = $_GET['ancho'];
    $alto = $_GET['alto'];
    $largo = $_GET['largo'];

    $volumen = $ancho * $alto * $largo;

    if ($volumen <= 0.5) {
        $precioBase = 50;
    } elseif ($volumen <= 1) {
        $precioBase = 75;
    } else {
        $precioBase = 100;
    }

    $costeVolumen = $precioBase * $volumen;

    // El peso del paquete tiene un plus sobre el precio base de la siguiente forma:
/* Hasta 5 kg: 0 €
A partir de 5 kg se aplica un 25% sobre el precio anteriormente calculado.
A partir de 10 kg se aplica un 50% sobre el precio anteriormente calculado.
A partir de 15 kg se desestima el envio. */

    $peso =$_GET ['peso'];

    if ($peso <5) {
        $plusPeso = 0;
    } elseif ($peso <10) {
        $plusPeso = 0.25 * $costeVolumen;
    } elseif ($peso <15) {
        $plusPeso = 0.50 * $costeVolumen;
    } else {
        echo "Se desestima el envío por exceso de peso.";
        exit();
    }

    $costeConPeso = $costeVolumen + $plusPeso;

/* Las zonas de envío son:
Península, sin coste.
Baleares, sin coste adicional so el transporte es marítimo. 10% si es aéreo.
canarias, 10% adicional, independientemente del transporte. */

    $zona = $_GET['zona'];
    $transporte = $_GET ['transporte'];


    if ($zona == 'Península') {
        $plusZona = 0;
    } elseif ($zona == 'Baleares') {
        if ($transporte == 'Marítimo') {
            $plusZona = 0;
        } elseif ($transporte == 'Aéreo') {
            $plusZona = 0.10 * $costeConPeso;
        }
    } elseif ($zona == 'Canarias') {
        $plusZona = 0.10 * $costeConPeso;
    }

    $costeFinalPorPaquete = $costeConPeso + $plusZona;
    $costeTotal = $costeFinalPorPaquete * $paquetes;


    echo "El coste total del envío es: $costeTotal euros.";

?>