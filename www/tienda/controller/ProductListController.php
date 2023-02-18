<?
namespace tienda\controller;
use tienda\core\Request;
use tienda\core\View;
use tienda\models\ProductListModel;
use tienda\models\UserModel;

class ProductListController
{
    public static function getFeatured(Request $request) {
        $model = new ProductListModel();
        $model->selectAllProducts();
        return new View($model, 'product/featured', 'Productos Destacados');
    }
}