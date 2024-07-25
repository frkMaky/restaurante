<?php
    session_start();

    require_once('./includes/database.php');
    $conn = obetenerConexion();
    $query = "SELECT * FROM producto";
    $resultado = mysqli_query($conn,$query);

    $entrantes =  [];
    $arroces =  [];
    $pescados =  [];
    $carnes =  [];
    $postres =  [];
    $bebidas =  [];

    if (mysqli_num_rows($resultado) > 0) {
        while ($row = mysqli_fetch_assoc($resultado) ) {

            switch ($row['categoria']) {
                case 'entrantes':
                    $entrantes[] = $row;
                    break;
                
                case 'arroces y pastas':
                    $arroces[] = $row;
                    break;
                
                case 'pescado':
                    $pescados[] = $row;
                    break;
                
                case 'carnes':
                    $carnes[] = $row;
                    break;
                case 'postres':
                    $postres[] = $row;
                    break;
                case 'bebidas':
                    $bebidas[] = $row;
                    break;
                        
                default:
                    # code...
                    break;
            }
        }
    }
 
?>

<?php require_once('./includes/layout/header.php'); ?>

<?php if (!isset($_SESSION['idUsuario']) ) {
    require_once('./includes/layout/formLogueo.php');
} else {
    require_once('./includes/layout/logueado.php');
}  ?>

