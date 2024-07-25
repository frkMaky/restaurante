<?php
require_once('./includes/database.php');
$conn = obetenerConexion();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $direccion = $_POST["direccion"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $telefono = $_POST["telefono"];
    $tarjeta = $_POST["tarjeta"];

    $query = "INSERT INTO usuarios (nombre, apellidos, direccion, email, telefono, tarjeta, password) VALUES
    ('{$nombre}', '{$apellidos}', '{$direccion}','{$email}', '{$telefono}','{$tarjeta}', {$password})";

    $resultado = mysqli_query($conn,$query);

    if ($resultado) {
        header('Location: /gri/restaurante/restaurante/index.php');
    }
}

?>

<?php require_once('./includes/layout/header.php'); ?>

<main>
    <h1 class="cuenta-titulo">Crea tu Cuenta</h1>
    <h3 class="cuenta-subtitulo">Registrate para poder reservar tu mesa o pedir a domicilio</h3>

    <div class="formularioRegistro-contenedor">
        <form class="formularioRegistro" method="POST">

            <fieldset class="formularioRegistro-campo" >
                <label class="formularioRegistro-etiqueta" for="nombre">Nombre: </label>
                <input class="formularioRegistro-input"  type="text" name="nombre">
            </fieldset>

            <fieldset class="formularioRegistro-campo" >
                <label class="formularioRegistro-etiqueta" for="apellidos">Apellidos: </label>
                <input class="formularioRegistro-input"  type="text" name="apellidos">
            </fieldset>

            <fieldset class="formularioRegistro-campo" >
                <label class="formularioRegistro-etiqueta" for="direccion">Dirección: </label>
                <input class="formularioRegistro-input"  type="text" name="direccion">
            </fieldset>

            <fieldset class="formularioRegistro-campo" >
                <label class="formularioRegistro-etiqueta" for="email">Email: </label>
                <input class="formularioRegistro-input"  type="email" name="email">
            </fieldset>

            <fieldset class="formularioRegistro-campo" >
                <label class="formularioRegistro-etiqueta" for="password">Password: </label>
                <input class="formularioRegistro-input"  type="password" name="password">
            </fieldset>

            <fieldset class="formularioRegistro-campo" >
                <label class="formularioRegistro-etiqueta" for="telefono">Teléfono: </label>
                <input class="formularioRegistro-input"  type="tel" name="telefono">
            </fieldset>

            <fieldset class="formularioRegistro-campo" >
                <label class="formularioRegistro-etiqueta" for="tarjeta">Nº Tarjeta: </label>
                <input class="formularioRegistro-input"  type="text" name="tarjeta">
            </fieldset>


            <input class="formularioRegistro-submit"  type="submit" value="Crear tu cuenta">

        </form>
    </div>

</main>

<?php require_once('./includes/layout/footer.php'); ?>