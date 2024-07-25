<?php
require_once('./includes/database.php');
$conn = obetenerConexion();

session_start();

if( is_null($_SESSION["idUsuario"]) ) {
   header('Location: /gri/restaurante/restaurante/index.php');
}

// Seleccionar los productos de la carta para mostrarlos
$query = "SELECT * FROM producto";
$resultado = mysqli_query($conn,$query);
if (mysqli_num_rows($resultado) > 0) {
    while ($row = mysqli_fetch_assoc($resultado) ) {
        $productos[] = $row;        
    }
}
//$productos[] = $resultado->fetch_all()[0][2]; // listado de productos $productos[idProducto][columnaTabla]
$productosJSON = json_encode($productos, JSON_HEX_TAG); // Listado de productos en JSON para JS

// Seleccionar los productos de la carta para mostrarlos
$query = "SELECT * FROM producto WHERE categoria LIKE '%entrantes%'";
$resultado = mysqli_query($conn,$query);
$entrantes[] = $resultado->fetch_all(); // listado de productos $productos[idProducto][columnaTabla]

$query = "SELECT * FROM producto WHERE categoria LIKE '%arroces y pastas%'";
$resultado = mysqli_query($conn,$query);
$arroces[] = $resultado->fetch_all(); // listado de productos $productos[idProducto][columnaTabla]

$query = "SELECT * FROM producto WHERE categoria LIKE '%pescado%'";
$resultado = mysqli_query($conn,$query);
$pescados[] = $resultado->fetch_all(); // listado de productos $productos[idProducto][columnaTabla]

$query = "SELECT * FROM producto WHERE categoria LIKE '%carnes%'";
$resultado = mysqli_query($conn,$query);
$carnes[] = $resultado->fetch_all(); // listado de productos $productos[idProducto][columnaTabla]

$query = "SELECT * FROM producto WHERE categoria LIKE '%postres%'";
$resultado = mysqli_query($conn,$query);
$postres[] = $resultado->fetch_all(); // listado de productos $productos[idProducto][columnaTabla]

