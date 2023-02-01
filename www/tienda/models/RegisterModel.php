<?
namespace tienda\models;
use tienda\core\Model;

class RegisterModel extends Model
{
    public string $user_name = '';
    public string $user_email = '';
    public string $user_address = '';
    public string $user_password = '';
    public string $user_password2 = '';

    public function __construct()
    {
        parent::__construct(); 
        $this->entity_name = 'users';
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
}