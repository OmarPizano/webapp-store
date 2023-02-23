<div class="product-list">
<?php foreach ($model->getProductList() as $prod) : ?>
    <div class="product">
        <img src="<?=ASSET_URL . $prod->product_image?>" alt="item">
        <p class="product-name"><?=$prod->product_name?></p>
        <div class="product-details">
            <p class="price-current"><?=$prod->getCurrentPrice()?></p>
            <p class="price-discount"><?=$prod->getDiscount()?></p>
            <p class="price-original"><?=$prod->getPrice()?></p>
            <div class="product-btns">
                <a href="/user/buy/<?=$prod->id?>" class="btn black">Comprar</a>
                <a href="/user/add/<?=$prod->id?>" class="btn normal">+</a>
            </div>
        </div>
    </div>
<?php endforeach ?>
</div>