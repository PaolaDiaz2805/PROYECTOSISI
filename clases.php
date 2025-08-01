<?php
session_start();

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

// Obtener datos de la clase actual
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

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>ForwardSoft</title>
    <link href="CSS/clases.css" rel="stylesheet" type="text/css" />
    <style>
        h2 {
            color: white;
        }

        .datos_profe {
            font-family: Arial;
        }

        .respuesta_asu {
            font-family: Arial;
        }

        .respuesta {
            font-family: Arial;
        }
    </style>
</head>

<body>
    <header>
        <a href="inicioES.php"><img class="out" src="FOTOS/out.png" width="50px"></a>
        <nav id="cabecera">
            <div class="imagen">
                <div class="titulo"><?= htmlspecialchars($titulo) ?></div>
                <div class="nombre_prof"><?= htmlspecialchars($curso) ?></div>
            </div>
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
            <span id="archiv2"><img src="FOTOS/archiv.png" id="archiv"></span>
        </div>
    </section>

    <section id="dos">
        <div class="caja_comentario">
            <div class="texto_comentario">
                <img src="FOTOS/burbuja.png" id="burbuja" width="45px">
                <form action="datos_clases.php" method="get">
                    <label>Escribe el asunto de la publicación</label>
                    <input type="text" name="asunto">
                    <p>Publica algo a tu clase...</p>
                    <textarea name="publi" cols="40" rows="2" required></textarea>
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <input type="submit" value="Enviar">
                </form>
            </div>
        </div>

        <h2 class="pub">Publicaciones</h2>

        <?php
        $sqlPubli = "SELECT * FROM PUBLICACIONES WHERE CLASES_ID = $id ORDER BY Fecha DESC";
        $resPubli = $conn->query($sqlPubli);

        if ($resPubli && $resPubli->num_rows > 0) {
            while ($fila = $resPubli->fetch_assoc()) {
                $autorPublicacion = htmlspecialchars($fila['Autor']);
                $fecha = date("Y-m-d\TH:i", strtotime($fila['Fecha']));
$mostrarFecha = $fecha;

$editado = "";
if (!empty($fila['FechaE'])) {
    $fechaEdicion = date("Y-m-d\TH:i", strtotime($fila['FechaE']));
    $mostrarFecha = $fechaEdicion; // MOSTRAR LA FECHA DE EDICIÓN EN LUGAR DE LA ORIGINAL
    $editado = "<span style='color: black;'>Edit</span>";
}


                $texto = htmlspecialchars($fila['Texto']);
                $asunta = htmlspecialchars($fila['Asunto']);
                $idPublicacion = $fila['idP']; // este es el valor correcto
        ?>
                <div class='caja_comentario_2'>
                    <div class='profe'>
                        <img src='FOTOS/user.png' id='user'>
                        <p class='datos_profe'><?=$autorPublicacion?></p>
                        <div class='editar'> 
                            <a href='formEditPubli.php?idP=<?=$idPublicacion?>'>
                            <?php
                                if ($autorPublicacion==$_SESSION['nombre']) {
                                            echo "<img src='FOTOS/edit.png' width='40px'>";
                                }
                            ?>
                            </a> 
                        </div>                   
                    </div>
                    <input type='datetime-local' class='datos_profe' value='<?=$fecha?>' readonly>
                    <div class='respuesta_asu'>ASUNTO: <?=$asunta?></div>
                    <div class='respuesta'><?=$texto?></div>
                </div>";
        <?php    }

        } else {
            echo "<p>No hay publicaciones aún.</p>";
        }
?>
    </section>

    <footer>©Copyright Colegio Pedro Poveda</footer>
</body>
</html>
