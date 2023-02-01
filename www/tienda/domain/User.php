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

    public function __construct(
        string $user_name,
        string $user_email,
        string $user_password,
        string $user_role,
        string $user_image,
        string $user_address
    ) {
        $this->setID();
        $this->user_name = $user_name;
        $this->user_email = $user_email;
        $this->user_password = password_hash($user_password, PASSWORD_BCRYPT);
        $this->user_role = $user_role;
        $this->user_image = $user_image;
        $this->user_address = $user_address;
    }
}