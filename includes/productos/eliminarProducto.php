<?php
require_once('../database.php');
$conn = obetenerConexion();

session_start();

// Obtener el producto
$id = $_GET["id"];


//ELiminar la imagen 
$query = "SELECT imagen FROM  producto WHERE id = ?";
$stmt = mysqli_prepare($conn, $query);
$stmt->bind_param("i",$id);
$stmt->bind_result($imagen);
$stmt->execute();
$stmt->fetch();
$stmt->close();

$imagenPrevia = RUTA_IMG_PRODUCTOS_VER . "img/"  . $imagen;

try {     
    // Eliminar imagen previa
    
    $rutaPorDefecto = __DIR__ . "/img/"  . "plato.jpg";
    
    if ( $imagenPrevia != $rutaPorDefecto) {
        unlink($imagenPrevia);

    }
} catch (\Throwable $th) {
    //throw $th;
}

$query = "DELETE FROM producto WHERE id = {$id}";

$resultado = $conn->query($query);

header('Location: ../../dashboard.php');