<?php
session_start();

if (!isset($_SESSION['ci'])) {
    header("Location: FormSession.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar datos
    if (!empty($_POST['asu']) && !empty($_POST['conte']) && !empty($_POST['idP'])) {
        $asunto = $_POST['asu'];
        $contenido = $_POST['conte'];
        $idP = $_POST['idP'];

        // Conectar a la base de datos
        $conn = new mysqli("localhost", "root", "", "proyectoSISI");
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        // Actualizar la publicación
        $sql = "UPDATE PUBLICACIONES SET Asunto=?, Texto=?, FechaE=NOW() WHERE idP=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssi", $asunto, $contenido, $idP);

        if ($stmt->execute()) {
            // Obtener la CLASES_ID para redirigir correctamente
            $sqlGetClase = "SELECT CLASES_ID FROM PUBLICACIONES WHERE idP=?";
            $stmtGet = $conn->prepare($sqlGetClase);
            $stmtGet->bind_param("i", $idP);
            $stmtGet->execute();
            $result = $stmtGet->get_result();

            if ($result->num_rows > 0) {
                $clase = $result->fetch_assoc()['CLASES_ID'];
                header("Location: clases.php?ID=$clase");
                exit();
            } else {
                echo "Publicación actualizada, pero no se encontró la clase.";
            }
        } else {
            echo "Error al actualizar la publicación: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    } else {
        echo "Faltan datos.";
    }
} else {
    echo "Acceso no permitido.";
}
?>
