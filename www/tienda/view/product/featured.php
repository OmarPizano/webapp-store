<div class="product-list">
<? foreach ($model->getProductList() as $prod) : ?>
    <div class="product">
        <img src="<?=ASSET_URL . $prod->getImage()?>" alt="item">
        <p class="product-name"><?=$prod->getName()?></p>
        <div class="product-details">
            <p class="price-current"><?=$prod->getCurrentPrice()?></p>
            <p class="price-discount"><?=$prod->getDiscount()?></p>
            <p class="price-original"><?=$prod->getPrice()?></p>
            <div class="product-btns">
                <a href="/user/buy/<?=$prod->getID()?>" class="btn black">Comprar</a>
                <a href="/user/add/<?=$prod->getID()?>" class="btn normal">+</a>
            </div>
        </div>
    </div>
<? endforeach ?>
</div>