<?
namespace tienda\controllers;
use tienda\core\View;
use tienda\models\RegisterModel;

class UserController
{
    public function register()
    {
        View::render('user/register');
    }
    public function save()
    {
        $model = new RegisterModel;
        $model->load($_POST);
        $model->save();
    }
}