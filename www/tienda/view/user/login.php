<h1>Nuevo Usuario</h1>
<?
use tienda\core\ui\Form;
use tienda\core\ui\UiHelper;

UiHelper::checkAlert();

Form::begin(BASE_URL . '/login', 'POST', $model);
Form::input('text', 'user_name', 'Ingresa tu usuario', 'required autofocus');
Form::input('password', 'user_password', 'Ingresa tu contraseña', 'required');
Form::submit('Acceder', 'login_submit');
Form::end();