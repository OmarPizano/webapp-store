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

}