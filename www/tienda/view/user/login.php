<h1>Nuevo Usuario</h1>
<?
use tienda\core\ui\Form;
use tienda\core\ui\UiHelper;

UiHelper::checkAlert();

Form::begin(BASE_URL . '/login', 'POST');
Form::input('text', 'user_name', $model->user_name, 'Ingresa tu usuario', 'required autofocus', '');
Form::input('password', 'user_password', $model->user_password, 'Ingresa tu contraseña', 'required', '');
Form::submit('Acceder', 'login_submit');
Form::end();