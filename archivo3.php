<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        echo 'Bienvenido a los comentarios con variables leer y demas'.'<br>';
        $a= fopen('punto.txt','r');
        while(!feof($a)){
                $leer=fgets($a);
                $ver=nl2br($leer);
                echo $ver;
        }
      fclose($a);  


echo 'Bienvenido a los con while  2'.'<br>';
        $a= fopen('punto.txt','r');
      while(!feof($a))
        {
            echo fgets($a).'<br>';
        }
        fclose($a);
    ?>
</body>
</html>

