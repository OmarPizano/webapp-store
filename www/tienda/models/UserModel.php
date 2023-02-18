<?
namespace tienda\models;
use tienda\domain\User;

class UserModel
{ 
    public function login(string $user_name, string $user_password) {
        $users = User::all();
        foreach ($users as $u) {
            if (strcmp($user_name, $u->user_name) === 0) {
                if (password_verify($user_password, $u->user_password)) {
                    return $u->id;
                } else {
                    return false;
                }
            }
        }
        return false;
    }
}