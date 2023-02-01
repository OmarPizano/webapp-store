<?
namespace tienda\controller;
use tienda\core\View;
use tienda\models\LoginModel;
use tienda\models\ProductsModel;

class ProductController
{
    public function featured() {
        View::$sidebar_model = new LoginModel;
        View::$content_model = new ProductsModel;
        $view = View::render('product/featured');
        return $view;
    }
}