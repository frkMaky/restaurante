<?php
    require_once('./includes/database.php');

    session_start();
    
    $conn = obetenerConexion();

    $mensaje = '';

if ($_SERVER["REQUEST_METHOD"]=="POST") {
    $dia = $_POST["dia"];
    $hora = $_POST["hora"];
    $comensales = $_POST["comensales"];

    $query = "INSERT INTO reservas (fecha, hora, idUsuario, comensales) VALUES (?,?,?,?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssii",$dia,$hora,$_SESSION["idUsuario"],$comensales);
    $result = $stmt->execute();
    
    if ($result) {
        $mensaje = "Reserva Realizada";    
    } else {
        $mensaje = "No se ha podido realizar la reserva";
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

    <h1 class="reserva-titulo">Haz tu reserva!</h1>

    <form method='POST' class="reserva-form">
        <fieldset class="reserva-campo">
            <label class="reserva-etiqueta" for="comensales" >¿Cuántos comensales seréis?</label>
            <input class="reserva-input" type="number"  name="comensales">
        </fieldset>

        <fieldset class="reserva-campo">
            <label class="reserva-etiqueta" for="dia">Dia</label>
            <input class="reserva-input" type="date" name="dia">
        </fieldset>

        <fieldset class="reserva-campo">
            <label class="reserva-etiqueta" for="hora">Hora</label>
            <input class="reserva-input" type="time" name="hora">
        </fieldset>

        <input class="reserva-boton" type="submit" value = "Reservar Mesa">
    </form>

    <?php if ( $mensaje != '' ) { ?>
        <div class="mensajes">
            <p class="mensaje">
                <?php echo $mensaje; ?>
            </p>
        </div>
    <?php } ?>

</main>

<?php require_once('./includes/layout/footer.php'); ?>