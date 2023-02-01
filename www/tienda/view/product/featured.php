<h1>Productos Destacados</h1>
<?
use tienda\core\ui\ProductList;
use tienda\core\ui\UiHelper;
use tienda\core\View;

UiHelper::checkAlert();

$products = View::$content_model->getAllProducts();

ProductList::begin();
foreach ($products as $p) {
    ProductList::item(
        ASSET_URL . $p->getImage(),
        $p->getCurrentPrice(),
        $p->getDiscount(),
        $p->getPrice(),
        '/user/buy/' . $p->getID(),
        '/user/add/' . $p->getID(),
        $p->getName());
    
}
ProductList::end();