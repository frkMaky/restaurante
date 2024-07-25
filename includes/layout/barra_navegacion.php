<?php
session_start();
?>

<nav class="header-menu">
    <a class="header-menu-enlace" href="./"><span class="material-symbols-outlined">home</span></a>
    <a class="header-menu-enlace" href="./carta.php">Nuestra Carta <span class="material-symbols-outlined">restaurant</span></a>
    <!-- <a class="header-menu-enlace" href="./gri/restaurante/restaurante/blog.php">Blog Nutrición<span class="material-symbols-outlined">history_edu</span></a> -->

    <a class="header-menu-enlace" href="./contacto.php">Contacto <span class="material-symbols-outlined">phone_in_talk</span></a>

    <?php if ( isset($_SESSION['idUsuario']) ) { ?>
        <a class="header-menu-enlace" href="./areaUsuario.php"> Area usuario <span class="material-symbols-outlined">account_box</span> </a>
        <a class="header-menu-enlace" href="./reservas.php">Reservas <span class="material-symbols-outlined">deck</span></a>
        <a class="header-menu-enlace" href="./a_domicilio.php">A Domicilio<span class="material-symbols-outlined">two_wheeler</span></a>
        <?php if ( $_SESSION['permisos'] =='admin' ) { ?>
            <a class="header-menu-enlace" href="./dashboard.php">Dashboard <span class="material-symbols-outlined">dashboard</span></a>
        <?php } ?>
    <?php } ?>
</nav>