$query = "SELECT * FROM producto WHERE categoria LIKE '%bebidas%'";
$resultado = mysqli_query($conn,$query);
$bebidas[] = $resultado->fetch_all(); // listado de productos $productos[idProducto][columnaTabla]

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $pedidoJSON = json_decode($_POST["pedido"]);
    
    $idProductosString = implode(',', $pedidoJSON->idProductos);
    $cantidadProductosString = implode(',', $pedidoJSON->cantidadProductos);
    $totalProductosString = implode(',', $pedidoJSON->totalProductos);
    //debuguear($pedidoJSON);
    // Insertar PEDIDO
    $query = "INSERT INTO pedido (idUsuario, idProducto, cantidadProducto, totalProducto, total, estado, fecha, hora) VALUES(
    {$pedidoJSON->idUsuario}, '{$idProductosString}', '{$cantidadProductosString}','{$totalProductosString}', {$pedidoJSON->total}, '{$pedidoJSON->estado}','{$pedidoJSON->fecha}', '{$pedidoJSON->hora}'  );";
    
    $resultado = mysqli_query($conn,$query);

    if ($resultado) {
        header('Location: /gri/restaurante/restaurante/areaUsuario.php');
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
    <h1 class="domicilio-titulo">¡Te lo llevamos a casa!</h1>

    <input type="hidden" id="campoIdUsuario" value="<?php echo $_SESSION['idUsuario'];?>">
    <input type="hidden" id="productosJSON" data-lista='<?php echo $productosJSON; ?>'>
    
    <div class="tuPedido">
        <div class="carritoArticulos">
        </div>
    </div>

    <p class="domicilio-parrafo">Selecciona los productos para tu pedido:</p>

    <table class="domicilio-tabla">


        <fieldset class="domicilio-fielset">
            <table class="domicilio-tabla_interna">
                <legend class="domicilio-tabla-legend">ENTRANTES</legend>
                <tr class="domicilio-tabla-fila">
                    <th class="domicilio-tabla-th">Nombre del Plato</th>
                    <th class="domicilio-tabla-th">Descripción del Plato</th>
                    <th class="domicilio-tabla-th">Imagen</th>
                    <th class="domicilio-tabla-th">Precio por Unidad/Plato</th>
                    <th class="domicilio-tabla-th">Cantidad</th>
                </tr>
                <!-- Cada fieldset una categosria de la carta -->
                <?php foreach ($entrantes as $entrante) { ?>
                    <?php    foreach ($entrante as $key => $articulo) { ?>  
                        <tr class="domicilio-tabla-fila">
                            <td class="domicilio-tabla-td"><?php echo $articulo[1]; ?></td>
                            <td class="domicilio-tabla-td"><?php echo $articulo[2]; ?></td>
                            <td class="domicilio-tabla-td">
                                <picture class="domicilio-tabla-contenedorImagen">
                                    <img class="domicilio-tabla-imagen" src="<?php echo RUTA_IMG_PRODUCTOS . $articulo[4]; ?>" alt="<?php echo $articulo[1]; ?>">
                                </picture>
                            </td>
                            <td class="domicilio-tabla-td"><?php echo $articulo[5]; ?></td>
                            <td class="domicilio-tabla-td-opciones">    
                                <div class="campo">
                                    <input class="domicilio-tabla-input"  type="number" id="cantidad<?php echo $articulo[0];?>" name="cantidad">
                                </div>
                                <button class="domicilio-tabla-add" data-id="<?php echo $articulo[0];?>" data-precio="<?php echo $articulo[5];?>" id="<?php echo $articulo[0];?>"><span class="material-symbols-outlined">add</span></a>
                            </td>
                        </tr>
                    <?php } // foreach ($producto as $key => $articulo) ?>
                <?php } // foreach ($productos as $producto)  ?>
            </table>
        </fieldset>

        <fieldset class="domicilio-fielset">
            <table class="domicilio-tabla_interna">
                <legend class="domicilio-tabla-legend">Arroces y Pastas</legend>
                <tr class="domicilio-tabla-fila">
                    <th class="domicilio-tabla-th">Nombre del Plato</th>
                    <th class="domicilio-tabla-th">Descripción del Plato</th>
                    <th class="domicilio-tabla-th">Imagen</th>
                    <th class="domicilio-tabla-th">Precio por Unidad/Plato</th>
                    <th class="domicilio-tabla-th">Cantidad</th>
                </tr>
                <!-- Cada fieldset una categosria de la carta -->
                <?php foreach ($arroces as $arroz) { ?>
                    <?php    foreach ($arroz as $key => $articulo) { ?>  
                        <tr class="domicilio-tabla-fila">
                            <td class="domicilio-tabla-td"><?php echo $articulo[1]; ?></td>
                            <td class="domicilio-tabla-td"><?php echo $articulo[2]; ?></td>
                            <td class="domicilio-tabla-td">
                                <picture class="domicilio-tabla-contenedorImagen">
                                    <img class="domicilio-tabla-imagen" src="<?php echo RUTA_IMG_PRODUCTOS . $articulo[4]; ?>" alt="<?php echo $articulo[1]; ?>">
                                </picture>
                            </td>
                            <td class="domicilio-tabla-td"><?php echo $articulo[5]; ?></td>
                            <td class="domicilio-tabla-td-opciones">    
                                <div class="campo">
                                    <input class="domicilio-tabla-input"  type="number" id="cantidad<?php echo $articulo[0];?>" name="cantidad">
                                </div>
                                <button class="domicilio-tabla-add" data-id="<?php echo $articulo[0];?>" data-precio="<?php echo $articulo[5];?>" id="<?php echo $articulo[0];?>"><span class="material-symbols-outlined">add</span></a>
                                </td>
                        </tr>
                    <?php } // foreach ($producto as $key => $articulo) ?>
                <?php } // foreach ($productos as $producto)  ?>
            </table>
        </fieldset>

        <fieldset class="domicilio-fielset">
            <table class="domicilio-tabla_interna">
                <legend class="domicilio-tabla-legend">Pescados</legend>
                <tr class="domicilio-tabla-fila">
                    <th class="domicilio-tabla-th">Nombre del Plato</th>
                    <th class="domicilio-tabla-th">Descripción del Plato</th>
                    <th class="domicilio-tabla-th">Imagen</th>
                    <th class="domicilio-tabla-th">Precio por Unidad/Plato</th>
                    <th class="domicilio-tabla-th">Cantidad</th>
                </tr>
                <!-- Cada fieldset una categosria de la carta -->
                <?php foreach ($pescados as $pescado) { ?>
                    <?php    foreach ($pescado as $key => $articulo) { ?>  
                        <tr class="domicilio-tabla-fila">
                            <td class="domicilio-tabla-td"><?php echo $articulo[1]; ?></td>
                            <td class="domicilio-tabla-td"><?php echo $articulo[2]; ?></td>
                            <td class="domicilio-tabla-td">
                                <picture class="domicilio-tabla-contenedorImagen">
                                    <img class="domicilio-tabla-imagen" src="<?php echo RUTA_IMG_PRODUCTOS . $articulo[4]; ?>" alt="<?php echo $articulo[1]; ?>">
                                </picture>
                            </td>
                            <td class="domicilio-tabla-td"><?php echo $articulo[5]; ?></td>
                            <td class="domicilio-tabla-td-opciones">    
                                <div class="campo">
                                    <input class="domicilio-tabla-input"  type="number" id="cantidad<?php echo $articulo[0];?>" name="cantidad">
                                </div>
                                <button class="domicilio-tabla-add" data-id="<?php echo $articulo[0];?>" data-precio="<?php echo $articulo[5];?>" id="<?php echo $articulo[0];?>"><span class="material-symbols-outlined">add</span></a>
                                </td>
                        </tr>
                    <?php } // foreach ($producto as $key => $articulo) ?>
                <?php } // foreach ($productos as $producto)  ?>
            </table>
        </fieldset>

        <fieldset class="domicilio-fielset">
            <table class="domicilio-tabla_interna">
                <legend class="domicilio-tabla-legend">Carnes</legend>
                <tr class="domicilio-tabla-fila">
                    <th class="domicilio-tabla-th">Nombre del Plato</th>
                    <th class="domicilio-tabla-th">Descripción del Plato</th>
                    <th class="domicilio-tabla-th">Imagen</th>
                    <th class="domicilio-tabla-th">Precio por Unidad/Plato</th>
                    <th class="domicilio-tabla-th">Cantidad</th>
                </tr>
                <!-- Cada fieldset una categosria de la carta -->
                <?php foreach ($carnes as $carne) { ?>
                    <?php    foreach ($carne as $key => $articulo) { ?>  
                        <tr class="domicilio-tabla-fila">
                            <td class="domicilio-tabla-td"><?php echo $articulo[1]; ?></td>
                            <td class="domicilio-tabla-td"><?php echo $articulo[2]; ?></td>
                            <td class="domicilio-tabla-td">
                                <picture class="domicilio-tabla-contenedorImagen">
                                    <img class="domicilio-tabla-imagen" src="<?php echo RUTA_IMG_PRODUCTOS . $articulo[4]; ?>" alt="<?php echo $articulo[1]; ?>">
                                </picture>
                            </td>
                            <td class="domicilio-tabla-td"><?php echo $articulo[5]; ?></td>
                            <td class="domicilio-tabla-td-opciones">    
                                <div class="campo">
                                    <input class="domicilio-tabla-input"  type="number" id="cantidad<?php echo $articulo[0];?>" name="cantidad">
                                </div>
                                <button class="domicilio-tabla-add" data-id="<?php echo $articulo[0];?>" data-precio="<?php echo $articulo[5];?>" id="<?php echo $articulo[0];?>"><span class="material-symbols-outlined">add</span></a>
                                </td>
                        </tr>
                    <?php } // foreach ($producto as $key => $articulo) ?>
                <?php } // foreach ($productos as $producto)  ?>
            </table>
        </fieldset>

        <fieldset class="domicilio-fielset">
            <table class="domicilio-tabla_interna">
                <legend class="domicilio-tabla-legend">Postres</legend>
                <tr class="domicilio-tabla-fila">
                    <th class="domicilio-tabla-th">Nombre del Plato</th>
                    <th class="domicilio-tabla-th">Descripción del Plato</th>
                    <th class="domicilio-tabla-th">Imagen</th>
                    <th class="domicilio-tabla-th">Precio por Unidad/Plato</th>
                    <th class="domicilio-tabla-th">Cantidad</th>
                </tr>
                <!-- Cada fieldset una categosria de la carta -->
                <?php foreach ($postres as $postre) { ?>
                    <?php    foreach ($postre as $key => $articulo) { ?>  
                        <tr class="domicilio-tabla-fila">
                            <td class="domicilio-tabla-td"><?php echo $articulo[1]; ?></td>
                            <td class="domicilio-tabla-td"><?php echo $articulo[2]; ?></td>
                            <td class="domicilio-tabla-td">
                                <picture class="domicilio-tabla-contenedorImagen">
                                    <img class="domicilio-tabla-imagen" src="<?php echo RUTA_IMG_PRODUCTOS . $articulo[4]; ?>" alt="<?php echo $articulo[1]; ?>">
                                </picture>
                            </td>
                            <td class="domicilio-tabla-td"><?php echo $articulo[5]; ?></td>
                            <td class="domicilio-tabla-td-opciones">    
                                <div class="campo">
                                    <input class="domicilio-tabla-input"  type="number" id="cantidad<?php echo $articulo[0];?>" name="cantidad">
                                </div>
                                <button class="domicilio-tabla-add" data-id="<?php echo $articulo[0];?>" data-precio="<?php echo $articulo[5];?>" id="<?php echo $articulo[0];?>"><span class="material-symbols-outlined">add</span></a>
                            </td>
                        </tr>
                    <?php } // foreach ($producto as $key => $articulo) ?>
                <?php } // foreach ($productos as $producto)  ?>
            </table>
        </fieldset>


        <fieldset class="domicilio-fielset">
            <table class="domicilio-tabla_interna">
                <legend class="domicilio-tabla-legend">Bebidas</legend>
                <tr class="domicilio-tabla-fila">
                    <th class="domicilio-tabla-th">Nombre del Plato</th>
                    <th class="domicilio-tabla-th">Descripción del Plato</th>
                    <th class="domicilio-tabla-th">Imagen</th>
                    <th class="domicilio-tabla-th">Precio por Unidad/Plato</th>
                    <th class="domicilio-tabla-th">Cantidad</th>
                </tr>
                <!-- Cada fieldset una categosria de la carta -->
                <?php foreach ($bebidas as $bebida) { ?>
                    <?php    foreach ($bebida as $key => $articulo) { ?>  
                        <tr class="domicilio-tabla-fila">
                            <td class="domicilio-tabla-td"><?php echo $articulo[1]; ?></td>
                            <td class="domicilio-tabla-td"><?php echo $articulo[2]; ?></td>
                            <td class="domicilio-tabla-td">
                                <picture class="domicilio-tabla-contenedorImagen">
                                    <img class="domicilio-tabla-imagen" src="<?php echo RUTA_IMG_PRODUCTOS . $articulo[4]; ?>" alt="<?php echo $articulo[1]; ?>">
                                </picture>
                            </td>
                            <td class="domicilio-tabla-td"><?php echo $articulo[5]; ?></td>
                            <td class="domicilio-tabla-td-opciones">    
                                <div class="campo">
                                    <input class="domicilio-tabla-input"  type="number" id="cantidad<?php echo $articulo[0];?>" name="cantidad">
                                </div>
                                <button class="domicilio-tabla-add" data-id="<?php echo $articulo[0];?>" data-precio="<?php echo $articulo[5];?>" id="<?php echo $articulo[0];?>"><span class="material-symbols-outlined">add</span></a>
                            </td>
                        </tr>
                    <?php } // foreach ($producto as $key => $articulo) ?>
                <?php } // foreach ($productos as $producto)  ?>
            </table>
        </fieldset>


    </table>
</main>

<?php require_once('./includes/layout/footer.php'); ?>