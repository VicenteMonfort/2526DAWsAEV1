<!DOCTYPE html>
<html>
<head>
    <title>Empresa de paquetería</title>
</head>
<body>
    <h1>Empresa de paquetería</h1>
    
    <?php

    $paquetes=$_GET["paquetes"];
    $ancho=$_GET["ancho"];
    $largo=$_GET["largo"];
    $alto=$_GET["alto"];
    $peso=$_GET["peso"];
    $zona=$_GET["zona"];
    $transporte="Maritimo";
   
    //VOLUMEN PAQUETE
    if($paquetes>0){//comprobar que es mañor a 0
       
         $volumen=$ancho*$largo*$alto;// calcular m3

        if ($ancho>0 && $largo>0 && $alto>0) {//comprobar que el ancho largo y alto es mayor a 0
          
            //calcular precio m3 
           if($volumen<=0.5){
                $precioMetro=50;
           }elseif($volumen<=1){
               $precioMetro=75;
           }else{
                $precioMetro=100;
           }
           //precio total 
           $precioTotalMetro=$volumen*$precioMetro;
        }else{
            echo "El largo, ancho y alto no pueden ser menor a 0 <br>";//imprimir error
        }

        //PESO DEL PAQUETE 
        if ($peso>0) {//comprobar que el peso es mayor a 0
            if ($peso>=15) {//si es mas de 15 error
                echo "El envio se desistima por que el peso del paquete es >=15 k <br>";
            }else {
                if ($peso>=10) {
                  $recargo=1.50; //impuestos 50%  si es >=10 kg
                }elseif($peso>=5){
                    $recargo=1.25; //impuestos 25%  si es >=5 kg
                }else{
                    $recargo=1; //SIN impuestos <5 kg
                }
            }
            $precioPesoTotal=$precioTotalMetro*$recargo;// precio por paquete con recargo de peso
            $precioAntesDeZona=$precioPesoTotal*$paquetes;// total para todos los paquetes
        }else {
            echo "El peso no puede ser menor a 0<br>";//imprimir error si es menor a 0 el peso
        }
        $zonaTexto='';
        $precioFinal=$precioAntesDeZona;//inicializar la variable 

        //ZONA ENVIO
        if ($zona=="Peninsula") {
            $zonaTexto=" Peninsula sin coste adicional <br>";
        }elseif($zona=="Baleares"){
            if($transporte=="Maritimo"){
                $zonaTexto=" Baleares con trasporte Maritimo sin coste adicional <br>";
            }else{
                $zonaTexto=" Baleares con trasporte Aereo con coste adicional de 10% <br>";
                $precioFinal=$precioAntesDeZona*1.10;
            }
        }elseif($zona=="Canarias"){
            $zonaTexto="Canarias 10% idepedientemente del transporte <br>";
            $precioFinal=$precioAntesDeZona*1.10;
        }else{
            echo "Zona seleccionada no correcta <br>";
        }
        //Imprimir por pantalla
        echo "La cantidad de paquetes son: $paquetes <br>";
        echo "El ancho del paquete es: $ancho <br>";
        echo "El largo del paquete es: $largo <br>";
        echo "El alto del paquete es: $alto <br>";
        echo "El precio total del paquete es: $precioTotalMetro €<br>";
        echo "El peso indicado del paquete es: $peso <br>";
        echo "El precio total del peso de los paquetes antes de la zona es de  : $precioAntesDeZona €<br>";
        echo "La zona elegida es: $zona<br>";
        echo "El trasporte elejido es: $transporte <br>";
        echo "El precio final del transporte sera de: $precioFinal €<br>";

    }else{
        echo "Paquetes no puede ser menor a 0 <br>";
    }

    ?>
</body>
</html>