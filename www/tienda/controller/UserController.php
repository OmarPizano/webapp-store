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
    public function register(Request $request)
    {
        View::$content_model = new RegisterModel;
        View::$sidebar_model = new LoginModel;

        if ($request->getMethod() === 'GET') {
            // mostrar el formulario
            $view = View::render('user/register');
        } else {
            // capturar y validar entrada
            if (View::$content_model->loadModel($request->dump())) {
                if (View::$content_model->register()) {
                    Session::alert('Usuario registrado', true);
                    Response::redirect('/');
                } else {
                    Session::alert('Hubo un problema al registrar el usuario. Inténtalo de nuevo.', false);
                    $view = View::render('user/register');
                }
            } else {
                Session::alert('Los datos introducidos no son válidos', false);
                $view = View::render('user/register');
            }
        }
        return $view;
    }
}