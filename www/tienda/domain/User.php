<?php
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

    public string $id = '';
    public string $user_name = '';
    public string $user_email = '';
    public string $user_password = '';
    public string $user_role = '';
    public string $user_image = '';
    public string $user_address = '';

    public function __construct() {
        $this->setID();
    }

    public function prepare(){
        $this->user_name = strtolower($this->user_name);
        $this->user_email = strtolower($this->user_email);
        $this->user_password = password_hash($this->user_password, PASSWORD_BCRYPT);
        if ($this->user_role != 'admin' and $this->user_role != 'client') {
            $this->user_role = 'client';
        }
        $this->user_image = $this->user_image ?? '';
        $this->user_address = $this->user_address ?? '';
    }
}