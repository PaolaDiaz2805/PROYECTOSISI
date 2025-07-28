<?php   
 
$archivo = 'mensajes.txt';

// Guardar mensaje si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $autor = trim($_SESSION['nom']);
    $contenido = trim($_POST['comen']);

        $fecha = date("Y-m-d H:i:s");
        $entrada = "$fecha | $autor: $contenido" . PHP_EOL;

        $f = fopen($archivo, 'a');
        fwrite($f, $entrada);
        fclose($f);
    
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>ForwardSoft</title>
  <link href="CSS/clases.css" rel="stylesheet" type="text/css" />

 
</head>

<body>
  <script src="script.js"></script> 
  <header> 
        <?php
session_start();
    $servername = "localhost";
    $username = "root";
    $password="";
    $dbname="proyectoSISI";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexion fallida: ". $conn->connect_error);
    }
    if (!isset($_SESSION['ci'])){
    header("Location:FormSession.php");
}
    $id=$_GET['id'];
    $sql= "SELECT * FROM  CLASES WHERE ID=$id";
    $resultado=mysqli_query($conn,$sql);
    if (!empty($resultado)&& mysqli_num_rows($resultado)>0) {
        $fila=mysqli_fetch_assoc($resultado);
        $titulo=$fila['Materia'];
        $curso=$fila['Grado'];
    }
    else{
      die();
    }
    ?>
    <a href="inicioES.php"> <img class ="out" src="FOTOS/out.png" width="50px"></a>
        <nav id="cabecera"> 
                <div class="imagen"> 
                <div class="titulo"><?=$titulo?></div>
                <div class="nombre_prof"><?=$curso?></div>
        </nav>
        
  </header>
  
<section id="uno">
  <div id="pendientes">
    <a href="" class="cuadros" id="tarea">TAREAS</a>
    <img src="FOTOS/tare.png" id="tare">
  </div>
  <div id="personas">
    <a href="" class="cuadros">PERSONAS</a>
    <img src="FOTOS/person.png" id="person">
  </div>
  <div id="archivos">
    <a href="" class="cuadros">ARCHIVOS</a>
    <span id="archiv2"><img src="FOTOS/archiv.png" width="" id="archiv"></span>
  </div>
</section>

<section id="dos">
  <div class="caja_comentario"> 
   <div class="texto_comentario"> <img src="FOTOS/burbuja.png" id="burbuja" width="45px">
   <form  method="post">
    <input type="text" name="autor" placeholder="Tu nombre" required><br><br>
    <p for="">Comenta algo a tu clase..</p>
    <textarea name="comen" id="" cols="40" rows="2"> </textarea>   
    <input type="submit" value="enviar">
    </form>
    <h2>Publicaciones</h2>

  <?php
  if (file_exists($archivo)) {
      $lineas = file($archivo, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
      $lineas = array_reverse($lineas); // Mostrar las más recientes arriba

      foreach ($lineas as $linea) {
          echo '<div class="post">' . htmlspecialchars($linea) . '</div>';
      }
  } else {
      echo '<p>No hay publicaciones aún.</p>';
  }
  ?>
   </div>
  </div>
 
        
  <div class="caja_comentario_2">
    <div class="profe"> <img src="FOTOS/user.png" id="user"> 
    <p class="datos_profe"> Brandon Quiroga </p>
              
    </div>
    <input type="datetime-local" class="datos_profe">
    <div class="respuesta"> <img src="FOTOS/flecha.png" height="30px" > Añade un comentario a la clase..</div>
    </div>

    <div class="tarea_asig">
    <img src="FOTOS/asigna.png" id="asigna">
    <a href="" class="disenio"> NUEVA TAREA </a>
    </div>       
        
</section>
 
    <footer>©Copyright Colegio Pedro Poveda</footer>
</body>

</html>
