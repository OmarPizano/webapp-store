<?
namespace tienda\controller;
use tienda\core\Request;
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
                Session::alert('Datos validados', true);
                $view = View::render('user/register');
            } else {
                Session::alert('Los datos introducidos no son válidos', false);
                $view = View::render('user/register');
            }
            return $view;
        }
    }

    // TODO: public function login(Request $request) {}
}