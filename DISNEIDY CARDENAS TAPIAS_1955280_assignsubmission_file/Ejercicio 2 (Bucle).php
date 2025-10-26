<!DOCTYPE html>
<html>
<head>
    <title>EJERCICIO 2</title>
</head>
<body>
    <h1>Conjetura de Collatz💡🧠</h1>

<?php 


$numero=$_GET['numero'];

if($numero<=0){
    echo"Error: introduce un numero entero positivo";
    exit;
}

echo"Numero Inicial: $numero <br><br>";
echo"Secuencia Numerica <br><br>";

$valor=$numero;

//BUCLE SI EL NUMERO ES DIFERENTE DE 1//
while($valor !=1){
    echo"👉 $valor";

    if($valor % 2 == 0){
       $valor=$valor/2;  
    } else {
        $valor=$valor*3+1;
    }
}


