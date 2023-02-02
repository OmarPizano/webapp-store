<?
namespace tienda\controller;
use tienda\core\Request;
use tienda\core\Session;
use tienda\models\UserModel;

class UserController
{
    public static function showRegisterForm(UserModel $model) {
        return $model;
    }

    public static function submitRegisterForm(UserModel $model, Request $request) {
        if ($model->loadModel($request)) {
            if ($model->register()) {
                Session::alert('Usuario registrado', true);
                Response::redirect('/');
            } else {
                Session::alert('No se pudo completar la operación. Inténtalo de nuevo', false);
            }
        } else {
            Session::alert('La información ingresada es incorrecta.', false);
        }
        return $model;
    }
}