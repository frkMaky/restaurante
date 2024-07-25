<?php

session_start();

?>

<?php require_once('./includes/layout/header.php'); ?>

<?php if (!isset($_SESSION['nombreUsuario']) ) {
    require_once('./includes/layout/formLogueo.php');
} else {
    require_once('./includes/layout/logueado.php');
}  ?>

<main>
    <h1 class="contacto-titulo">Contacta con nosotros: </h1>

    <div class="tarjetaDireccion">
        <h3 class="tarjetaDireccion-titulo">            
            <span class="material-symbols-outlined">stockpot</span>
            La Cocina de Mamá    
            <span class="material-symbols-outlined">stockpot</span>
        </h3>

        <p class="tarjetaDireccion-parrafo">Calle Falsa 123, Vigo Pontevedra</p>
        <p class="tarjetaDireccion-parrafo">555-123456789</p>
    </div>

    <div class="centrar">
        <iframe class="tarjetaDireccion-mapa" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2953.210591194061!2d-8.700086623501337!3d42.252675141878626!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd2f62fa351d5f57%3A0x1b709ebaa374ebe7!2sRestaurante%20A%20Coci%C3%B1a%20da%20Marisa!5e0!3m2!1ses!2ses!4v1720081769518!5m2!1ses!2ses"  allowfullscreen="true" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>


</main>

<?php require_once('./includes/layout/footer.php'); ?>