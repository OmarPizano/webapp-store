<?
namespace tienda\controller;
use tienda\core\Session;
use tienda\core\View;
use tienda\models\LoginModel;
use tienda\models\ProductListModel;

class ProductController
{
    public function featured() {
        View::$sidebar_model = new LoginModel;
        // View::$content_model = new ProductListModel;
        $view = View::render('product/featured');
        return $view;
    }
}