<?
use tienda\core\Session;
use tienda\core\ui\Button;
use tienda\core\ui\UserInfo;

$id = Session::get('user_id');
if ($id) {
    $user = $model->getUserByID($id);
    Button::black('/logout', 'Salir');
    UserInfo::userInfo('/profile', ASSET_URL . $user->user_image, $user->user_name);
} else {
    Button::normal('/login', 'Iniciar Sesión');
    Button::black('/signup', 'Registrarse');
}