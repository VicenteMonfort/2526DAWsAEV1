<!DOCTYPE html>
<html>
<head>
    <title>AP32</title>
</head>
<body>
    <h1>Calculadora de precios de envío</h1>

    <?php

    $numpaquetes= $_GET ['numpaq'] ;  

    $alto= $_GET ['alto']; //por GET. Pasaremos los valores de número de paquetes, ancho, largo, alto, peso y zona//
    $ancho= $_GET ['ancho'];
    $largo= $_GET ['largo'];

    $peso= $_GET ['peso'];
    $zona= $_GET ['zona'];

    $volumen= ($alto * $ancho * $largo) ;
    $preciobase = 0; 


//parte precio base por volumen y paquetes//
    if ($volumen <= 0.5 ) { $preciobase = $numpaquetes * $volumen * 50;}
    elseif ($volumen > 0.5 && $volumen <=1) 
        { $preciobase = $numpaquetes * $volumen*75;}
    elseif ($volumen > 1 )
         { $preciobase = $numpaquetes * $volumen * 100;}

//parte de suplemento del peso// 
   if ($peso <= 5) 
    {$suplemento = $preciobase * 0 ; $precioconsuplemento = $preciobase + $suplemento;}
   elseif ($peso > 5 && $peso <= 10) 
    {$suplemento = $preciobase * 0.25 ; $precioconsuplemento = $preciobase + $suplemento;}
    elseif ($peso > 10 && $peso <= 15) 
    {$suplemento = $preciobase * 0.50 ; $precioconsuplemento = $preciobase + $suplemento;}

//parte impuesto por zona// solo si no supera el peso//
    if ($peso <=15) { 
     if ($zona == "peninsula" ) 
            { $impuesto = $precioconsuplemento * 0; $precioconimpuesto = $precioconsuplemento + $impuesto;}
     elseif ($zona == "baleares" ) 
         { $aereo = rand  (0,1); //a suertes 0 es que es maritimo y 1 que es aereo//
            if ($aereo == "1") { $impuesto = $precioconsuplemento * 0.10; $precioconimpuesto = $precioconsuplemento + $impuesto;}
            else { $impuesto = $precioconsuplemento * 0; $precioconimpuesto = $precioconsuplemento + $impuesto;}}
    elseif($zona == "canarias" ) 
        { $impuesto = $precioconsuplemento * 0.10; $precioconimpuesto = $precioconsuplemento + $impuesto;}

    echo "Estimado cliente, para los datos introducidos, el precio de su envío sera de <br>
                                 $preciobase euros iniciales,<br>
                                $suplemento euros de suplemento por peso, <br>
                                $impuesto euros de impuestos por envío a $zona, <br>
                                Haciendo esto un total de $precioconimpuesto euros.<br>
                                Gracias por su envío. ";} 

    elseif ($peso > 15) {echo "El envío ha sido desestimado por superar los 15kg de peso permitidos.";}

                                //sé que he usado mucho texto, lo he hecho por asegurarme que saliera todo bien// 

     ?>
</body>
</html>