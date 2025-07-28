<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

        P{
            background-color:black;
            height:3px;
            width:100%;
        }
        .ver{
            background-color: pink;
            box-shadow: 10px 10px 10px black;
            padding: 5px;
            gap:4px;
            border: 2px black solid;
            border-radius:10px;
        }
    </style>
</head>
<body>
    <?php
        echo 'Bienvenido a los comentarios con variables leer y demas'.'<br>';
        $a= fopen('punto.txt','r');
        while(!feof($a)){ 
                $leer=fgets($a);
                $ver=nl2br($leer);
                echo "<div class='ver'>".$ver."</div>"."<br>";
        }
      fclose($a);  
?>
<p></p>
<?php
echo '<br>'.'Bienvenido a los con while  2'.'<br>';
        $a= fopen('punto.txt','r');
      while(!feof($a))
        {
            echo fgets($a).'<br>';
        }
        fclose($a);
    ?>
</body>
</html>

