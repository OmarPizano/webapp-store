<?
namespace tienda\core\ui;

class ProductList
{
    public static function begin() {
        echo sprintf('
        <div class="product-list">
        ');
    }
    public static function end() {
        echo sprintf('
        </div>
        ');
    }
    public static function item(
        string $img_path,
        string $price_current,
        string $price_discount,
        string $price_original,
        string $href_buy,
        string $href_add,
        string $description
    ) {
        echo sprintf('
            <div class="product">
                <img src="%s" alt="item">
                <div class="product-details">
                    <div class="product-price">
                        <p class="price-current">%s</p>
                        <p class="price-discount">%s</p>
                    </div>
                    <p class="price-original">%s</p>
                    <div class="product-btns">
                        <a href="%s" class="btn btn-black">Comprar</a>
                        <a href="%s" class="btn btn-normal">+</a>
                    </div>
                    <div class="product-desc">
                        <p>%s</p>
                    </div>
                </div>
            </div>
        ', $img_path, $price_current, $price_discount, $price_original, $href_buy, $href_buy, $description);
    }
}