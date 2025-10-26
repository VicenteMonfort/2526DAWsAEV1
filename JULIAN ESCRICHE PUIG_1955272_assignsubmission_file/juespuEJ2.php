<!DOCTYPE html>
<html>
<head>
    <title>AEV1 EJ2</title>
</head>
<body>
    <h1>Calculo de la conjetura de Collat</h1>
<?php

$numeroInicial = $_GET["numero"];

while ($numeroInicial != 1) {  //con != lo que hacemos es que mientras el numeroInicial sea diferente a 1 realice el bucle 
    if ($numeroInicial % 2 == 0) { //he investigado como hacer para que me detecte cuando es un numero par utilizando el % 2 == 0 
        $numeroInicial = $numeroInicial / 2;
    } else {                        // ya no hace falta colocar nada mas ya que o es par o es impar, podria dar error si colocamos un numero negativo ya que en ningun lugar le estamos verificando que lea solo numeros positivos.
        $numeroInicial = $numeroInicial * 3 + 1;
    }
    echo "$numeroInicial <br>";
}



?>



