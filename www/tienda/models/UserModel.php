<?
namespace tienda\models;
use tienda\core\Model;
use tienda\domain\User;

class UserModel extends Model
{
    public function __construct() {
        parent::__construct();
        $this->domain = new User;
        $this->field_config = $this->getRules();
        $this->entity_name = 'users';
    }

    public function register() {
        $this->domain->prepare();
        return $this->domain->save();
    }

    private function getRules () {
        return [
            'user_name' => [
                'rules' => [['required'], ['unique'], ['length', 3, 20]],
                'description' => 'Nombre de usuario',
                'form_type' => 'text',
                'html_params' => 'autofocus'
            ],
            'user_email' => [
                'rules' => [['required'], ['unique'], ['email']],
                'description' => 'Correo electrónico',
                'form_type' => 'email',
            ],
            'user_address' => [
                'rules' => [['required'], ['length', 20, 100]],
                'description' => 'Domicilio del comprador',
                'form_type' => 'text',
            ],
            'user_password' => [
                'rules' => [['required'], ['length', 8, 30]],
                'description' => 'Contraseña',
                'form_type' => 'password',
            ]
        ];
    }
}