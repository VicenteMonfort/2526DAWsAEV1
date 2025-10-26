<!DOCTYPE html>
<html>
<head>
    <title>Ejercicio 1: Paqueteria</title>
</head>
<body>
    <h1>Ejercicio 1: Paqueteria</h1>

    <?php

        $numPaquetes = $_GET["numeroPaquetes"];
        $ancho = $_GET["ancho"];
        $largo = $_GET["largo"];
        $alto = $_GET["alto"];
        $peso = $_GET["peso"];
        $zona = $_GET["zona"];
        $tipoTransporte = $_GET["transporte"];
        $precio = 0;

        $dimension = $ancho * $largo * $alto;

        //precio por dimension
        if($dimension < 0.5){
            $precio = 50 * $dimension;
        }else if($dimension < 1){
            $precio = 75 * $dimension;
        }
        else{
            $precio = 100 * $dimension;
        }

        //precio por peso
        if($peso > 5 && $peso < 10){

            $precio = $precio + ($precio * 0.25);

            if(($zona == "Baleares" && $tipoTransporte == "aéreo") || $zona == "Canarias"){
                $precio = $precio + ($precio * 0.1);
            }

            $precio = $precio * $numPaquetes;

            echo "El precio del envío es de $precio €";

        }else if($peso > 10 && $peso < 15){

            $precio = $precio + ($precio * 0.5);

            if(($zona == "Baleares" && $tipoTransporte == "aéreo") || $zona == "Canarias"){
                $precio = $precio + ($precio * 0.1);
            }          

            $precio = $precio * $numPaquetes;

            echo "El precio del envío es de $precio €";

        }else if($peso > 15){

            echo "El peso del paquete supera el máximo permitido de 15kg";

        }
    ?>
</body>
</html>