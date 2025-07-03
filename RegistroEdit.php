<?php
$servername = "localhost";
$username = "root";
$password="";
$dbname="proyectoSISI";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexion fallida: ". $conn->connect_error);
}
$Nombres = $_POST['nom'];
$Apellidos = $_POST['ape'];
$Contrasena = $_POST['contra'];
$Telefono = $_POST['telef'];
$Curso = $_POST['curso']; 
$Direccion = $_POST['dire'];
$CI = $_POST['CI'];
$FechaNacimiento = $_POST['fecha'];

$sql="UPDATE INFORMACION SET Nombres='$Nombres',Apellidos='$Apellidos',Telefono='$Telefono',Curso='$Curso',Direccion='$Direccion', FechaNacimiento='$FechaNacimiento' WHERE CI='$CI' ";
$sql1="UPDATE CUENTA SET Contrasena='$Contrasena' WHERE User = '$CI' ";

if ($conn->query($sql)===TRUE && $conn->query($sql1)===TRUE){
    echo "Cuenta editada exitosamente";
}
?>