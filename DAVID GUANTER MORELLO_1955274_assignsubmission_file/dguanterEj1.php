<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>AEV1</title>
</head>
<body>
    <h1>Ejer1: ¿A cuanto sale el ENVIO?</h1>
    <?php
        
        // variables pasadas por GET
        $num_paquetes = isset($_GET["num_paquetes"]) ? $_GET["num_paquetes"] : 1;
        $alto = $_GET["alto"];
        $largo= $_GET["largo"];
        $ancho= $_GET["ancho"];
        $peso= $_GET["peso"];
        $zona= $_GET["zona"];
        $transporte= $_GET["transporte"];


        echo "Número de paquetes: $num_paquetes<br>";
        echo "ancho: $ancho,", " <br>";
        echo "alto: $alto,", " <br>";
        echo "largo: $largo,", " <br>";
        echo "peso: $peso,", " <br>";
        echo "zona: $zona,", " <br>";
        echo "transporte: $transporte,", " <br>";

        // variables creadas
        $totalconMedidas = 0;
        $totalconPeso = 0;
        $totalsegunZona = 0;
        $totalVolumen = $ancho * $alto * $largo;
        
       
        //Precio por volumen
        if (($totalVolumen  <= 0.5))  {
            echo "El coste del envio por volumen es: " .$totalconMedidas = $totalVolumen  * 50, " € por caja<br>"; 
        } 
        elseif  (($totalVolumen  <= 1))  {
            echo "El coste del envio por volumen es: " .$totalconMedidas = $totalVolumen  * 75, " € por caja<br>";  
        } 

        elseif (($totalVolumen > 1))  {
            echo "El coste del envio por volumen es: " .$totalconMedidas = $totalVolumen  * 100, " € por caja<br>"; 
        } 



        //Precio modificado segun peso

        if  ($peso <= 5)  {
            echo "El coste no tiene incremento: ". $totalconPeso = $totalconMedidas, " € por caja <br>";
        }
        elseif  ($peso <= 10){
            echo "El coste tiene incremento del 25%: ". $totalconPeso = ($totalconMedidas * 0.25) + $totalconMedidas," € por caja <br>";
        }
        elseif  ($peso <= 15){
            echo "El coste tiene incremento del 50%: ". $totalconPeso = ($totalconMedidas * 0.50) + $totalconMedidas, " € por caja <br>";
        }
        elseif  ($peso > 15){
            echo $totalconPeso = "Se desestima el envio por superar los 15 kilos", "<br>";
            exit();
        }


        //Precio modificado segun zona y tipo de transporte

        if  ($zona == "peninsula")  {
            echo "El coste no tiene incremento de precio por zona peninsula: ". $totalsegunZona = $totalconPeso, " € por caja <br>";
        }
        elseif  (($zona == "baleares")and ($transporte == "maritimo")){
            echo "El coste no tiene incremento de precio por zona baleares y trnsporte maritimo: ". $totalsegunZona = $totalconPeso, " € por caja <br>";
        }
        elseif  (($zona == "baleares")and ($transporte == "aereo")){
            echo "El coste tiene incremento de precio del 10% por zona baleares y transporte aereo: ". $totalsegunZona = ($totalconPeso * 0.10) + $totalconPeso, " € por caja <br>";
        }
        elseif  (($zona == "canarias")){
            echo "El coste tiene incremento de precio del 10% por zona canarias independientemente del tipo de trnsporte: ". $totalsegunZona = ($totalconPeso * 0.10) + $totalconPeso, " € por caja <br>";
        }

       
      //precios totales segun medias, peso y zona * numero de paquetes 
      $precioMedias = $totalconMedidas * $num_paquetes; 
      $precioPeso = $totalconPeso * $num_paquetes; 
      $precioZona = $totalsegunZona * $num_paquetes; 
      
      echo "Total precio envio por volumen: ". $precioMedias, " €<br>"; 
      echo "Total precio envio modificado segun peso: " . $precioPeso, " €<br>"; 
      echo "Total precio envio modificado segun zona: " . $precioZona, " €<br>"; 
      
      //precio total del envio
      $precioTotalEnvio = $totalsegunZona * $num_paquetes; 
      echo "Precio total del envío por $num_paquetes paquete(s): " . $precioTotalEnvio . " €<br>";

    ?>
</body>
</html>