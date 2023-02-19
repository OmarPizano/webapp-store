<h1>Editar Producto</h1>
<form action="/product/edit/<?=$model->id?>", method="POST">
    <div class="product-edit-form">
        <div class="photo_box">
                <img src="<?= ASSET_URL . $model->product_image ?>" alt="product">
            <div class="photo_box_button">
                <label>Dejar la imagen actual o seleccionar una nueva
                <input type="file", name='product_image', accept="image/png"></label>
            </div>
        </div>
        <div class="data_box">
            <div class="text_data">
                <label>Nombre
                    <input type="text" name="product_name" value="<?=$model->product_name?>" required autofocus>
                </label>
                <label>Descripción
                <textarea name="product_description" ><?= $model->product_description ?></textarea>
                </label>
                <!-- TODO: autocargar las categorias de la dn -->
                <label>Categoría
                    <select name="product_category">
                        <option value="0001">Ropa</option>
                        <option value="0002">Supermercado</option>
                        <option value="0003">Tecnología</option>
                    </select>
                </label>
            </div>
            <div class='numeric_data'>
                <div>
                    <label>Stock
                    <input type="number" name="product_stock" value="<?=$model->product_stock?>" required></label>
                </div>
                <div>
                    <label>Precio
                    <input type="number" name="product_price" value="<?=$model->product_price?>" required></label>
                </div>
                <div>
                    <label>Descuento
                    <input type="number" name="product_discount" value="<?=$model->product_discount?>" required></label>
                </div>
            </div>
        </div>
        <div class="submit_box">
            <div>
                <input type="submit" name="edit_product_submit" value="Confirmar">
            </div>
            <div>
                <a href="/product/admin">Cancelar</a>
            </div>
        </div>
    </div>
</form>