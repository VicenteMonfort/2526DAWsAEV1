<!DOCTYPE html>
<html>
<head>
    <title>AEV1 Alex Martínez Martins</title>
</head>
<body>
    <h1>Ejercicio 1</h1>

    <?php
       $paquetes=$_GET["paquetes"];
       $ancho=$_GET["ancho"];
       $largo=$_GET["largo"];
       $alto=$_GET["alto"];
       $peso=$_GET["peso"];
       $zona=$_GET["zona"];
       $transporte=$_GET["transporte"];
       $volumen=$ancho*$largo*$alto;
       $porcentajePeso=0;
       $porcentajeZona=0;

       if($paquetes<=0){
        die("Error: por favor, defina un número de paquetes. <br>");
       }

       if($volumen>0 && $volumen<=0.5){
        $precioMetroCubico=50;
       }elseif($volumen>0.5 && $volumen<=1){
        $precioMetroCubico=75;
       }elseif($volumen>1){
        $precioMetroCubico=100;
       }else{
        die("Error: por favor defina ancho, largo y alto válidos. <br>");
       }

       if($peso>0 && $peso<=5){
        $precioPeso=$precioMetroCubico;
        $porcentajePeso=0;
       }elseif($peso>5 && $peso<=10){
        $precioPeso=$precioMetroCubico*1.25;
        $porcentajePeso=25;
       }elseif($peso>10 && $peso<=15){
        $precioPeso=$precioMetroCubico*1.5;
        $porcentajePeso=50;
       }elseif($peso>15){
        die("Error: el peso del paquete es demasiado grande. <br>");
        $porcentajePeso=0;
       }else{
        die("Error: por favor defina un peso válido. <br>");
        $porcentajePeso=0;
       }
       

       if($zona=="península"){
        $precioZona=$precioPeso;
        $precioTotal=$precioZona;
        $porcentajeZona=0;
       }elseif($zona=="baleares"){
            if($transporte=="marítimo"){
                $precioZona=$precioPeso;
                $precioTotal=$precioZona;
                $porcentajeZona=0;
            }elseif($transporte=="aéreo"){
                $precioZona=$precioPeso*1.1;
                $precioTotal=$precioZona;
                $porcentajeZona=10;
            }else{
                die("Error: tipo de transporte no admitido. <br>");
                $porcentajeZona=0;
            }
       }elseif($zona=="canarias"){
        $precioZona=$precioPeso*1.1;
        $precioTotal=$precioZona;
        $porcentajeZona=10;
       }else{
        die("Error: por favor defina la zona entre: península, baleares o canarias. <br>");
        $porcentajeZona=0;
       }

       $precioFinal=$precioTotal*$paquetes;

       echo "Número de paquetes: $paquetes. <br>";
       echo "Ancho de cada paquete: $ancho Metros. <br>";
       echo "Largo de cada paquete: $largo Metros. <br>";
       echo "Alto de cada paquete: $alto Metros. <br>";
       echo "Volumen de cada paquete:" . number_format($volumen, 2, ',' , '.') . " Metros Cúbicos. <br>";
       echo "Precio por volumen de cada paquete: " . number_format($precioMetroCubico, 2, ',' , '.') . "€. <br>";
       echo "Peso de cada paquete: " . number_format($peso, 2, ',' , '.') . "Kg. <br>";
       echo "Cargo adicional por peso: " . number_format($porcentajePeso, 2, ',' , '.') . "%. <br>";
       echo "Zona de envío: $zona. <br>";
       echo "Cargo adicional por zona: " . number_format($porcentajeZona, 2, ',' , '.') . "%. <br>";
       echo "El precio por paquete será de: " . number_format($precioTotal, 2, ',' , '.') . "€. <br>";
       echo "El precio total por $paquetes paquetes será de: " . number_format($precioFinal, 2, ',' , '.') . "€. <br>";
    ?>
</body>
</html>