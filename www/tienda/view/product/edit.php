<?php 
$cat_model = new tienda\models\CategoriesModel();
$cat_model->selectAll();
$cats = $cat_model->getAll();
?>

<form class="product-edit-form" action="/product/edit/<?=$model->id?>" method="POST">
    <div class="photo_box">
        <img src="<?= ASSET_URL . $model->product_image ?>" alt="product">
        <label for="image">Seleccione una nueva imagen si lo desea.</label>
        <input id="image" type="file" name='product_image' accept="image/png">
    </div>
    <div class="data_box">
        <label>Nombre</label>
        <input type="text" name="product_name" value="<?=$model->product_name?>" required autofocus>
        <label>Descripción</label>
        <textarea name="product_description" ><?= $model->product_description ?></textarea>
        <label>Categoría</label>
        <select name="category_id">
            <?php foreach ($cats as $cat) : ?>
                <?php if (intval($cat->id) === intval($model->category_id)) : ?>
                    <option selected value="<?=$cat->id?>"><?=$cat->category_name?></option>
                <?php else :?>
                    <option value="<?=$cat->id?>"><?=$cat->category_name?></option>
                <?php endif ?>
            <?php endforeach ?>
        </select>
        <label>Stock</label>
        <input type="number" name="product_stock" value="<?=$model->product_stock?>" required>
        <label>Precio</label>
        <input type="number" name="product_price" value="<?=$model->product_price?>" required>
        <label>Descuento</label>
        <input type="number" name="product_discount" value="<?=$model->product_discount?>" required>
    </div>
    <div class="submit_box">
        <a class="btn black" href="/product/admin">Regresar</a>
        <input class="btn red" type="submit" name="edit_product_submit" value="Confirmar">
    </div>
</form>