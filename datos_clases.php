<?php
session_start();

// Verificar si hay sesión activa
if (!isset($_SESSION['ci'])) {
    header("Location:FormSession.php");
    exit();
}

// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "proyectoSISI";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


$contenido = $_GET['publi'] ?? '';
$asunta = $_GET['asunto'] ?? '';
$id_ = $_GET['id'] ?? '';

// Validación básica
if (empty($contenido) || empty($id_)|| empty($asunta)) {
    echo "Faltan datos para guardar la publicación.";
    exit();
}


$fechaActual = date("Y-m-d H:i:s");

// Insertar en la base de datos
$sql = "INSERT INTO publicaciones (Tarea, Texto, Fecha, CLASES_ID) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssi",$asunta, $contenido, $fechaActual, $id_);

if ($stmt->execute()) {
        if($_SESSION['rol']==1)
            header("Location:clases.php?ID=$id_");
        if($_SESSION['rol']==2)
            header("Location: clases_pr.php?ID=$id_");
        
    
    exit();
    
} else {
    echo "Error al insertar publicación: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
