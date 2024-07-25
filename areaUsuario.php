<?php
require_once('./includes/database.php');
$conn = obetenerConexion();

session_start();

if (empty($_SESSION) ) {
    header('Location: ./');
}

$id = $_SESSION["idUsuario"];

$query = "SELECT * FROM usuarios WHERE id = {$id}";

$resultado = mysqli_query($conn,$query);

$usuario = mysqli_fetch_assoc($resultado); 

// Comprobar reservas del usuario
$query = "SELECT * FROM reservas WHERE idUsuario = {$id}";
$result = mysqli_query($conn, $query);
$reservas = [];
if (mysqli_num_rows($result)>0) {
    while ( $reserva = mysqli_fetch_assoc($result)) {
        $reservas[] = $reserva;
    }
}

// Comprobar pedidos del usuario
$query = "SELECT * FROM pedido WHERE idUsuario = {$id}";
$result = mysqli_query($conn, $query);
$pedidos = [];
if (mysqli_num_rows($result)>0) {
    while ( $pedido = mysqli_fetch_assoc($result)) {
        $pedidos[] = $pedido;
    }
}


?>

<?php require_once('./includes/layout/header.php'); ?>
<?php if (!isset($_SESSION['nombreUsuario']) ) {
    require_once('./includes/layout/formLogueo.php');
} else {
    require_once('./includes/layout/logueado.php');
}  ?>

<main>
    <h1 class="areaUsuario-titulo">Area de Usuario</h1>

    <form class="areaUsuario-formulario" method="post">
        <fieldset class="areaUsuario-fieldset">
            
            <div class="areaUsuario-campo">
                <label class="areaUsuario-etiqueta" for="nombre">Nombre: </label>
                <input class="areaUsuario-input" type="text" value="<?php echo $usuario['nombre']; ?>" disabled>
                <a class="areaUsuario-enlace" href="#"><span class="material-symbols-outlined">contract_edit</span></a>
            </div>

            <div class="areaUsuario-campo">
                <label class="areaUsuario-etiqueta" for="apellidos">Apellidos: </label>
                <input class="areaUsuario-input" type="text" value="<?php echo $usuario['apellidos']; ?>" disabled>
                <a class="areaUsuario-enlace" href="#"><span class="material-symbols-outlined">contract_edit</span></a>
            </div>

            <div class="areaUsuario-campo">
                <label class="areaUsuario-etiqueta" for="direccion">Direccion: </label>
                <input class="areaUsuario-input" type="text" value="<?php echo $usuario['direccion']; ?>" disabled>
                <a class="areaUsuario-enlace" href="#"><span class="material-symbols-outlined">contract_edit</span></a>
            </div>

            <div class="areaUsuario-campo">
                <label class="areaUsuario-etiqueta" for="email">Email: </label>
                <input class="areaUsuario-input" type="email" value="<?php echo $usuario['email']; ?>" disabled>
                <a class="areaUsuario-enlace" href="#"><span class="material-symbols-outlined">contract_edit</span></a>
            </div>

            <div class="areaUsuario-campo">
                <label class="areaUsuario-etiqueta" for="telefono">Teléfono: </label>
                <input class="areaUsuario-input" type="tel" value="<?php echo $usuario['telefono']; ?>" disabled>
                <a class="areaUsuario-enlace" href="#"><span class="material-symbols-outlined">contract_edit</span></a>
            </div>

            <div class="areaUsuario-campo">
                <label class="areaUsuario-etiqueta" for="password">Password: </label>
                <input class="areaUsuario-input" type="password" value="<?php echo $usuario['password']; ?>" disabled>
                <a class="areaUsuario-enlace" href="#"><span class="material-symbols-outlined">contract_edit</span></a>
            </div>

            <div class="areaUsuario-campo">
                <label class="areaUsuario-etiqueta" for="tarjeta">Tarjeta: </label>
                <input tclass="areaUsuario-input" ype="password" value="<?php echo $usuario['tarjeta']; ?>" disabled>
                <a class="areaUsuario-enlace" href="#"><span class="material-symbols-outlined">contract_edit</span></a>
            </div>
            
        </fieldset>

    </form>
