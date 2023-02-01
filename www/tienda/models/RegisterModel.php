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
        $this->field_config = $this->getRules();
        $this->model_status = false;
    }

    public function register() {
        if ($this->model_status) {
            $this->domain = new User;
            $this->domain->setName($this->user_name);
            $this->domain->setEmail($this->user_email);
            $this->domain->setAddress($this->user_address);
            $this->domain->setPassword($this->user_password);
            return $this->domain->save();
        }
        return false;
    }

    private function getRules () {
        $rules = [
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
        return $rules;
    }
}