<?
namespace tienda\controller;
use tienda\core\Request;
use tienda\core\Response;
use tienda\core\Session;
use tienda\models\ViewModel;

class UserController
{
    public static function showRegisterForm(ViewModel $model) {
        return $model;
    }

    public static function submitRegisterForm(ViewModel $model, Request $request) {
        if ($model->content_model->loadModel($request)) {
            if ($model->content_model->register()) {
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

    public static function submitLoginForm(ViewModel $model, Request $request) {
        if ($model->sidebar_model->loadModel($request)) {
            if ($model->sidebar_model->login()) {
                Session::alert('Login exitoso', true);
                Response::redirect('/');
            } else {
                Session::alert('Credenciales inválidas', false);
            }
        } else {
            Session::alert('La información ingresada es incorrecta.', false);
        }
        return $model;
    }
}