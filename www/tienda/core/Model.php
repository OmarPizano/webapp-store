<?
namespace tienda\core;
use tienda\models\LoginModel;

abstract class Model
{
    public LoginModel $login_model;

    public function __construct() {
        $this->login_model = new LoginModel;
    }

    public function load(): bool {
        // TODO:
    }
    protected function validate(): bool {
        // TODO:
    }
}