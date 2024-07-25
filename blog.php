<?php

session_start();

?>

<?php require_once('./includes/layout/header.php'); ?>

<?php if (!isset($_SESSION['idUsuario']) ) {
    require_once('./includes/layout/formLogueo.php');
} else {
    require_once('./includes/layout/logueado.php');
}  ?>

<section class="blog">
    <h2 class="blog-titulo">Alimentate Bien!</h2>
    <p class="blog-parrafo">Compartiendo conocimientos y experiencias para un estilo de vida saludable lleno de sabor.</p>

    <article class="articulo">
        <h3 class="articulo-titulo">La dieta mediterranea</h3>
        <p class="articulo-parrafo">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia ex nam enim exercitationem eum voluptate architecto expedita, non minus dolore asperiores nesciunt modi aut dolorem deleniti impedit esse? Vero, fugiat!</p>
        <picture class="articulo-marco-imagen">
            <img class="articulo-imagen" loading="lazy" width="200" height="300" src="img/platos/lasanha.jpg" alt="Plato de Lasanha">
        </picture>
        
        <footer class="articulo-footer">
            <p class="articulo-footer-parrafo">Autor: <span class="articulo-span">Pablo</span></p>
            <p class="articulo-footer-parrafo">Fecha: <span class="articulo-span">03-07-2024</span></p>
        </footer>
    </article>
    
    <article class="articulo">

        <div class="articulo-contenido">
            <h3 class="articulo-titulo">7 platos fáciles para días de calor</h3>
            <p class="articulo-parrafo">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia ex nam enim exercitationem eum voluptate architecto expedita, non minus dolore asperiores nesciunt modi aut dolorem deleniti impedit esse? Vero, fugiat!</p>
            <p class="articulo-parrafo">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis amet est dolores quibusdam! Quasi illo ipsam perspiciatis sit corrupti. Amet.</p>
        </div>

            <picture class="articulo-marco-imagen">
                <img class="articulo-imagen" loading="lazy" width="200" height="300" src="img/platos/brownie.jpg" alt="Plato de Lasanha">
            </picture>
        
        <footer class="articulo-footer">
            <p class="articulo-footer-parrafo">Autor: <span class="articulo-span">Pablo</span></p>
            <p class="articulo-footer-parrafo">Fecha: <span class="articulo-span">03-07-2024</span></p>
        </footer>
    </article>
    
    <article class="articulo">
        <h3 class="articulo-titulo">Un viaje por la gastronomía Cántabra</h3>
        <p class="articulo-parrafo">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia ex nam enim exercitationem eum voluptate architecto expedita, non minus dolore asperiores nesciunt modi aut dolorem deleniti impedit esse? Vero, fugiat!</p>
        <picture class="articulo-marco-imagen">
            <img class="articulo-imagen" loading="lazy" width="200" height="300" src="img/platos/chorizoPatatas.jpg" alt="Plato de Lasanha">
        </picture>
        
        <footer class="articulo-footer">
            <p class="articulo-footer-parrafo">Autor: <span class="articulo-span">Pablo</span></p>
            <p class="articulo-footer-parrafo">Fecha: <span class="articulo-span">03-07-2024</span></p>
        </footer>
    </article>
</section>

<?php require_once('./includes/layout/footer.php'); ?>