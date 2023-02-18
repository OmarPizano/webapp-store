<?
namespace tienda\controller;
use tienda\core\Request;
use tienda\core\Response;
use tienda\core\Session;
use tienda\core\View;
use tienda\models\UserModel;

class UserController
{
    public static function login(Request $request) {
        $model = new UserModel();
        if ($request->getMethod() === 'GET') {
            $view = new View($model, 'user/login', 'Iniciar sesión');
            return $view->render(); 
        } elseif ($request->getMethod() === 'POST') {
            $model->load($request->dump());
            $id = $model->login();
            if ($id) {
                Session::alert('Sesion iniciada correctamente.', true);
                Session::set('user_id', $id);
                Response::redirect('/');
            } else {
                Session::alert('Credenciales inválidas.', false);
                $view = new View($model, 'user/login', 'Iniciar sesión');
                return $view->render(); 
            }
        }
    }

    public static function logout (Request $request) {
        if (Session::get('user_id')) {
            Session::alert('Sesión cerrada.', true);
            Session::unset('user_id');
            // Session::stop();  // TODO: implementar
        }
        Response::redirect('/');
    }

    public static function signup(Request $request) {
        $model = new UserModel();
        if ($request->getMethod() === 'GET') {
            $view = new View($model, 'user/signup', 'Registro de Usuario');
            return $view->render();
        } elseif ($request->getMethod() === 'POST') {
            $model->load($request->dump());
            if ($model->signup()) {
                Session::alert('Usuario registrado correctamente.', true);
                Response::redirect('/');
            } else {
                Session::alert('Fallo al registrar el usuario. Intente de nuevo.', false);
                $view = new View($model, 'user/signup', 'Registro de Usuario');
                return $view->render();
            }
        }
    }
}