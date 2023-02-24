<form class="product-edit-form" action="/product/new" method="POST" enctype="multipart/form-data">
    <div class="photo_box">
        <img src="<?= ASSET_URL . '/product.png' ?>" alt="product">
        <label for="image">Seleccione una nueva imagen si lo desea.</label>
        <input id="image" type="file" name='product_image' accept="image/png">
    </div>
    <div class="data_box">
        <label>Nombre</label>
        <input type="text" name="product_name" value="<?=$product_name?>" required autofocus>
        <label>Descripción</label>
        <textarea name="product_description" ><?= $product_description ?></textarea>
        <label>Categoría</label>
        <select name="category_id">
            <?php foreach ($cats as $cat) : ?>
                <?php if (intval($cat->id) === intval($category_id)) : ?>
                    <option selected value="<?=$cat->id?>"><?=$cat->category_name?></option>
                <?php else :?>
                    <option value="<?=$cat->id?>"><?=$cat->category_name?></option>
                <?php endif ?>
            <?php endforeach ?>
        </select>
        <label>Stock</label>
        <input type="number" name="product_stock" value="<?=$product_stock?>" required>
        <label>Precio</label>
        <input type="number" name="product_price" value="<?=$product_price?>" required>
        <label>Descuento</label>
        <input type="number" name="product_discount" value="<?=$product_discount?>" required>
    </div>
    <div class="submit_box">
        <a class="btn black" href="/product/admin">Cancelar</a>
        <input class="btn red" type="submit" name="add_product_submit" value="Confirmar">
    </div>
</form>