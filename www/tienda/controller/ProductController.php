<?
namespace tienda\controller;
use tienda\core\Session;
use tienda\core\View;

class ProductController
{
    public function featured() {
        Session::alert('Ejemplo de alerta', true);  // TODO: eliminar
        $view = View::render('product/featured');
        return $view;
    }
}