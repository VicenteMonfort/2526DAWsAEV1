<?php


$numero = $_GET['n'] ?? null;

if ($numero === null) {
    echo '<form method="get">
            <h3>Comprobador Conjetura de Collatz</h3>
            Introduce un número positivo: 
            <input type="number" name="n" required>
            <input type="submit" value="Comprobar">
          </form>';
    exit;
}


if (!is_numeric($numero) || $numero <= 0 || intval($numero) != $numero) {
    echo "<h3>Error: Debes introducir un número entero positivo.</h3>";
    exit;
}

$n = intval($numero);
$secuencia = [$n];

while ($n != 1) {
    if ($n % 2 == 0) {
        $n = $n / 2;
    } else {
        $n = 3 * $n + 1;
    }
    $secuencia[] = $n;
}

echo "<h2>Conjetura de Collatz</h2>";
echo "Número inicial: $numero<br>";
echo "Secuencia: " . implode(" → ", $secuencia);
echo "<h3>Se ha llegado a 1. La conjetura se cumple para este número.</h3>";
?>
