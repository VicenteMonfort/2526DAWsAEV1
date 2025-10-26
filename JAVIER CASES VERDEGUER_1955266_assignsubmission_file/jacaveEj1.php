<!DOCTYPE html>
<html>
<head>
    <title>Empresa de paquetería</title>
</head>
<body>
    <h1>Coste total del envío</h1>

    <?php
    //JAVIER CASES VERDEGUER 1ªDAW_Online
    // Definimos las variables que vamos a necesitar
    $numerosdepaquetes=$_GET['cantidad'];
    $ancho=$_GET['ancho'];
    $largo=$_GET['largo'];
    $alto=$_GET['alto'];
    $peso=$_GET['peso'];
    $zona=$_GET['zona'];
    $costeadicional=0;
    $incremento=0;
    $precio=0;
    $transporte= array ("marítimo","aéreo"); //creamos la variable de transporte aqui para luego dentro de donde tocar hacer el random
    
    if($numerosdepaquetes>=1 && $peso   >   0) {
        
        $m3= $ancho/100 * $largo/100 * $alto/100; //Todos los valores de medida serán dados en centímetros
        
        if ($m3<0.5){
            $preciobase=50 * $m3;// El precio por metro 3 sera de 50 euros
        }elseif ($m3<1) {
            $preciobase=75 * $m3;// El precio por metro 3 sera de 75 euros
        }else{
            $preciobase=100 * $m3;// El precio por metro 3 sera de 100 euros
        }
       
        if($peso<5){
        
            //El precio se mantiene porque no hay incremento
            echo"Por el peso que ha seleccionado, no hay incremento en el envio";
           
        }elseif ($peso<10){
        
            $incremento=$preciobase * 25/100;   //Creo una nueva variable que me dara el % que se aplicara sobre el precio     
    
        }elseif($peso<15){
        
            $incremento=$preciobase * 50/100;       
       
        }else{
        echo "Por motivos logísticos, nuestra empresa de paqueteria no puede enviar paquetes de más de 15KG.<br>";
            $numerosdepaquetes=0;//Es una manera de anular el calculador de precio asi directamente saldria que costaria 0 euros despues de leer el mensaje
            //Podriamos poner exit y que acabara el programa aqui, quitando las condiciones de peso para las siguientes, pero como no lo hemos dado, no lo he aplicado por temor a que no lo vieras bien
        }

        if($zona=="Península" && $peso<15){
            echo "Por la zona que has seleccionado no hay coste adicional.<br>";

        }elseif($zona=="Baleares" && $peso<15){

            $transporte=$transporte[array_rand($transporte)];//Declaramos que la variable va a ser random, ya que si hay diferencia que salga uno a otro sobre el precio
           if($transporte=="marítimo"){
                echo " El precio de transporte seleccionado no tiene ningun sobrecoste.<br>";
           }else{
            $costeadicional= $preciobase * 10/100;  
           } 
        }elseif ($zona=="Canarias" && $peso<15){//Como aqui no hay difenrecia que salga marítimo o aéreo simplemente aplicamos el coste adicional
            $costeadicional= $preciobase * 10/100;
        
        }else{
             echo"No se puede calcular el incremento del envio, vuelva a intentarlo . <br>";
        }
        $costeadicional=round($costeadicional,2);//Aquí aplicamos el redondeo de los valores coste adicional precio base e incremento para que salgan en centimos, ya que es nuestro sistema monetario, no se si seria la manera correcta de realizarlo pero es la que he encontrado en php manual
        $incremento=round($incremento,2);
        $preciobase=round($preciobase,2);
        $preciobase *=$numerosdepaquetes;//Calculamos el precio base respecto al numero de paquetes
        $precio=$preciobase + $incremento + $costeadicional;//Calculamos el precio total, con ya la cantidad de paquetes puesto, solo haremos el incremento por el peso y por el transporte una vez, ya que solo es un envio el que tenemos que hacer y no somos una empresa abusiva
        echo"El coste total del envio sera de $precio euros. <br>";
         
        echo "Has tenido un incremento de $incremento euros por el peso. <br>";
        
        echo "Has tenido un coste adicional por el transporte de $costeadicional euros por la zona. <br>";
        
        }else{
           echo "El número de paquetes seleccionado es incorrecto";   
        }
        
     ?>

