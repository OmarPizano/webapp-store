<?
namespace tienda\core\ui\product;

class Product
{
    public static function item(
        string $img_path,
        string $current_price,
        string $discount,
        string $original_price,
        string $href_buy,
        string $href_add,
        string $description
    ) {
        echo sprintf('
            <div class="product">
                <img src="%s" alt="item">
                <div class="product-details">
                    <div class="product-price">
                        <p class="price-current">$%s</p>
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
        ', $img_path, $current_price, $discount, $original_price, $href_buy, $href_add, $description);
    }
}