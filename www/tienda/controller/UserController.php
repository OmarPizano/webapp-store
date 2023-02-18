<?
namespace tienda\controller;
use tienda\core\Request;
use tienda\core\Session;
use tienda\core\View;
use tienda\models\ProductListModel;
use tienda\models\UserModel;

class UserController
{
    public static function login(Request $request, $viewmodel) {
        $model = new UserModel();
        $model->load($request->dump());
        $id = $model->login();
        if (! $id) {
            Session::alert('Credenciales inválidas.', false);
            $viewmodel->template = 'product/featured';
            $viewmodel->title = 'Productos Destacados';
            $viewmodel->content = new ProductListModel;
        } else {
            Session::alert('Sesion iniciada.', true);
            Session::set('user_id', $id);
            // TODO: enviar al perfil de usuario en lugar de featured
            $viewmodel->template = 'product/featured';
            $viewmodel->title = 'Productos Destacados';
            $viewmodel->content = new ProductListModel;
        }
        $viewmodel->sidebar = $model;
        return $viewmodel;
    }

    public static function logout (Request $request, $viewmodel) {
        Session::alert('Sesión cerrada.', true);
        Session::unset('user_id');
        // TODO: mandar a la misma ruta actual
        $viewmodel->template = 'product/featured';
        $viewmodel->title = 'Productos Destacados';
        $viewmodel->content = new ProductListModel;
        $viewmodel->sidebar = new UserModel;
        return $viewmodel;
    }

    public static function register(Request $request, $viewmodel) {
        if ($request->getMethod() === 'GET') {
            $viewmodel->template = 'user/register';
            $viewmodel->title = 'Registro de usuario';
            $viewmodel->content = new ProductListModel;
            $viewmodel->sidebar = new UserModel;
            return $viewmodel;
        } elseif ($request->getMethod() === 'POST') {
            # code...
        } else {
            echo "Metodo no manejado";
        }
    }
}