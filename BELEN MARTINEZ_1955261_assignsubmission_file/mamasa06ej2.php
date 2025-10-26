<!DOCTYPE html>
<html>
<head>
    <title>AP32</title>
</head>
<body>
    <h1>Comprobación conjetura de Collatz  </h1>

    <?php

    $numero = $_GET ['numero'];

    echo " Si tomas cualquier número entero positivo y sigues esta regla: <br>
    si es par, divídelo por 2; si es impar, multiplícalo por 3 y súmale 1, <br>
    repetirás el proceso y siempre acabarás llegando al número 1. <br>
    Puedes comprobarlo indicando cualquier número al final del enlace  :) <br> 
    $numero <br> ";

  if ($numero > 0) 
    {
  while ($numero > 1)  {
    if ($numero % 2 == 0) { $numero = $numero / 2; 
        echo "$numero </br>";} 
    elseif ($numero % 2 != 0) { $numero = $numero * 3 + 1 ; 
        echo "$numero </br>";}
    }
  }
  elseif ($numero <= 0) { echo "No aplicable para Cero o números negativos.";}

     ?>
</body>
</html>