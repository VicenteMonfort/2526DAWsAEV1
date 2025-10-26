<!DOCTYPE html>
<html>
<head>
    <title>Conjetura de Collatz</title>
</head>
<body>
    <h1>Número positivo</h1>

    <?php
    //JAVIER CASES VERDEGUER 1ªDAW_Online
    // Definimos las variables que vamos a necesitar
    $numero=$_GET['numero'];
    if($numero>=1){//Nos aseguramos de que el numero aplicado por GET sea un numero positivo, anulamos el 0 ya que no nos interesa al no poder aplicarle la division para que salga 1
      $numeroinicial=$numero;
      while($numero!=1){//Realizamos un while mientras el resultado no sea 1, que es lo que buscamos, teniendo las condiciones de antes si es par o no
        if($numero>=1){//Nos aseguramos de que el numero aplicado por GET sea un numero positivo, anulamos el 0 ya que no nos interesa al no poder aplicarle la division para que salga 1
        if($numero % 2==0){//Comprobamos que el número dado sea par 
        echo "El número $numero es par.<br>";
        $forma="par";
      }else{//Comprobamos que el número dado sea impar
        echo "El número $numero es impar. <br>";
        $forma="impar";
      }
      if($forma=="par"){//Comprobamos que el número es par
        $numero=$numero/2;
      }elseif($forma=="impar"){//Comprobamos que el número es impar
        $numero=($numero * 3)+1;
      }
      }
      echo "El número inicial de la operacion es $numeroinicial.<br> ";
      echo "El número resultando de la operacion es $numero.<br>";
    }else{
      echo  "El numero introducido es incorrecto";
    }

    }
  
     ?>

