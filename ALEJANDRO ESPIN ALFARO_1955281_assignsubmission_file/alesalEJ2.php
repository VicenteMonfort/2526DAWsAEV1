<!DOCTYPE html>
<html>
<head>
    <title>Ejercicio 2: Conjetura de Collatz</title>
</head>
<body>
    <h1>Conjetura de Collatz</h1>

    <?php
//Se recoge el número pasado por GET
$n = $_GET["n"];

// Se comprueba si es positivo
if ($n < 1){
    echo "Error: El número debe ser un entero positivo.<br>";
} else {
    // Se muestra el número inicial
    echo "Número inicial:" . $n . "<br>";
    while ($n != 1){
        
        // Si el número es par lo dividimos entre 2
        if ($n % 2 == 0){
            $n = $n / 2;
        } else{
            // Si el número es impar lo multiplicamos por 3 y sumamos 1
            $n = $n * 3 + 1;
        }

        // Mostramos cada número de la sucesión
        echo $n . "<br>";
    }

    // Cuando llegamos a 1 mostramos el mensaje final
    echo "Se ha llegado a 1. Se cumple la conjetura de Collatz.";
}
?>
</body>
</html>