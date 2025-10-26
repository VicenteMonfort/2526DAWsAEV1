<!DOCTYPE html>
<html>
<head>
    <title>AEV1 EJ1</title>
</head>
<body>
    <h1>Calculadora de Paquetería</h1>
<?php


$ancho = $_GET["ancho"];
$largo = $_GET["largo"];
$alto = $_GET["alto"];

$paquete = $_GET["paquete"];

//calculo de m3, dado que los valores asumimos que se darán en cm dividiremos el resultado de calculom3 /1000 dm3 /1000 m3

$calculom3 = (($ancho * $largo * $alto) / 1000) / 1000;

if ($calculom3 <= 0.5) {
    $precio = 50;
} elseif ($calculom3 > 0.5 && $calculom3 <=1) {
    $precio = 75;
} else {
    $precio = 100;
}

//vamos a sumare el valor del peso

$peso = $_GET["peso"];

if ($peso > 15){
    echo "El paquete no se puede enviar demasiado peso.";
    exit;
}

// He tenido que buscar un comando en este caso exit para que no me ejecute los otros echo y de errores al no cumplirse los otros if y no asignar variables. 
// en este caso el exit cierra la ejecuccion una vez llega a el y deja de ejecutar los siguientes comandos. Se podría colocar al inicio del codigo para no iniciar el primer if.

if ($peso >= 10 && $peso <= 15) {
    $tarifapeso = 0.5;
    $notaTarifa = ""; // tengo que añadir $notaTarifa tambien a los otros if porque sino da error de variable no establecida.
} elseif ($peso >= 5 && $peso < 10) {
    $tarifapeso = 0.25;
    $notaTarifa = "";
} elseif ($peso < 5) {
    $tarifapeso = 0;
    $notaTarifa = "No se aplica ninguna tarifa ya que su peso es inferior a 5kg";
} 

$precioTarifa = ($precio * $tarifapeso) + $precio;

//a continuación le sumaremos la siguiente tarifa de destino


/*he buscado infomacion sobre el uso de ?? ya que en la utilizacion de de estos ayuda a que funcionen los if de Peninsula y Canarias ya que toma de referencia solo detino
y al no introducir ningna variable de transporte la ignora. Recordar utilizar == para cuando quiera que un if compare. */

$destino = $_GET["destino"] ?? '';
$transporte = $_GET["transporte"] ?? '';

if ($destino == "Peninsula") {
    $tarifaT = 0;
    $notaT = "No se aplica ninguna tarifa de transporte.";
} elseif ($destino == "Baleares" && $transporte == "maritimo") {
    $tarifaT = 0;
    $notaT = "No se aplica ninguna tarifa de transporte.";
} elseif ($destino == "Baleares" && $transporte == "aereo") {
    $tarifaT = 0.10;
    $notaT = "Se aplica una tarifa del 10% por transporte aéreo.";
} elseif ($destino == "Canarias") {
    $tarifaT = 0.10;
    $notaT = "Se aplica una tarifa del 10% por transporte a Canarias.";
} else {
    echo "No se reconocen los valores introducidos.";
    exit;
}

$precioFinal = ($precioTarifa * $tarifaT) + $precioTarifa;


echo "La tarifa que aplicaremos a $paquete paquete/s de tamaño $calculom3 m3, es de un precio de $precio €. <br>";
echo "A el/los paquete/s se les aplica una tarifa por peso, el peso es $peso kg. El precio tras la tarifa es $precioTarifa €. $notaTarifa .<br>";
echo "<br> Además de la tarifa anterior se sumara una Tarifa por el destinatario, siendo este $destino. $notaT El precio final del envio es $precioFinal €.<br>";

?>



