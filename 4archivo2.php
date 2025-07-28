<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php
    $asunto=$_POST['asu'];
    $come=$_POST['com'];
//W REESCRIBE
//A AÑADE 
     $archivo=fopen('punto.txt','a');

    fwrite($archivo,$asunto .PHP_EOL);
     
    fwrite($archivo,$come .PHP_EOL);

    echo "<a href='5archivo3.php'> Ir a comentarios </a>";
    ?>

</body>
</html>