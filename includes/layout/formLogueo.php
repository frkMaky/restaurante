<?php
    require_once('./includes/database.php');

    session_start();
    
    $conn = obetenerConexion();
    
    if ($_SERVER['REQUEST_METHOD']=='POST') {

        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = "SELECT id, nombre, apellidos, permisos FROM usuarios WHERE email = ? AND password = ?";
        $stmt = mysqli_prepare($conn, $query);
        $stmt->bind_param("ss",$email,$password);
        $stmt->bind_result($id,$nombre,$apellidos,$permisos);
        $resultado = $stmt->execute();
        $stmt->fetch();

        if ($resultado) {
            $_SESSION['idUsuario'] = $id;
            $_SESSION['nombreUsuario'] = $nombre;
            $_SESSION['apellidosUsuario'] = $apellidos;
            $_SESSION['permisos'] = $permisos;
            header('Location: '.$_SERVER['REQUEST_URI']);
        }
    }

?>

<div class="sesion">
    <form class="sesionForm" method="post">
        <fieldset class="sesionCampo">
            <label for="email">Email: </label>
            <input type="email" name="email">
        </fieldset>

        <fieldset class="sesionCampo">
            <label for="password">Password: </label>
            <input type="password" name="password">
        </fieldset>
        <input class="sesionBoton" type="submit" value="Entrar">
    </form>
    <div class="enlaces-cuenta">
        <a class="enlaces-cuenta-enlace" href="./crearCuenta.php">Obten una cuenta</a>
        <a class="enlaces-cuenta-enlace" href="./recu.php">Recupera tu contraseña</a>
    </div>
</div>