</main>

<section>

    <h2>Tus reservas actuales</h2>
    <?php if (!empty($reservas)) { ?>
        <div class="reservasUsuario">
            <?php foreach ($reservas as $reserva) { ?>
    
            <p class="reservaUsuario">Fecha: <span class="resaltar"><?php echo $reserva['fecha']; ?></span> Hora: <span class="resaltar"><?php echo $reserva['hora']; ?></span> Comensales: <span class="resaltar"><?php echo $reserva['comensales']; ?></span>
           
            <a class="reservaUsuarioCancelar" href="./cancelarReserva.php?id=<?php echo $reserva["id"]; ?>"><span class="material-symbols-outlined borrarReserva">delete</span></a>
        
            </p>
 
            <?php } ?>
        </div>
    <?php } else { ?>
        <p class="pedidoUsuario"> No tienes reservas actualmente </p>
    <?php } ?>

    <?php if ( $mensaje != '' ) { ?>
        <div class="mensajes">
            <p class="mensaje">
                <?php echo $mensaje; ?>
            </p>
        </div>
    <?php } ?>
</section>

<section class="seccionpedidoUsuario">

    <h2>Tus Pedidos</h2>

    <?php if (!empty($pedidos)) { ?>
        <div class="pedidoUsuario">
            <?php foreach ($pedidos as $pedido) { ?>

            <div class="contenedor">    
                <p class="pedidoUsuario-parrafo">Fecha: <span class="resaltar"><?php echo $pedido['fecha']; ?></span> Hora: <span class="resaltar"><?php echo $pedido['hora']; ?> <br></span> Total Pedido: <span class="resaltar"><?php echo $pedido['total']; ?> € <br></span>  Estado: <span class="resaltar"><?php echo $pedido['estado']; ?></span></p>
                <table class="pedidoUsuario-tabla">
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                    </tr>
                    <tr>
                        <?php
                            $pedidoProducto = explode(',',$pedido["idProducto"]);
                            $pedidoProductoCantidad = explode(',',$pedido["cantidadProducto"]);
                            $pedidoTotalProducto = explode(',',$pedido["totalProducto"]);
                        ?>
                        <td>    
                            <table class="pedidoUsuario-tabla">
                            <?php for ($i=0; $i < count($pedidoProducto); $i++) { 

                                $query = "SELECT nombre FROM producto WHERE id = {$pedidoProducto[$i]}";
                                $resultado = mysqli_query($conn, $query);
                                $nombreProducto = $resultado->fetch_assoc();
                                echo "<tr><td class='pedidoUsuario-tabla-td'>" . $nombreProducto["nombre"] . "</td></tr>" ;
                                $resultado->close();
                            } // for ?>
                            </table>
                        </td>
                        <td>

                            <table class="pedidoUsuario-tabla">
                            <?php for ($i=0; $i < count($pedidoProductoCantidad); $i++) { 
                                echo  "<tr><td class='pedidoUsuario-tabla-td'>" . $pedidoProductoCantidad[$i] . "</td></tr>";
                            } // for ?>
                            </table>
                        </td>
                        -<td>
                            <table class="pedidoUsuario-tabla">
                            <?php for ($i=0; $i < count($pedidoTotalProducto); $i++) { 
                                echo  "<tr><td class='pedidoUsuario-tabla-td'>" . $pedidoTotalProducto[$i] . "€</td></tr>";
                            } // for ?>
                            </table>
                        </td>
                    </tr>
                </table>
                
            </div>
            <?php } //foreach $pedido ?>
        </div>
    <?php } else { ?>
        <p class="pedidoUsuario"> No tienes pedidos actualmente </p>
    <?php } // IF ?>       

    <?php if ( $mensaje != '' ) { ?>
        <div class="mensajes">
            <p class="mensaje">
                <?php echo $mensaje; ?>
            </p>
        </div>
    <?php } ?>

</section>

<?php require_once('./includes/layout/footer.php'); ?>