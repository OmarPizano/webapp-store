<?php
namespace tienda\models;
use tienda\domain\User;

class UserModel
{
    public string $user_name = '';
    public string $user_password = '';
    public string $user_password2 = '';
    public string $user_address = '';
    public string $user_email = '';

    public function load(array $request_dump) {
        // TODO: validar
        $this->user_name = $request_dump['user_name'] ?? false;
        $this->user_password = $request_dump['user_password'] ?? false;
        $this->user_password2 = $request_dump['user_password2'] ?? false;
        $this->user_address = $request_dump['user_address'] ?? false;
        $this->user_email = $request_dump['user_email'] ?? false;
    }

    public function login() {
        $users = User::all();
        foreach ($users as $u) {
            if (strcmp($this->user_name, $u->user_name) === 0) {
                return password_verify($this->user_password, $u->user_password) ? $u->id: false;
            }
        }
        return false;
    }

    public function getUserByID(string $id) {
        return User::find($id);
    }

    public function isAdmin(string $id) {
        return (User::find($id)->user_role == 'admin') ? true: false;
    }

    public function signup() {
        $user = new User();
        $user->user_name = $this->user_name;
        $user->user_password = password_hash($this->user_password, PASSWORD_BCRYPT);
        $user->user_role = 'client';
        $user->user_address = $this->user_address;
        $user->user_email = $this->user_email;
        $user->user_image = '/default.png';
        return $user->save();
    }
}