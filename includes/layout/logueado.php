<?php
require_once('./includes/database.php');

$conn = obetenerConexion();

session_start();

$id = $_SESSION['idUsuario'] ?? null;
$nombre = $_SESSION['nombreUsuario'] ?? '';
$apellidos = $_SESSION['apellidosUsuario'] ?? '';

?>


<div class="sesion">
    <p class="sesionParrafo"> Bienvenido: <b><?php echo $nombre . " " . $apellidos; ?></b></p>
    <p class="sesionParrafo"> RESERVA MESA o pide A DOMOCILIO </p>
    <p class="sesionParrafo"> ¡Bon Apetit!</p> 
    <a class="sesionBoton" href="./includes/layout/cerrarSession.php">Cerrar Session</a>
</div>