<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>AEV1</title>
</head>
<body>
    <h1>Ejer2: ¿La conjetura de Collatz?</h1>
    <?php
        
        // variables pasadas por GET
        
        $numInicial = $_GET["numInicial"];
        


        echo "El número inicial es: $numInicial <br>";
        

        // variables creadas
    
       $valor1 = 1;
       $numero = $numInicial;
       
        // comprobación para saber si el número es valido
        if ($numInicial > 0 ) {
            echo "el número es valido","<br>";
        }

        else {
            echo " El número no es valido";
            exit();
        }

            
        // Bucle while para llegar a uno

         while ($numero > $valor1) {
            
        
        
         echo "numero: " . $numero, "<br>";
        


        // comprobamos si es par o impar para continuar el bucle
        if (($numero % 2 == 0 ))  {
             $numero = $numero / 2; 
        } 
        elseif  (($numero % 2 != 0) and ($numero != 1)) {
             $numero = ($numero *3 ) + 1;
        }
        elseif  (($numero % 2 != 0) and ($numero == 1)){
            echo $numero . "<br>";
            exit();
        }
        
        }



        
        echo "¡Se ha llegado a 1! Comprobado que la conjetura de Collatz si se cumple.";
    ?>
</body>
</html>