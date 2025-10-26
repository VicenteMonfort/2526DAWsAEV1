<!DOCTYPE html>
<html>
<head>
    <title>AEV1 Alex Martínez Martins</title>
</head>
<body>
    <h1>Ejercicio 2</h1>

    <?php
       $numero=$_GET["numero"];
       
       if($numero<=0){
        echo "Error: por favor defina un número positivo o mayor que 0. <br>";
       }else{
        while($numero!=1){
            echo "$numero <br>";
            if($numero%2==0){
                $numero=$numero/2;
            }else{
                $numero=($numero*3)+1;
            }
        }

        echo "Finalmente llegamos al Número $numero, con lo cual la conjetura de Collatz se cumple. <br>";

       }
    ?>
</body>
</html>