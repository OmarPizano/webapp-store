<?
namespace tienda\controller;
use tienda\core\Request;
use tienda\core\View;
use tienda\models\ProductListModel;

class ProductListController
{
    public static function getFeatured(Request $request) { 
        // obtener la lista de productos
        $model = new ProductListModel();
        $data = $model->getAll(); 
        // pasar la lista de productos a la vista
        $view = new View(['content' => $data], 'product/featured', 'Productos Destacados');
        return $view->render();
    }
}