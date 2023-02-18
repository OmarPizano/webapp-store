<?
namespace tienda\controller;
use tienda\core\Request;
use tienda\core\Session;
use tienda\core\View;
use tienda\models\UserModel;

class UserController
{
    public static function login(Request $request) {
        $user = $request->query('user_name');
        $password = $request->query('user_password');
        $model = new UserModel();
        $id = $model->login($user, $password);
        if (! $model->login($user, $password)) {
            Session::alert('Credenciales inválidas.', false);
            header('Location: /');
        } else {
            Session::alert('Sesion iniciada.', true);
            Session::set('user_id', $id);
            // TODO: mandar a la misma ruta actual
            header('Location: /');
        }
    }

    public static function logout (Request $request) {
        Session::alert('Sesión cerrada.', true);
        Session::unset('user_id');
        // TODO: mandar a la misma ruta actual
        header('Location: /');
    }

    public static function register(Request $request) {
        if ($request->getMethod() === 'GET') {
            $view = new View(['sidebar' => 'Sidebar_register', 'content' => 'Form_register'], 'user/register', 'Registrar');
            echo $view->render();
        } elseif ($request->getMethod() === 'POST') {
            # code...
        } else {
            echo "Metodo no manejado";
        }
    }
}