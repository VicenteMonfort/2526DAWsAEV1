<?php
//Número inicial por GET
$i = $_GET['num'];

//Compruebo si el número es positivo
if ($i <= 0) {
    echo "El número debe ser positivo.";
    exit;
}

//Mostramos el inicio
echo "Número inicial: " . $i . "<br>";
echo "Sucesión: " . $i;

//Mientras el número no sea 1, aplicamos Collatz
while ($i != 1) {

    //Si es par
    if ($i % 2 == 0) {
        $i = $i / 2;
    } 
    //Si es impar
    else {
        $i = ($i * 3) + 1;
    }

    //Mostramos el valor siguiente
    echo " - " . $i;
}

//Cuando salimos del bucle es porque hemos llegado a 1
echo "<br><br>Se ha llegado a 1. La conjetura se cumple.";
?>
