<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>ForwardSoft</title>
  <link href="CSS/clases_p.css" rel="stylesheet" type="text/css" />

 
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

    <a href="inicioPR.php"> <img class ="out" src="FOTOS/out.png" width="50px" ></a>
        <nav id="cabecera"> 
                <div class="imagen"> </div>
                <div class="titulo">   <?=$titulo?> </div>
                <div class="nombre_prof"> <?=$curso?></div>
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
   <img src="FOTOS/archiv.png" width="" id="archiv">
  </div>
   <div id="calificaciones">
    <a href="" class="cuadros">CALIFICACIONES</a>
<img src="FOTOS/rchiv.png" width="" id="archiv">
  </div>
</section>

<section id="dos">
        <div class="caja_comentario"> 
          <div class="texto_comentario"> 
          <img src="FOTOS/burbuja.png" id="burbuja"> <p>Comenta algo a tu clase..</p>
          <input type="text" >
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