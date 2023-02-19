<h1>Editar Producto</h1>
<form action="/product/edit/<?=$model->id?>", method="POST">
    <div class="product-edit-form">
        <div class="photo_box">
            <div class="photo_box_img">
                <img src="<?= ASSET_URL . $model->product_image ?>" alt="product">
            </div>
            <div class="photo_box_button">
                <input type="file", name='product_image', accept="image/png">
            </div>
        </div>
        <div class="data_box">
            <input type="text" name="product_name" value="<?=$model->product_name?>" placeholder="Nombre del producto" required autofocus>
            <textarea name="product_description" value="<?=$model->product_description?>">Descripción del producto</textarea>
            <!-- TODO: autocargar las categorias de la dn -->
            <select name="product_category">
                <!-- <option value="" selected="selected" hidden="hidden"><?=$model->category_id?></option> -->
                <option value="0001">Ropa</option>
                <option value="0002">Supermercado</option>
                <option value="0003">Tecnología</option>
            </select>
            <input type="number" name="product_stock" value="<?=$model->product_stock?>" placeholder="Existencias" required>
            <input type="number" name="product_price" value="<?=$model->product_price?>" placeholder="Precio neto" required>
            <input type="number" name="product_discount" value="<?=$model->product_discount?>" placeholder="Descuento a aplicar" required>
        </div>
        <div class="submit_box">
            <input type="submit" name="edit_product_submit" value="Confirmar">
            <a href="/product/admin">Cancelar</a>
        </div>
    </div>
</form>