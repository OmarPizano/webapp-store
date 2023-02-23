<form action="/product/edit/<?=$model->id?>", method="POST">
    <div class="product-edit-form">
        <div class="photo_box">
                <img src="<?= ASSET_URL . $model->product_image ?>" alt="product">
            <div class="photo_box_button">
                <label for="image">Dejar la imagen actual o subir una nueva.</label>
                <input id="image" type="file", name='product_image', accept="image/png">
            </div>
        </div>
        <div class="data_box">
            <div class="text_data">
                <label>Nombre</label>
                <input type="text" name="product_name" value="<?=$model->product_name?>" required autofocus>
                <label>Nombre</label>
                <textarea name="product_description" ><?= $model->product_description ?></textarea>
                <!-- TODO: autocargar las categorias de la dn -->
                <label>Categoría</label>
                <select name="product_category">
                    <option value="0001">Ropa</option>
                    <option value="0002">Supermercado</option>
                    <option value="0003">Tecnología</option>
                </select>
            </div>
            <div class='numeric_data'>
                <div class="data">
                    <label>Stock</label>
                    <input type="number" name="product_stock" value="<?=$model->product_stock?>" required>
                </div>
                <div class="data">
                    <label>Precio</label>
                    <input type="number" name="product_price" value="<?=$model->product_price?>" required>
                </div>
                <div class="data">
                    <label>Descuento</label>
                    <input type="number" name="product_discount" value="<?=$model->product_discount?>" required>
                </div>
            </div>
        </div>
        <div class="submit_box">
            <input class="btn black" type="submit" name="edit_product_submit" value="Confirmar">
            <a class="btn red" href="/product/admin">Cancelar</a>
        </div>
    </div>
</form>