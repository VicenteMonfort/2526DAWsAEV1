<?php

    /* * (Opcional 0.5 puntos) 
     * Comprobamos si el parámetro 'numero' existe en la URL (método GET)
     */
    if (isset($_GET['numero'])) {
        
        $n_input = $_GET['numero'];

        /*
         * (1 punto) Comprobación inicial del número.
         * Usamos filter_var para asegurarnos de que es un entero.
         * Luego comprobamos que es positivo (> 0).
         */
        if (filter_var($n_input, FILTER_VALIDATE_INT) === false || $n_input <= 0) {
            
            // Si no es válido, mostramos un error
            echo "<p class='error'>Error: El valor introducido ('" . htmlspecialchars($n_input) . "') no es un número entero positivo.</p>";
            echo "<p>Prueba de nuevo, por ejemplo: ?numero=7</p>";

        } else {
            
            // Si es válido, lo convertimos a entero
            $n = (int)$n_input;

            echo "<h2>Calculando la secuencia para: $n</h2>";

            /*
             * (1 punto) Mostrar toda la sucesión de números.
             * Guardamos los números en un array (vector) para mostrarlo al final.
             */
            $secuencia = [];
            $secuencia[] = $n; // Añadimos el número inicial al array

            // Iteramos (bucle) MIENTRAS $n sea mayor que 1
            while ($n > 1) {
                
                if ($n % 2 == 0) {
                    // Si el número es par
                    $n = $n / 2;
                } else {
                    // Si el número es impar
                    $n = ($n * 3) + 1;
                }
                
                // Añadimos el nuevo número calculado al array
                $secuencia[] = $n;
            }

            // Cuando el bucle termina, $n es 1. Mostramos la secuencia.
            // Usamos 'implode' para unir todos los números del array con " -> "
            echo "<p class='secuencia'>";
            echo implode(" -> ", $secuencia);
            echo "</p>";

            echo "<p><strong>¡Se ha llegado a 1! La conjetura se cumple.</strong></p>";
        }

    } else {
        // Mensaje inicial si no se ha pasado ningún número
        echo "<p>Por favor, introduce un número en la URL usando el parámetro 'numero'.</p>";
        echo "<p>Ejemplo: <a href='?numero=7'>?numero=7</a></p>";
    }

    ?>