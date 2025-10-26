

<?php

/* Se requiere un script en PHP para poder comprobar la conjetura de Collatz.
El usuario deberá de introducir un número incial mayor que 0. */

    $n = $_GET['n'];

    if ($n <= 0) {
        echo "El número inicial debe ser mayor que 0.";
        exit();
    }

/* Si el número es par, se divide entre 2.
Si el número es impar, se multiplica por 3 y se le suma 1.
El proceso se repite con el resultado obtenido, hasta llegar a 1. */

    $n_inicial = $n;
    $secuencia = [];

    $pasos = 0;

    $secuencia [] = $n;

    while ($n != 1) {
        if ($n % 2 == 0) {
            $n = $n / 2;
        } else {
            $n = 3 * $n + 1;
        }
        $secuencia [] = $n;
        $pasos++;
    }

    echo "Secuencia de Collatz para el número inicial $n_inicial: <br>";
    echo implode(" -> ", $secuencia) . "<br>";
    echo "Número de pasos para llegar a 1: $pasos";

?>