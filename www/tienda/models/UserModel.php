<?
namespace tienda\models;
use tienda\domain\User;

class UserModel
{
    public string $user_name = '';
    public string $user_password = '';

    public function load(array $request_dump) {
        // TODO: validar
        $this->user_name = $request_dump['user_name'] ?? '';
        $this->user_password = $request_dump['user_password'] ?? '';
    }

    public function login() {
        $users = User::all();
        foreach ($users as $u) {
            if (strcmp($this->user_name, $u->user_name) === 0) {
                if (password_verify($this->user_password, $u->user_password)) {
                    return $u->id;
                } else {
                    return false;
                }
            }
        }
        return false;
    }
}