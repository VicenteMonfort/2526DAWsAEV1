<!DOCTYPE html>
<html>
<head>
    <title>AEV1_PROG Carles Diaz 1DAW-S</title>
</head>

<body>
    <h1>Ejercicio1: Empresa de Paquetería </h1>
     <?php
     
     //declaración de variables.
     $numPaquetes = $_GET ['numPaquetes']; // El usuario puede enviar más de un paquete en el envío
     $anchoPaquete = $_GET ['anchoPaquete'];
     $altoPaquete = $_GET ['altoPaquete'];
     $largoPaquete = $_GET ['largoPaquete'];
     $dimensionPaquete = $anchoPaquete * $largoPaquete * $altoPaquete;

    // Calculo precio base respecto a las dimensiones

    if ($dimensionPaquete <= 0.5) {
       $precioBaseM3 = 50;
    }elseif ($dimensionPaquete <= 1) {
        $precioBaseM3 = 75;
    } else 
        $precioBaseM3 = 100;

     //precio total final en relacion a dimensiones
    $precioTotalEnvio = $numPaquetes * $precioBaseM3 * $dimensionPaquete;

    //Calculo precio respecto a peso

    $pesoPaquete = $_GET ['plusPesoPrecio'];
    $recargo1= 1;
    $recargo025 = 0.25;
    $recargo050 = 0.50;

    if ($pesoPaquete > 15) {
         echo "No se puede enviar un paquete de peso superior a 15Kg.<br>";
         exit;
    }elseif ($pesoPaquete > 10) {
        $precioTotalEnvio = $precioTotalEnvio + ($precioTotalEnvio * $recargo050);
    }elseif ($pesoPaquete > 5) {
        $precioTotalEnvio = $precioTotalEnvio + ($precioTotalEnvio * $recargo025);
    }    else {
        //vacio
    }
         


     //Calculo recargo por envío a Peninsula, Baleares o Canarias.
    $zonaEnvio = $_GET['zonaEnvio'];
    $transporteEnvio = $_GET ['transporteEnvio'];

    if ($zonaEnvio == "Canarias" || ($zonaEnvio == "Baleares" && $transporteEnvio == "Aereo")) {

    $precioTotalEnvio = $precioTotalEnvio + ($precioTotalEnvio * 0.10);
    echo "Zona de envío escogida '$zonaEnvio', tiene un recargo de 10%. <br>";
    echo "Tu paquete mide $altoPaquete x $anchoPaquete x $largoPaquete.<br>" ;
    echo "El peso de tu/s paquete/s es de $pesoPaquete kg.<br>" ;

    echo "El precio de $numPaquetes paquetes con un precio base de $precioBaseM3 € es de $precioTotalEnvio €.<br>";
        
    }else {
    echo "Zona de envío escogida $zonaEnvio. No hay costes adicionales de envío.<br>";
    echo "Tu paquete mide $altoPaquete x $anchoPaquete x $largoPaquete.<br>" ;
    echo "El peso de tu/s paquete/s es de $pesoPaquete kg.<br>" ;

    echo "El precio de $numPaquetes paquetes con un precio base de $precioBaseM3 € es de $precioTotalEnvio €.<br>"; 
    }
    

    










    
     ?>


</body>

</html>