<?php
 define('RUTA_IMG_PRODUCTOS','./img/');
 define('RUTA_IMG_PRODUCTOS_VER','./');

function obetenerConexion ():mysqli {
    $host = "localhost";
    $user = "root";
    $password = "root";
    $dbName= "restaurante";

    $conn = mysqli_connect($host,$user,$password,$dbName);

    return $conn;
}

function debuguear($data) {
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
    exit;
}

