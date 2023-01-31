<?
namespace tienda\controller;
use tienda\core\Request;
use tienda\core\Session;
use tienda\core\View;
use tienda\models\RegisterModel;

class UserController
{
    public function register(Request $request) {
        if ($request->getMethod() === 'GET') {
            return View::render('user/register');
        } else {
            $model = new RegisterModel;
            $model->load($request->dump());
            if ($model->validate()) {
                // TODO: guardar
                Session::alert('Datos validados', true);
                $view = View::render('user/register', $model);
            } else {
                Session::alert('Los datos introducidos no son válidos', false);
                $view = View::render('user/register', $model);
            }
            return $view;
        }
    }

    // TODO: public function login(Request $request) {}
}