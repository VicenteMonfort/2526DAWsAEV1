<!DOCTYPE html>
<html>
<head>
    <title>Conjetura de Collatz</title>
</head>
<body>
    <h1>Resultados Conjetura de Collatz</h1>
    <?php

    $numero = $_GET ["numero"];

//Primero verificamos que el número sea positivo.
    if ($numero <= 0) {
        die("Error: Introduce un número entero positivo mayor que cero.");
        }
echo "<b>Número inicial: $numero </b><br>";

// Bucle hasta llegar a 1.

for (; $numero != 1;) {
    echo "$numero <br>";

    if ($numero % 2 == 0) {
        $numero = $numero / 2;
    } else {
        $numero = $numero * 3 + 1;
    }
}

//Pasamos los resultados por echos.

echo "1<br>"; //Se añade el 1, porque al imprimir el 1 se sale del mismo bucle que creamos en el for.
echo"<h2>Comentarios sobre la conjetura</h2>";
echo"La sucesión ha llegado a 1, por lo cual la Conjetura de Collatz se cumple.";

    ?>
</body>
</html>