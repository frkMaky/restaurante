
<?php require_once('./includes/layout/header.php'); ?>


<?php if (!isset($_SESSION['nombreUsuario']) ) {
    require_once('./includes/layout/formLogueo.php');
} else {
    require_once('./includes/layout/logueado.php');
}  ?>

    <section class="nosotros">
        <h2 class="nosotros-titulo">Los mejores platos y elaboración en el mejor ambiente</h2>
        <p class="nosotros-parrafo">Disfruta de nuestra comida casera en nuestro local o donde quieras con tus pedidos, nuestro cariño y compromiso será el mismo.</p>
        <div class="nosotros-imagenes">
            <picture class="nosotros-imagen-contenedor">
                <img class="nosotros-imagen" loading="lazy" src="./img/restaurante.jpg" alt="Imagen Restaurante">
            </picture>
            <picture class="nosotros-imagen-contenedor">
                <img class="nosotros-imagen" loading="lazy" src="./img/cocinaRestaurante.jpg" alt="Imagen Restaurante">
            </picture>
            <picture class="nosotros-imagen-contenedor">
                <img class="nosotros-imagen" loading="lazy" src="./img/olla.jpg" alt="Imagen Restaurante">
            </picture>
        </div>
    </section>

    <main class="platos">
        <h2 class="platos-titulo">Nuestros Platos</h2>
        <p class="platos-parrafo">Eleboración casera, ingredientes naturales y el cariño que ponemos en cada plato.</p>
        <div class="platos-galeria">
            <picture class="platos-marco-imagen">
                <img class="platos-imagen" loading="lazy" width="200" height="300" src="img/platos/lasanha.jpg" alt="Plato de Lasanha">
            </picture>
            
            <picture class="platos-marco-imagen">
                <img class="platos-imagen" loading="lazy" width="200" height="300" src="img/platos/pavoIntegral.webp" alt="Pavo Integral con verduras">
            </picture>
            
            <picture class="platos-marco-imagen">
                <img class="platos-imagen" loading="lazy" width="200" height="300" src="img/platos/chorizoPatatas.jpg" alt="Chorizo con Patatas">
            </picture>

            <picture class="platos-marco-imagen">
                <img class="platos-imagen" loading="lazy" width="200" height="300" src="img/platos/entrecot.jpg" alt="Plato de Lasanha">
            </picture>
            
            <picture class="platos-marco-imagen">
                <img class="platos-imagen" loading="lazy" width="200" height="300" src="img/platos/merluza.jpg" alt="Pavo Integral con verduras">
            </picture>
            
            <picture class="platos-marco-imagen">
                <img class="platos-imagen" loading="lazy" width="200" height="300" src="img/platos/brownie.jpg" alt="Chorizo con Patatas">
            </picture>
        </div>
        <a href="./carta.php" class="platos-marco-enlace">
            Mira Nuestra Carta 
            <span class="material-symbols-outlined">restaurant</span>
        </a>
    </main>

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

        <!--
        <a href="/blog.php" class="blog-marco-enlace">
            Sigue Nuestro Blog para ver más artículos  
            <span class="material-symbols-outlined">rss_feed</span>
        </a>
        -->
        
    </section>


<?php require_once('./includes/layout/footer.php'); ?>