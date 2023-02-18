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
        if (Session::get('user_id')) {
            Response::redirect('/');
        }
        $model = new UserModel();
        if ($request->getMethod() === 'POST') {
            $model->load($request->dump());
            $id = $model->login();
            if ($id) {
                Session::alert('Sesion iniciada correctamente.', true);
                Session::set('user_id', $id);
                Session::set('admin', $model->isAdmin($id));
                Response::redirect('/');
            } else {
                Session::alert('Credenciales inválidas.', false);
            }
        }
        return new View($model, 'user/login', 'Iniciar sesión');
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
        if (Session::get('user_id')) {
            Response::redirect('/');
        }
        $model = new UserModel();
        if ($request->getMethod() === 'POST') {
            $model->load($request->dump());
            if ($model->signup()) {
                Session::alert('Usuario registrado correctamente.', true);
                Response::redirect('/');
            } else {
                Session::alert('Fallo al registrar el usuario. Intente de nuevo.', false);
            }
        }
        return new View($model, 'user/signup', 'Registro de Usuario');
    }
}