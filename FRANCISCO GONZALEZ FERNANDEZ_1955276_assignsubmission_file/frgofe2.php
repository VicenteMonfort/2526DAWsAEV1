<!DOCTYPE html>
<html>
<head>
    <title>Ejercicio2</title>
</head>
<body>
    <h1>Ejercicio 2</h1>

    <?php
// Obtener el número desde GET
        $numero = $_GET["numero"];

// Mostrar el número inicial
        echo "Número inicial: $numero<br>";

// Comprobar si es positivo
        if ($numero > 0) {
            echo "Sucesión: <br>"; // Mostrar la sucesión
            echo $numero;
        while ($numero != 1) {
            if ($numero % 2 == 0) {
            $numero = $numero / 2;
        } else {
            $numero = $numero * 3 + 1;
        }
        echo " → $numero";
        }
            echo "<br>La conjetura se cumple.";
        } else {
            echo "El número debe ser positivo.";
        }
    ?>


</body>
</html>