<?
namespace tienda\controller;
use tienda\core\Request;
use tienda\core\Response;
use tienda\core\Session;
use tienda\core\View;
use tienda\models\ProductListModel;

class ProductListController
{
    public static function getFeatured(Request $request) {
        $model = new ProductListModel();
        $model->selectAllProducts();
        return new View($model, 'product/featured', 'Productos Destacados');
    }

    public static function crudProducts(Request $request) {
        if (Session::get('user_id') and Session::get('admin')) {
            $model = new ProductListModel();
            if ($request->getMethod() === 'POST') {
                $model->searchProducts($request->query('search'));
            } else {
                $model->selectAllProducts();
            }
            return new View($model, 'product/crud', 'Administración de Productos');
        } else {
            Session::alert('Permiso denegado al recurso.', false);
            Response::redirect('/');
        }
    }
}