<?
namespace tienda\controller;
use tienda\core\Request;
use tienda\core\Response;
use tienda\core\Session;
use tienda\core\View;
use tienda\models\LoginModel;
use tienda\models\RegisterModel;

class UserController
{
    public function register(Request $request) {
        View::$content_model = new RegisterModel;
        View::$sidebar_model = new LoginModel;
        
        if ($request->getMethod() === 'GET') {
            return View::render('user/register');
        } else {
            View::$content_model->load($request->dump());
            if (View::$content_model->validate()) {
                // TODO: guardar $model->save()
                if (View::$content_model->save()) {
                    Session::alert('Usuario registrado.', true);
                    Response::redirect('/');
                } else {
                    Session::alert('Hubo un problema al registar el usuario.', false);
                    $view = View::render('user/register');
                }
            } else {
                Session::alert('Los datos introducidos no son válidos', false);
                $view = View::render('user/register');
            }
            return $view;
        }
    }

    // TODO: public function login(Request $request) {}
}