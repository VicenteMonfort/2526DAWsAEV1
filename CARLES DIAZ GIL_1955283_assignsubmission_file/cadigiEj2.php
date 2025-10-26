<!DOCTYPE html>
<html>
<head>
    <title>AEV1_PROG Carles Diaz 1DAW-S</title>
</head>

<body>
    <h1>Ejercicio2: conjetura de Collatz </h1>
     <?php
     
     $n = $_GET ['n'];

     if ($n <= 0) {
        echo "Introduce un valor válido. Para que sea válido debe ser un numero superior a 0.";
     }else

        if ($n === 1) {
        echo "La conjetura de Collatz es verdadera, n = 1.";
        }
        else {
            echo "La secuencia de instrucciones da estos números enteros: <br>";
            while ($n != 1) {
                if ($n % 2 === 0) {
                    $n = $n / 2;
                    
                    echo "$n <br>";
                }
                else {
                $n = ($n * 3) + 1;
                echo "$n <br>";
            }
            }
            
        }
    


     
     ?>
</body>
</html>