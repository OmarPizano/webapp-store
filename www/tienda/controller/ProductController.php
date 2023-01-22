<?
namespace tienda\controller;
use tienda\core\View;

class ProductController
{
    public function featured() {
        $view = View::render('product/featured');
        return $view;
    }
}