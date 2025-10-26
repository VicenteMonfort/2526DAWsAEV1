<?php
//Calcular precio total

/////////Variables

//Pasamos a GET el numero de paquetes, ancho, largo, alto, peso, zona y transporte.
$cantidadPaq=$_GET["cantidadPaq"];$ancho=$_GET["ancho"];$largo=$_GET["largo"];$alto=$_GET["alto"]; $pesoPaq=$_GET["pesoPaq"];$zonaEnvio=$_GET["zonaEnvio"];$transporte=$_GET["transporte"];
$puedeEnviar=true;
//Cálculo del tamaño del paquete
$metrosCub=$ancho*$largo*$alto;

//Precio base por metro cúbico
if($metrosCub<=0.5){
$precioM3=50;
}else if($metrosCub<=1){
    $precioM3=75;
}else{$precioM3=100;}

//Plus por peso del paquete
if($pesoPaq>5&&$pesoPaq<=10){
    $plus=25;
}else if($pesoPaq<=15){
    $plus=50;
}else if ($pesoPaq>15){
    echo "Se desestima el envío del paquete.";
    $puedeEnviar=false;
}

//Cálculo del precio
$precio=$precioM3*$metrosCub*$cantidadPaq;
if($puedeEnviar==true){
    $precio=$precio+($precio*$plus)/100;  
}

//Plus zona de envío    
if($zonaEnvio=="baleares"){
    if($transporte=="aereo"){
        $precio=$precio+($precio*10)/100;
    }
}else if($zonaEnvio=="canarias"){
    $precio=$precio+($precio*10)/100;
}

//Resultado
if($puedeEnviar==true){
    echo "El precio total del envío es de " .$precio."€";
}

//http://localhost:8080/PROGRAMACION/ivcoraEj1.php?cantidadPaq=10&ancho=1&largo=1&alto=1&pesoPaq=12&zonaEnvio=baleares&transporte=aereo
?>