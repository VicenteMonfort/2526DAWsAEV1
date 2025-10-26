<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>AEV1</title>
    </head>

    <body>
        <h1>Ejercicio 2.</h1>
        <p> Se quiere escribir un script en PHP para poder comprobar que la conjetura de Collatz es verdadera. La
            conjetura de Collatz formula que dado un número entero positivo siempre llegaremos a 1 aplicando
            sucesivamente el siguiente algoritmo:<br>

            -Si el número es par se divide entre 2<br>

            -Si el número es impar se multiplica por 3 y se suma 1<br>

            (1 punto): si compruebas inicialmente que el número pasado es correcto (número positivo)<br>

            (1 punto): si además de mostrar que has llegado a 1 y por lo tanto se cumple, muestra toda la sucesión de
            números<br>

            (Opcional 0.5 puntos) Para establecer el número inicial, podemos pasar el valor por GET</p>

        <?php
        //Validacion correcta y positiva
        $n = filter_input(
            INPUT_GET,
            'n',
            FILTER_VALIDATE_INT,
            ['options' => ['min_range' => 1]]
        );
        if ($n === null) {
            echo '<p>No se ha recibido ningún número.</p>';
            exit;
        } elseif ($n === false) {
            echo '<p>Error: debe ser un entero positivo (>= 1).</p>';
            exit;
        } else {
            $start = $n;
            $seq = [$n];


            while ($n != 1) {
                if ($n % 2 == 0) {
                    $n = $n / 2;
                } else {
                    $n = 3 * $n + 1;
                }
                $seq[] = $n;
            }
        }
       

        echo "<h1>Conjetura de Collatz</h1>";
        echo "<p>Número inicial: <strong>{$start}</strong></p>";
        echo "<p>Longitud de la sucesión (incluyendo el 1): <strong>" . count($seq) . "</strong></p>";
        echo "<p>Sucesión:</p>";
        echo "<pre>" . implode(' → ', $seq) . "</pre>";
        echo "<p>Resultado: <strong>Se ha llegado a 1</strong>. La conjetura se cumple para este número.</p>";

        ?>
    </body>

</html>