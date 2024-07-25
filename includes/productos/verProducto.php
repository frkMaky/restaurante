<?php
require_once('../database.php');
$conn = obetenerConexion();

session_start();

// Obtener el producto

$id = $_GET["id"];
$query = "SELECT * FROM producto WHERE id = {$id}";
$resultado = mysqli_query($conn,$query);
$productoVer = mysqli_fetch_assoc($resultado);

//debuguear($producto);

if (empty($_SESSION) ) {
    header('Location: ../../');
}

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurante: La Cocina de Mamá</title>
    <link rel="icon" type="image/vnd.icon" href="favicon.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../css/app.css">
</head>
<body>

    <header class="header">
        <h1 class="header-titulo">    
            <span class="material-symbols-outlined">stockpot</span>
            La Cocina de Mamá    
            <span class="material-symbols-outlined">stockpot</span>
        </h1>

        <?php require_once('../layout/barra_navegacion.php'); ?>

    </header> 

    <main>
        <h1>Ver Producto</h1>

        <form enctype="multipart/form-data">

           <?php include ('./formProductoVer.php'); ?>

        </form>
        <a class="enlaceVolver" href="../../dashboard.php">
            <span class="material-symbols-outlined">arrow_back</span>
            Volver al Dashboard
        </a>

    </main>

    <footer class="footer">
        <p class="footer-parrafo">
            <span class="material-symbols-outlined">stockpot</span>
            La Cocina de Mamá    
            <span class="material-symbols-outlined">stockpot</span>
        </p>
        <p class="footer-parrafo">Todos los derechos reservados &COPY;</p>
        <p class="footer-parrafo">Todo el contenido es para uso formativo exclusivamente</p>
        <p class="footer-parrafo">maquidev.es 2024 &copy; =^.^=</p>
    </footer>

<script src="../../js/app.js"></script>

</body>
</html>