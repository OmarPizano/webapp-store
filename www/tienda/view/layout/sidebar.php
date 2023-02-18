<h1>Iniciar Sesión</h1>
<?
use tienda\core\Session;
use tienda\core\ui\Button;
use tienda\core\ui\Form;

if (! Session::get('user_id')) {
    Form::begin(BASE_URL . '/login', 'POST');
    Form::input('text', 'user_name',  $model->user_name, 'Nombre de usuario', 'required', '');
    Form::input('password', 'user_password', $model->user_password, 'Contraseña', 'required', '');
    // Form::input('text', 'user_name', '', 'Nombre de usuario', 'required', '');
    // Form::input('password', 'user_password', '', 'Contraseña', 'required', '');
    Form::submit('Entrar', 'login_submit');
    Form::end();
    Button::normal(BASE_URL . '/register', 'Registrarse');
} else {
    // TODO: mostrar informacion de usuario
    Button::normal(BASE_URL . '/logout', 'Cerrar sesión');
}