<?
use tienda\core\Session;
use tienda\core\ui\Button;
use tienda\core\ui\UserInfo;

$id = Session::get('user_id');
if ($id) {
    $user = $model->getUserByID($id);
    if (Session::get('admin')) {
        UserInfo::userActions('/ops', 'Operaciones', '/logout', 'Salir');
    } else {
        UserInfo::userActions('/cart', 'Carrito', '/logout', 'Salir');
    }
    UserInfo::userInfo('/profile', ASSET_URL . $user->user_image, $user->user_name);
} else {
    Button::login('/login', 'Iniciar Sesión');
    Button::signup('/signup', 'Registrarse');
}