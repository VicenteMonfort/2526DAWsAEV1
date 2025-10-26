<!DOCTYPE html>
<html>
<head>
    <title>FAST ENVIOS PRECIOS</title>
</head>
<body>
    <h1>Precio total del envío</h1>

<?php

// Se introducen los datos GET

$numero = $_GET['numero'];
echo "<strong>Número inicial: " . $numero . "</strong><br><br>";
// Realizamos el script para realizar los calculos

while ($numero > 1) {

   if ($numero % 2 == 0) {
       $numero = $numero / 2;
   } else {
       $numero = $numero * 3 + 1;
   }
   echo $numero . "<br><br>";
   
}


echo "<strong>¡Llegaste al 1!</strong>";






?>
</body>
</html>





