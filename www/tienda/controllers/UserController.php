<?
namespace tienda\controllers;

class UserController
{
    public function index()
    {
        echo 'UserController -> index()<br>';
    }
    public function register()
    {
        require_once('../tienda/views/user/register.php');
    }
    public function save()
    {
        if (isset($_POST)) {
            var_dump($_POST);
        }
    }

}