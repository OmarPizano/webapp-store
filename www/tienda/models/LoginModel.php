<?
namespace tienda\models;
use tienda\core\FormModel;

class LoginModel extends FormModel
{
    public string $user_name = '';
    public string $user_password = ''; 
    
    public function __construct()
    {
        parent::__construct(); 
        $this->entity_name = 'users';
        $this->field_config = [
            'user_name' => [
                'rules' => [['required']],
                'description' => 'Nombre de usuario',
                'form_type' => 'text',
            ],
            'user_password' => [
                'rules' => [['required']],
                'description' => 'Contraseña',
                'form_type' => 'password',
            ]
        ];
    }

    public function validate_credentials() {
        // TODO: validar las credenciales en DB
    }
}