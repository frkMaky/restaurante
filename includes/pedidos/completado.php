<?php

require_once('../database.php');
$conn = obetenerConexion();

session_start();

$id = $_GET['id'] ?? null;

$query = "UPDATE pedido set estado='Entregado Bon Apetit!' WHERE id={$id}";

$resultado = mysqli_query($conn,$query);

header('Location: ../../dashboard.php'); 
