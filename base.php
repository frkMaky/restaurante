<?php
require_once('./includes/database.php');
$conn = obetenerConexion();

session_start();

if (empty($_SESSION) ) {
    header('Location: /index.php');
}

?>

<?php require_once('./includes/layout/header.php'); ?>

<?php if (!isset($_SESSION['nombreUsuario']) ) {
    require_once('./includes/layout/formLogueo.php');
} else {
    require_once('./includes/layout/logueado.php');
}  ?>

<?php require_once('./includes/layout/footer.php'); ?>