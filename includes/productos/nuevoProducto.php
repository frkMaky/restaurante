<?php
require_once('../database.php');
$conn = obetenerConexion();

session_start();

//debuguear($producto);

if (empty($_SESSION) ) {
    header('Location: ../../');
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombreProducto = $_POST['nombreProducto'];
    $descripcionProducto = $_POST['descripcionProducto'];
    $categoria = $_POST['categoria'];
    $precio = $_POST['precioPlato'];
    $imagen = $_POST['imagen'] ?? '';

    // IMAGEN 
    // Ruta Imagen 
    $rutaPorDefecto = RUTA_IMG_PRODUCTOS . "plato.jpg";

    $nuevaRuta = __DIR__ . "/img/" .  $_FILES["imagenProducto"]["name"];

    // Mover imagen
    $rutaImagenFiles = $_FILES["imagenProducto"]  ["tmp_name"];
    
    try {
        // Copiar nueva imagen 
        move_uploaded_file($rutaImagenFiles, $nuevaRuta);

    } catch (\Throwable $th) {
        //throw $th;
    }

    $nuevaRutaINSERT =  ($_FILES["imagenProducto"]["name"]!="")?$_FILES["imagenProducto"]["name"]:"plato.jpg";

    $query = "INSERT INTO producto (nombre, descripcion, categoria, imagen, precio) VALUES ('{$nombreProducto}','{$descripcionProducto}','{$categoria}','{$nuevaRutaINSERT}',{$precio})";
    $resultado = mysqli_query($conn,$query);
    header('Location: /gri/restaurante/restaurante/dashboard.php');
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
        <h1>Nuevo Producto</h1>

        <form enctype="multipart/form-data" method="post">

           <?php include ('./formProducto.php'); ?>

           <input type="submit" value="Nuevo Producto" class="productoEnviarBoton">
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