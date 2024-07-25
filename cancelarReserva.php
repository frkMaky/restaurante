<?php 

require_once('./includes/database.php');

$conn = obetenerConexion();

session_start();

$id = $_GET["id"] ?? '';

   
$idUsuario = $_SESSION['idUsuario'];

$query = "DELETE FROM reservas WHERE id = {$id}";
$result = mysqli_query($conn,$query);

$url = "/gri/restaurante/restaurante/areaUsuario.php";

if ($result) {
    header('Location: ' . $url);
} else {
    $url .=  "?mensaje='No se pudo cancelar'";
    header('Location: ' . $url);
}
