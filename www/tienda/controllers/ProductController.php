<?
namespace tienda\controllers;
use tienda\core\View;

class ProductController
{
    public function featured()
    {
        View::render('product/featured');
    }
}