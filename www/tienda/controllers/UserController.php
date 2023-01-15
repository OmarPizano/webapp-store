<?
namespace tienda\controllers;
use tienda\models\RegisterModel;

class UserController
{
    public function register()
    {
        require_once('../tienda/views/user/register.php');
    }
    public function save()
    {
        $model = new RegisterModel;
        $model->load($_POST);
        $model->save();
    }
}