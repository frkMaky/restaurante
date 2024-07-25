<?php
require_once('./includes/database.php');
$conn = obetenerConexion();


// Obtener los pedidos
$pedidos = [];
$query = "SELECT * FROM pedido";
$resultado = mysqli_query($conn,$query);
if (mysqli_num_rows($resultado) > 0 ) {
    while( $row = mysqli_fetch_assoc($resultado) ) {
        $pedidos[] =  $row;
    }
}

// Obtener las reservas
$reservas = [];
$query = "SELECT * FROM reservas";
$resultado = mysqli_query($conn,$query);
if (mysqli_num_rows($resultado) > 0 ) {
    while( $row = mysqli_fetch_assoc($resultado) ) {
        $reservas[] =  $row;
    }
}

// Obtener la carta
$productos = [];
$query = "SELECT * FROM producto";
$resultado = mysqli_query($conn,$query);
if (mysqli_num_rows($resultado) > 0 ) {
    while( $row = mysqli_fetch_assoc($resultado) ) {
        $productos[] =  $row;
    }
}



session_start();

?>

<?php require_once('./includes/layout/header.php'); ?>

<?php if (!isset($_SESSION['nombreUsuario']) ) {
    require_once('./includes/layout/formLogueo.php');
} else {
    require_once('./includes/layout/logueado.php');
}  ?>

<main>
    <h1 class="dashboard-titulo">Dashboard</h1>
    
    <section class="gestionPedidos">
        <h2 class="gestionPedidos-tittulo">Gestion de Pedidos</h2>
        <ul class="listaPedidos">
        <?php foreach ($pedidos as $pedido) { ?>
            <li class="listaPedidos-pedido">
                <div class="elemento">
                    <?php 
                    echo 'ID: '. $pedido["id"] . 
                    ' Usuario: ' .$pedido["idUsuario"] .
                    ' <br>Productos: ' .$pedido["idProducto"] .
                    ' <br>Cantidades: ' .$pedido["cantidadProducto"] .
                    ' <br>Fecha y Hora: ' .$pedido["fecha"] . ' ' . $pedido["hora"] .  
                    ' <br>Estado: ' . $pedido["estado"] ; ?>
                </div>
                <div class="acciones">
                    <a class="listaPedidos-enlace" href="./includes/pedidos/despacharPedido.php?id=<?php echo $pedido["id"];?>"><span class="material-symbols-outlined">skillet</span></a>
                    <a class="listaPedidos-enlace" href="./includes/pedidos/a_reparto.php?id=<?php echo $pedido["id"];?>"><span class="material-symbols-outlined">local_shipping</span></a>
                    <a class="listaPedidos-enlace" href="./includes/pedidos/completado.php?id=<?php echo $pedido["id"];?>"><span class="material-symbols-outlined">dinner_dining</span></a>
                </div>
            </li>
        <?php } // foreach pedido ?>
        </ul>
    </section>

    <section class="gestionReservas">
        <h2 class="gestionReservas-titulo">Gestion de Reservas</h2>
        <ul class="listaReservas">
        <?php foreach ($reservas as $reserva) { ?>
            <li class="listaReservas-reserva">
                <?php 
                echo 'ID: '. $reserva["id"] . 
                ' Usuario: ' .$reserva["idUsuario"] .
                ' <br>Fecha: ' .$reserva["fecha"] .
                ' Hora: ' .$reserva["hora"] .
                ' <br>Comensales: ' .$reserva["comensales"] ; ?>
                <div class="acciones">
                    <a class="listaReservas-enlace" href="./includes/reservas/cancelarReserva.php?id=<?php echo $reserva["id"];?>"><span class="material-symbols-outlined">delete</span></a>
                </div>
            </li>
        <?php } // foreach reservas ?>
        </ul>
    </section>

    <!--
    <section class="gestionBlog">
        <h2>Gestion del Blog</h2>
    </section>
        -->
    
    <section class="gestionCarta">
        <h2 class="gestionCarta-titulo">Gestion de la Carta</h2>
        <a  class="gestionCarta-enlace" href="./includes/productos/nuevoProducto.php"><span class="material-symbols-outlined">add</span></a>
           
        <ul class="listaProductos">
        <?php foreach ($productos as $producto) { ?>
            <li class="listaProductos-producto">
                <?php 
                echo ' Nombre: ' .$producto["nombre"] .
                ' <br>Descripcion: ' .$producto["descripcion"] .
                ' <br>Categoría: ' .$producto["categoria"] .
                ' <br>Precio: ' . $producto["precio"] ; ?>

                <div class="acciones">    
                    <a class="gestionCarta-enlace" href="./includes/productos/verProducto.php?id=<?php echo $producto["id"];?>"><span class="material-symbols-outlined">visibility</span></a>
                    <a class="gestionCarta-enlace" href="./includes/productos/editarProducto.php?id=<?php echo $producto["id"];?>"><span class="material-symbols-outlined">edit</span></a>
                    <a class="gestionCarta-enlace" href="./includes/productos/eliminarProducto.php?id=<?php echo $producto["id"];?>"><span class="material-symbols-outlined">delete</span></a>
                </div>
            </li>
        <?php } // foreach producto ?>
        </ul>
    </section>
</main>

<?php require_once('./includes/layout/footer.php'); ?>