<!DOCTYPE html>
<html>
<head>
    <title>Conjetura de Collatz</title>
</head>
<body>
    <h1>Conjetura de Collatz</h1>
    
    <?php
    $numero=$_GET["numero"];//introducir numero

if ($numero>0) {//comprobar que el numero introduccido no sea menor a 0 
    while ($numero!=1) {//mientras numero no sea igual a 1 
        if ($numero%2==0) {//comprobar si el numero es par
             $numero =$numero/2;//dividir el numero entre 2 
             
        }else {
            $numero=$numero*3+1;//si es impar el numero se multiplica entre 3 y sumamos 1 
          
        }
        //imprimir el valor de numero despues de terminar toda la operacion
        
        echo "$numero<br>";

    }
}else {
    echo"El numero introduccido no puede ser menor a 0";
}
    ?>
</body>
</html>