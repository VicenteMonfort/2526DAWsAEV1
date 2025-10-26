<?php
//Comprobar Conjetura de Collatz
//Pasamos el numero por n
$nInicial=$_GET["n"];

//Valoramos si es positivo o negativo y ejecutamos el algoritmo
if($nInicial<=0){
    echo "El número debe ser positivo.";
}else{
    
    echo "Se verifica la Conjetura de Collatz y la sucesión de números es: ";
    //Bucle dependiendo de si són pares o impares
    while($nInicial!=1){
        if($nInicial%2==0){
           $nInicial=($nInicial/2); 
        }else{$nInicial=(($nInicial*3)+1);}
        if($nInicial!=1){
            echo $nInicial.", ";
        }else{echo $nInicial.".";}
    }
}
//http://localhost:8080/PROGRAMACION/ivcoraEj2.php?n=156
?>