<main>
    <h1 class="carta-titulo">Nuestra Carta</h1>

    <section class="carta-seccion">

        <h3 class="carta-seccion-titulo">ENTRANTES</h3>

        <table class="carta-seccion-tabla">
            <tr>
                <th class="carta-seccion-th">Nombre</th> 
                <th class="carta-seccion-th">Descripcion</th>
                <th class="carta-seccion-th">Precio</th> 
                <th class="carta-seccion-th">Imagen</th>
            </tr>
            <?php foreach ($entrantes as $entrante) {  ?>
                <tr>
                    <td class="carta-seccion-td"><?php echo $entrante['nombre']; ?> </td>
                    <td class="carta-seccion-td"><?php echo $entrante['descripcion']; ?> </td>
                    <td class="carta-seccion-td"><?php echo $entrante['precio']; ?> </td>
                    <td class="carta-seccion-td">
                        <picture class="carta-seccion-contenedorImagen">
                            <img class="carta-seccion-imagen" src="<?php  echo RUTA_IMG_PRODUCTOS . $entrante["imagen"]; ?>" alt="<?php echo $entrante['nombre']; ?>">
                        </picture>
                         
                    </td>
                </tr>
            <?php }?>
        </table>

    </section>


    <section class="carta-seccion">
        
        <h3 class="carta-seccion-titulo">Arroces y Pastas</h3>

        <table class="carta-seccion-tabla">
            <tr>
                <th class="carta-seccion-th">Nombre</th> 
                <th class="carta-seccion-th">Descripcion</th>
                <th class="carta-seccion-th">Precio</th> 
                <th class="carta-seccion-th">Imagen</th>
            </tr>
             <?php foreach ($arroces as $arroz) { ?>
                <tr>
                    <td class="carta-seccion-td"><?php echo $arroz['nombre']; ?> </td>
                    <td class="carta-seccion-td"><?php echo $arroz['descripcion']; ?> </td>
                    <td class="carta-seccion-td"><?php echo $arroz['precio']; ?> </td>
                    <td class="carta-seccion-td">
                        <picture class="carta-seccion-contenedorImagen">
                            <img class="carta-seccion-imagen" src="<?php echo RUTA_IMG_PRODUCTOS . $arroz['imagen']; ?>" alt="<?php echo $arroz['nombre']; ?>">
                        </picture>
                         
                    </td>
                </tr>
            <?php }?>
        </table>
    </section>


    <section class="carta-seccion">
                
        <h3 class="carta-seccion-titulo">Pescados<h3>

        <table class="carta-seccion-tabla">
            <tr>
                <th class="carta-seccion-th">Nombre</th> 
                <th class="carta-seccion-th">Descripcion</th>
                <th class="carta-seccion-th">Precio</th> 
                <th class="carta-seccion-th">Imagen</th>
            </tr>
            <?php foreach ($pescados as $pescado) { ?>
                <tr>
                    <td class="carta-seccion-td"><?php echo $pescado['nombre']; ?> </td>
                    <td class="carta-seccion-td"><?php echo $pescado['descripcion']; ?> </td>
                    <td class="carta-seccion-td"><?php echo $pescado['precio']; ?> </td>
                    <td class="carta-seccion-td">
                        <picture class="carta-seccion-contenedorImagen">
                            <img class="carta-seccion-imagen" src="<?php echo RUTA_IMG_PRODUCTOS . $pescado['imagen']; ?>" alt="<?php echo $pescado['nombre']; ?>">
                        </picture>
                         
                    </td>
                </tr>
            <?php }?>
        </table>

    </section>


    <section class="carta-seccion">
        <h3 class="carta-seccion-titulo">Carnes<h3>

        <table class="carta-seccion-tabla">
            <tr>
                <th class="carta-seccion-th">Nombre</th> 
                <th class="carta-seccion-th">Descripcion</th>
                <th class="carta-seccion-th">Precio</th> 
                <th class="carta-seccion-th">Imagen</th>
            </tr>
            <?php foreach ($carnes as $carne) { ?>
                <tr>
                    <td class="carta-seccion-td"><?php echo $carne['nombre']; ?> </td>
                    <td class="carta-seccion-td"><?php echo $carne['descripcion']; ?> </td>
                    <td class="carta-seccion-td"><?php echo $carne['precio']; ?> </td>
                    <td class="carta-seccion-td">
                        <picture class="carta-seccion-contenedorImagen">
                            <img class="carta-seccion-imagen" src="<?php echo RUTA_IMG_PRODUCTOS . $carne['imagen']; ?>" alt="<?php echo $carne['nombre']; ?>">
                        </picture>
                         
                    </td>
                </tr>
            <?php }?>
        </table>  
    </section>

    <section class="carta-seccion">
        <h3 class="carta-seccion-titulo">Postres<h3>

        <table class="carta-seccion-tabla">
            <tr>
                <th class="carta-seccion-th">Nombre</th> 
                <th class="carta-seccion-th">Descripcion</th>
                <th class="carta-seccion-th">Precio</th> 
                <th class="carta-seccion-th">Imagen</th>
            </tr>
            <?php foreach ($postres as $postre) { ?>
                <tr>
                    <td class="carta-seccion-td"><?php echo $postre['nombre']; ?> </td>
                    <td class="carta-seccion-td"><?php echo $postre['descripcion']; ?> </td>
                    <td class="carta-seccion-td"><?php echo $postre['precio']; ?> </td>
                    <td class="carta-seccion-td">
                        <picture class="carta-seccion-contenedorImagen">
                            <img class="carta-seccion-imagen" src="<?php echo RUTA_IMG_PRODUCTOS . $postre['imagen']; ?>" alt="<?php echo $postre['nombre']; ?>">
                        </picture>
                         
                    </td>
                </tr>
            <?php }?>
        </table>   
    </section>

    <section class="carta-seccion">
        <h3 class="carta-seccion-titulo">Bebidas<h3>

        <table class="carta-seccion-tabla">
            <tr>
                <th class="carta-seccion-th">Nombre</th> 
                <th class="carta-seccion-th">Descripcion</th>
                <th class="carta-seccion-th">Precio</th> 
                <th class="carta-seccion-th">Imagen</th>
            </tr>
            <?php foreach ($bebidas as $bebida) { ?>
                <tr>
                    <td class="carta-seccion-td"><?php echo $bebida['nombre']; ?> </td>
                    <td class="carta-seccion-td"><?php echo $bebida['descripcion']; ?> </td>
                    <td class="carta-seccion-td"><?php echo $bebida['precio']; ?> </td>
                    <td class="carta-seccion-td">
                        <picture class="carta-seccion-contenedorImagen">
                            <img class="carta-seccion-imagen" src="<?php echo RUTA_IMG_PRODUCTOS . $bebida['imagen']; ?>" alt="<?php echo $bebida['nombre']; ?>">
                        </picture>
                         
                    </td>
                </tr>
            <?php }?>
        </table>       
    </section>

</main>

<?php require_once('./includes/layout/footer.php'); ?>