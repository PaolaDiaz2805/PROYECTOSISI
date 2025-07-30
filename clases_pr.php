<?php
session_start();

$archivo = 'mensajes.txt';
$archivo_respuestas = 'respuestas.txt';

// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "proyectoSISI";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
if (!isset($_SESSION['ci'])) {
    header("Location:FormSession.php");
    exit();
}

// Obtener nombre del usuario desde la base de datos usando su CI
$autor = 'Usuario desconocido';
if (isset($_SESSION['ci'])) {
    $ci = $_SESSION['ci'];
    $sql_nombre = "SELECT Nombres FROM informacion WHERE CI = '$ci'";
    $res_nombre = $conn->query($sql_nombre);
    if ($res_nombre && $res_nombre->num_rows > 0) {
        $autor = $res_nombre->fetch_assoc()['Nombres'];
    }
}

// Guardar comentario principal
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['comen'])) {
    $contenido = trim($_POST['comen']);
    $fecha = date("Y-m-d H:i:s");
    $id_comentario = uniqid();

    $entrada = "$id_comentario|$fecha|$autor|$contenido" . PHP_EOL;
    file_put_contents($archivo, $entrada, FILE_APPEND);
}

// Guardar respuesta a comentario
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['respuesta']) && isset($_POST['responder_a'])) {
    $contenido = trim($_POST['respuesta']);
    $fecha = date("Y-m-d H:i:s");
    $comentario_id = $_POST['responder_a'];

    $respuesta = "$comentario_id|$fecha|$autor|$contenido" . PHP_EOL;
    file_put_contents($archivo_respuestas, $respuesta, FILE_APPEND);
}
?>
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
    if (!isset($_GET['ID']) || !is_numeric($_GET['ID'])) {
        die("ID de clase no válido.");
    }

    $id = intval($_GET['ID']);
    $sql = "SELECT * FROM CLASES WHERE ID = $id";
    $resultado = $conn->query($sql);

    if ($resultado && $resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();
        $titulo = $fila['Materia'];
        $curso = $fila['Grado'];
    } else {
        die("Clase no encontrada.");
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
        <img src="FOTOS/burbuja.png" id="burbuja" width="45px">
        <form method="post">
          <p>Comenta algo a tu clase..</p>
          <textarea name="comen" cols="40" rows="2" required></textarea>
          <input type="submit" value="Enviar">
        </form>
      </div>
    </div>

    <h2>Publicaciones</h2>
    <?php
    if (file_exists($archivo)) {
        $lineas = file($archivo, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $lineas = array_reverse($lineas);

        $respuestas = [];
        if (file_exists($archivo_respuestas)) {
            $res = file($archivo_respuestas, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            foreach ($res as $r) {
                list($comentario_id, $fecha_r, $autor_r, $contenido_r) = explode('|', $r);
                $respuestas[$comentario_id][] = [
                    'fecha' => $fecha_r,
                    'autor' => $autor_r,
                    'contenido' => $contenido_r
                ];
            }
        }

        foreach ($lineas as $linea) {
            list($id, $fecha, $autor, $contenido) = explode('|', $linea);
            echo '<div class="caja_comentario_2">';
            echo '<div class="profe"><img src="FOTOS/user.png" id="user">';
            echo '<p class="datos_profe">' . htmlspecialchars($autor) . '</p></div>';
            echo '<input type="datetime-local" class="datos_profe" value="' . date("Y-m-d\TH:i", strtotime($fecha)) . '" readonly>';
            echo '<div class="respuesta">' . htmlspecialchars($contenido) . '</div>';
            echo '<form method="post"><input type="hidden" name="responder_a" value="' . $id . '">
                  <textarea name="respuesta" placeholder="Responder..." required></textarea>
                  <input type="submit" value="Responder"></form>';
            if (isset($respuestas[$id])) {
                foreach ($respuestas[$id] as $r) {
                    echo '<div class="caja_respuesta" style="margin-left:30px; margin-top:10px; border-left:2px solid #ccc; padding-left:10px;">';
                    echo '<p><strong>' . htmlspecialchars($r['autor']) . '</strong> [' . $r['fecha'] . ']:</p>';
                    echo '<p>' . htmlspecialchars($r['contenido']) . '</p>';
                    echo '</div>';
                }
            }
            echo '</div>';
        }
    } else {
        echo '<p>No hay publicaciones aún.</p>';
    }
    ?>
  </section>

 
    <footer>©Copyright Colegio Pedro Poveda</footer>
</body>

</html>
