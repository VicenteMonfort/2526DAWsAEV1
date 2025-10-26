<!DOCTYPE html>
<html>
<head>
    <title>EJERCICIO 1</title>
</head>
<body>
    <h1>DATOS DEL ENVIO📦🚚💨</h1>

<?php 

//Variables//

$cantidad=$_GET['cantidad'];
$ancho=$_GET['ancho'];
$largo=$_GET['largo'];
$alto=$_GET['alto'];
$peso=$_GET['peso'];                   //en kg//
$zona=$_GET['zona'];
$transporte=$_GET['transporte'];


//calcular volumen//

$volumen_m3=$ancho*$largo*$alto;     //en m3//

if($volumen_m3<=0.5){
    $precio_por_m3=50;               //euros//
} elseif($volumen_m3<=1){
    $precio_por_m3=75;               //euros//
} else {$precio_por_m3=100;          //euros//
}

//precio base por paquete//

$base_por_paquete=$precio_por_m3*$volumen_m3;

if($peso>=10){
    $m_peso=1.50;                                                  //50% mas//
} elseif($peso>=5){
    $m_peso=1.25;                                                  //25% mas//
} else {
    $m_peso=1;                                                     //sin coste adicional//
}

$precio_paquete_pesado=$base_por_paquete*$m_peso;

if($zona==='peninsula'){
    $m_zona=1;                                                     //sin coste adicional//
} elseif($zona==='baleares'){
    $m_zona=($transporte==='aereo')?1.10:1;                        //transporte aereo tiene 10% de recargo y transporte maritimo 0%//
} else {
    $m_zona=1.10;                                                  //envios a canarias tiene 10% de recargo sin importar el transporte//
}

$precio_final_paquete = $precio_paquete_pesado*$m_zona;

$Total_envio = $precio_final_paquete*$cantidad;

if($peso>15){
    echo"❌ El paquete excede el peso maximo ❌ <br><br>";
} elseif($peso<=15){
    echo"✅ El paquete es apto para enviar ✅ <br><br>";
}


//salida en pantalla//

echo"Volumen del paquete: $volumen_m3 m3 <br>";
echo"Precio base por m3: $precio_por_m3 € <br>";
echo"Precio base del paquete: $base_por_paquete € <br>";
echo"Multiplicador por peso: $m_peso <br>";
echo"Peso del paquete: $peso Kg <br>";
echo"Precio segun el peso: $precio_paquete_pesado € <br>";
echo"Multiplicador por zona: $m_zona <br>";
echo"Zona de envio: $zona <br>";
echo"Tipo de transporte: $transporte <br>";
echo"Precio final del paquete: $precio_final_paquete € <br>";
echo"Cantidad de paquetes: $cantidad <br>";
echo"Precio Total del Envio: $Total_envio € <br>";
?>