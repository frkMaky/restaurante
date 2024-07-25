<?php
require_once('./includes/database.php');
$conn = obetenerConexion();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = $_POST["email"];
    $password = $_POST["password"];
    $telefono = $_POST["telefono"];
   
    $query = "UPDATE usuarios SET password = '{$password}' WHERE email LIKE '%{$email}%' AND telefono LIKE '%{$telefono}%'";

    $resultado = mysqli_query($conn,$query);

    if ($resultado) {
        header('Location: /gri/restaurante/restaurante/index.php');
    }
}

?>

<?php require_once('./includes/layout/header.php'); ?>

<main>
    <h1 class="cuenta-titulo">Reescribe tu contraseña</h1>
    <h3 class="cuenta-subtitulo">Rellena el formulario para reescribir tu contraseña</h3>

    <div class="formularioRegistro-contenedor">
        <form class="formularioRegistro" method="POST">

            <fieldset class="formularioRegistro-campo" >
                <label class="formularioRegistro-etiqueta" for="email">Email: </label>
                <input class="formularioRegistro-input"  type="email" name="email">
            </fieldset>

            <fieldset class="formularioRegistro-campo" >
                <label class="formularioRegistro-etiqueta" for="telefono">Teléfono: </label>
                <input class="formularioRegistro-input"  type="tel" name="telefono">
            </fieldset>

            <fieldset class="formularioRegistro-campo" >
                <label class="formularioRegistro-etiqueta" for="password">NUEVO PASSWORD: </label>
                <input class="formularioRegistro-input"  type="password" name="password">
            </fieldset>

            <input class="formularioRegistro-submit"  type="submit" value="Actualiza tu contraseña">

        </form>
    </div>

</main>

<?php require_once('./includes/layout/footer.php'); ?>