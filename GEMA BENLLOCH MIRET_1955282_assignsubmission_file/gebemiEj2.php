<!DOCTYPE html>
<html>
<head>
    <title>Ejercicio 2: Conjetura de Collatz</title>
</head>
<body>
    <h1>Ejercicio 2: Conjetura de Collatz</h1>

    <?php
        $numero = $_GET["numero"];

        echo "El número elegido es $numero <br>";
        echo "La secuencia de números es la siguiente:<br>";

        while($numero > 1){
            if($numero % 2 == 0){
                $numero = $numero / 2;
            }else {
                $numero = $numero * 3 + 1;
            }

            echo "$numero<br>";
        }
    ?>
</body>
</html>