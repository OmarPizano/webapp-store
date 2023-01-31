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
        $this->validation_rules = [
            'user_name' => [['required'], ['unique'], ['length', 1, 20]],
            'user_email' => [['required'], ['unique'], ['email']],
            'user_address' => [['required'], ['length', 20, 100]],
            'user_password' => [['required'], ['length', 8, 30]],
            'user_password2' => [['required'], ['same', 'user_password']]
        ];
        $this->entity_name = 'users';
    }     
}