<?
namespace tienda\domain;
use tienda\core\ActiveRecord;

class User extends ActiveRecord
{
    protected static string $primary_key = 'id';
    protected static string $table_name = 'users';
    protected static array $table_columns = [
        'id',
        'user_name',
        'user_email',
        'user_password',
        'user_role',
        'user_image',
        'user_address'
    ];

    protected string $id;
    protected string $user_name;
    protected string $user_email;
    protected string $user_password;
    protected string $user_role;
    protected string $user_image;
    protected string $user_address;

    public function __construct() {
        // Valores por defecto (RegisterModel)
        $this->setID();
        $this->setrole(false);
        $this->setImage('/logo.png');
    }

    public function setName(string $username) {
        $this->user_name = strtolower($username);
    }
    public function setEmail(string $email) {
        $this->user_email = strtolower($email);
    }
    public function setPassword(string $password) {
        $this->user_password = password_hash($password, PASSWORD_BCRYPT);
    }
    public function setRole(bool $admin) {
        $this->user_role = ($admin) ? 'admin' : 'client';
    }
    public function setImage(string $path) {
        $this->user_image = $path;
    }
    public function setAddress(string $address) {
        $this->user_address = $address;
    } 
    public function getName() {
        return $this->user_name;
    }
    public function getEmail() {
        return $this->user_email;
    }
    public function getPassword() {
        return $this->user_password;
    }
    public function getRole() {
        return $this->user_role;
    }
    public function getImage() {
        return $this->user_image;
    }
    public function getAddress() {
        return $this->user_address;
    }
}