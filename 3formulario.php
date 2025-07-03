<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

        label,P{
            background-color:purple ;
            color: white;
        }
        body{
            background-color: black;
            display: flex;
            justify-content:center;
        }
        div{
            margin-top:40px;
        }

    </style>
</head>
<body>
    <div>
        <p>COMENTARIOS</p>
        <?php
        include('texto.php');
        ?>
        <br>
        <form action="4archivo2.php" method="post">

            <label class="">ASUNTO:</label><br>
            <input type="text" name="asu" id="uno"><br>
            <label class="cada">COMENTARIO:</label><br>
            <textarea name="com" id=""></textarea><br>
            <input type="submit"> 

        </form>
    </div>
        
</body>
</html>