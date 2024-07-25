<input class="productoCampo-input" type="hidden" name="idProducto" value="<?php echo $productoVer['id'] ?? null; ?>">

<fieldset class="productoCampo">
    <label class="productoCampo-etiqueta" for="nombreProducto">Nombre Plato:</label>
    <input class="productoCampo-input" type="text" name="nombreProducto" value="<?php echo $productoVer['nombre'] ?? null; ?>">
</fieldset>

<fieldset class="productoCampo">
    <label class="productoCampo-etiqueta" for="descripcionProducto">Descripción Plato:</label>
    <textarea class="productoCampo-textarea" name="descripcionProducto" ><?php echo $productoVer['descripcion'] ?? null; ?></textarea>
</fieldset>

<fieldset class="productoCampo">
    <label class="productoCampo-etiqueta" for="categoria">Categoría:</label>
    <select class="productoCampo-select" name="categoria">
        <option class="productoCampo-option" value="entrantes">ENTRANTES</option>
        <option class="productoCampo-option" value="arroces y pastas">ARROCES Y PASTAS</option>
        <option class="productoCampo-option" value="pescados">PESCADOS</option>
        <option class="productoCampo-option" value="carnes">CARNES</option>
        <option class="productoCampo-option" value="postres">POSTRES</option>
        <option class="productoCampo-option" value="bebidas">BEBIDAS</option>
    </select>
</fieldset>

<fieldset class="productoCampo">
    <label class="productoCampo-etiqueta" for="imagenProducto">Imágen Plato:</label>
    <input class="productoCampo-input" type="file"  name="imagenProducto" value="<?php echo $productoVer['imagen'] ?? null; ?>">
    <picture class="domicilio-tabla-contenedorImagen">
        <img  class="domicilio-tabla-imagen" src="<?php echo RUTA_IMG_PRODUCTOS . $productoVer['imagen']; ?>"  alt="<?php echo $productoVer['nombre']; ?>">
        <input type="hidden" name="imagenPrevia" id="imagenPrevia" value="<?php echo $productoVer['imagen']; ?>">
    </picture>
</fieldset>

<fieldset class="productoCampo">
    <label class="productoCampo-etiqueta" for="precioProducto">Precio Plato:</label>
    <input class="productoCampo-input" type="number" step=".01" name="precioPlato" value="<?php echo $productoVer['precio'] ?? null; ?>">
</fieldset>