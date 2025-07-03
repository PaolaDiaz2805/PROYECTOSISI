<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
        <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>

  <link href="CSS/form_regis.css" rel="stylesheet" type="text/css" />
    <title>Document</title>
</head>
<body>
    <?php
    
    $servername = "localhost";
    $username = "root";
    $password="";
    $dbname="proyectoSISI";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexion fallida: ". $conn->connect_error);
}
$CI=$_GET['ci'];
$sql = "SELECT * 
        FROM CUENTA 
        INNER JOIN INFORMACION ON CUENTA.User = INFORMACION.CI 
        WHERE CUENTA.User='$CI' AND INFORMACION.CI='$CI'";

$resultado= $conn->query($sql);
if ($resultado->num_rows > 0) {
    while($fila=$resultado->fetch_assoc()){
        $Nombres = $fila['Nombres'];
        $Apellidos = $fila['Apellidos'];
        $Contrasena = $fila['Contrasena'];
        $Telefono = $fila['Telefono'];
        $Curso = $fila['Curso'];
        $Direccion = $fila['Direccion'];
        $CI = $fila['CI'];
        $RUDE = $fila['RUDE'];
        $FechaNacimiento = $fila['FechaNacimiento'];

    }

}

    ?>


    <form action="RegistroEdit.php" method="post">
    <label for="">Nombres</label> <br>
    <input type="text" name="nom" value='<?=$Nombres?>'><br>
    <label for="">Apellidos</label> <br>
    <input type="text" name="ape" value='<?=$Apellidos?>'><br>
    <label for="">Contraseña</label> <br>
    <input type="password" name="contra" value='<?=$Contrasena?>'><br>
    <label for="">Fecha de Nacimiento</label><br>
    <input type="date" name="fecha" value='<?=$FechaNacimiento?>'><br>
        <label for="">Curso</label><br>
    <input type="text" name="curso" value='<?=$Curso?>'><br>

    <label for="">Telefono</label><br>
    <input type="text" name="telef" value='<?=$Telefono?>'><br>
    <label for="">Direccion</label><br>
    <input type="text" name="dire" value='<?=$Direccion?>'><br>
  
    
    <input type="hidden" name="CI" value='<?=$CI?>'><br>
    <input type="submit" name="enviar">

    </form>

    <script>
        $("form").validate({
        rules:{
            nom:{
                required:true, minlength:3,maxlength:30
            },
            ape:{
                required:true,minlength:3,maxlength:30
            },
            contra:{
                required:true,minlength:5,maxlength:10
            },
            curso:{
                required:true,minlength:3,maxlength:10
            },
            telef:{
                required:true,number:true;
            },
            dire:{
                required:true,minlength:5,maxlength:50
            },
            fecha:{
                required:true,minlength:5,maxlength:50
            },
            
        },
        messages:{
            nom:{
                required:"Este campo tiene que ser llenado",
                minlength:"El minimo de letras es 3",
                maxlength:"El maximo de letras es 30"
            },
            ape:{
                required:"Este campo tiene que ser llenado",
                minlength:"El minimo de letras es 3",
                maxlength:"El maximo de letras es 30"
            },
            contra:{
                required:"Este campo tiene que ser llenado",
                minlength:"El minimo de caracteres es 5",
                maxlength:"El maximo de caracteres es 10"
            },
            fecha:{
                required:"Este campo tiene que ser llenado",
                minlength:"El minimo de caracteres es 3",
                maxlength:"El maximo de caracteres es 10"
            },
            telef:{
                required:"Este campo tiene que ser llenado",
                minlength:"El minimo de caracteres es 5",
                maxlength:"El maximo de caracteres es 30"
            },
            dire:{
                required:"Este campo tiene que ser llenado",
                minlength:"El minimo de caracteres es 5",
                maxlength:"El maximo de caracteres es 50"
                
            },
            curso:{
                required:"Este campo tiene que ser llenado",
                minlength:"El minimo de caracteres es 5",
                maxlength:"El maximo de caracteres es 50"
                
            },
            CI:{
                required:"Este campo tiene que ser llenado",
                number:"Eso no es un numero"
               
            },
            
        },

       });
    </script>
</body>
</html>
