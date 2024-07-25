
<fieldset class="productoCampo">
    <label class="productoCampo-etiqueta" for="nombreProducto">Nombre Plato:</label>
    <input  disabled  class="productoCampo-input" type="text" name="nombreProducto" value="<?php echo $productoVer['nombre'] ?? null; ?>">
</fieldset>

<fieldset class="productoCampo">
    <label class="productoCampo-etiqueta" for="descripcionProducto">Descripción Plato:</label>
    <textarea disabled  class="productoCampo-textarea" name="descripcionProducto" ><?php echo $productoVer['descripcion'] ?? null; ?></textarea>
</fieldset>

<fieldset class="productoCampo">
    <label class="productoCampo-etiqueta" for="categoria">Categoría:</label>
    <input disabled  class="productoCampo-input" type="text" name="categoria" value="<?php echo $productoVer['categoria'] ?? null; ?>">


</fieldset>

<fieldset class="productoCampo">
    <label class="productoCampo-etiqueta" for="imagenProducto">Imágen Plato:</label>
    <picture class="domicilio-tabla-contenedorImagenVer">
        <img class="domicilio-tabla-imagen" src="<?php echo RUTA_IMG_PRODUCTOS . $productoVer['imagen']; ?>" alt="<?php echo $productoVer['nombre']; ?>">
    </picture>
    </fieldset>

<fieldset class="productoCampo">
    <label class="productoCampo-etiqueta" for="precioProducto">Precio Plato:</label>
    <input disabled ="productoCampo-input" type="number" name="precioPlato" value="<?php echo $productoVer['precio'] ?? null; ?>">
</fieldset>