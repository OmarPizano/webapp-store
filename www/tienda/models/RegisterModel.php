<?
namespace tienda\models;
use tienda\core\Model;

class RegisterModel extends Model
{
    public string $name = "";
    public string $email = "";
    public string $address = "";
    public string $password = "";
    public string $password2 = "";

    public function __construct()
    {
        parent::__construct(); 
        $this->validation_rules = [
            'name' => [['required'], ['unique'], ['length', 1, 20]],
            'email' => [['required'], ['unique'], ['email']],
            'address' => [['required'], ['length', 20, 100]],
            'password' => [['required'], ['length', 8, 30]],
            'password2' => [['required'], ['same', 'password']]
        ];
        $this->entity_name = 'users';
        $this->table_prefix = 'user';
    }     
}