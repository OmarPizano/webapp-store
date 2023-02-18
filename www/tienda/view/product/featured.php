<h1>Productos Destacados</h1>
<?
use tienda\core\ui\ProductList;
use tienda\core\ui\UiHelper;

UiHelper::checkAlert();

ProductList::begin();
foreach ($model->getProductList() as $product) {
    ProductList::item(
        ASSET_URL . $product->getImage(),
        $product->getCurrentPrice(),
        $product->getDiscount(),
        $product->getPrice(),
        '/user/buy/' . $product->getID(),
        '/user/add/' . $product->getID(),
        $product->getName());
}
ProductList::end();