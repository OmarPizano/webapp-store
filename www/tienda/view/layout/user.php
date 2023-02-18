<?
use tienda\core\Session;
use tienda\core\ui\Button;
use tienda\core\ui\UserInfo;

$id = Session::get('user_id');
if ($id) {
    $user = $model->getUserByID($id);
    UserInfo::actionsCart('/user/cart', 'Carrito', '/logout', 'Salir');
    UserInfo::userInfo('/user/profile', $user->user_image, $user->user_name);
} else {
    Button::login('/login', 'Iniciar Sesión');
    Button::signup('/signup', 'Registrarse');
}