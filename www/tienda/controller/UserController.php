<?
namespace tienda\controller;
use tienda\core\Request;
use tienda\core\View;

class UserController
{
    public function register(Request $request) {
        // TODO: si es GET, mostrar la vista; si es POST, guardar el usuario.
        if ($request->getMethod() === 'GET') {
            return View::render('user/register');
        } else {
            return 'Es POST';
        }
    }
}