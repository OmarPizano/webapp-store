<?
namespace tienda\models;
use tienda\core\FormValidation;
use tienda\domain\User;

class RegisterModel extends FormValidation
{
    public string $user_name = '';
    public string $user_email = '';
    public string $user_address = '';
    public string $user_password = '';
    public string $user_password2 = '';

    private User $domain;

    protected string $entity_name = 'users';

    public function __construct()
    {
        $this->field_config = [
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
            ],
            'user_password2' => [
                'rules' => [['required'], ['password_verify', 'user_password']],
                'description' => 'Validar contraseña',
                'form_type' => 'password',
            ]
        ];
    }

    public function register() {
        $u = new User;
        $u->setID();
        $u->setUserName($this->user_name);
        $u->setEmail($this->user_email);
        $u->setPassword($this->user_password);
        $u->setAdminPrivs(false);
        $u->setImage('/logo.png');
        $u->setAddress($this->user_address);
        return $u->save();
    }
}