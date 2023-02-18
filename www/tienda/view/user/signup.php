<h1>Nuevo Usuario</h1>
<?
use tienda\core\ui\Form;
use tienda\core\ui\UiHelper;

UiHelper::checkAlert();

Form::begin(BASE_URL . '/signup', 'POST', $model);
Form::input('text', 'user_name', 'Ingresa tu usuario', 'required autofocus');
Form::input('email', 'user_email', 'Ingresa tu email', 'required');
Form::input('text', 'user_address', 'Ingresa tu dirección', 'required');
Form::input('password', 'user_password', 'Ingresa tu contraseña', 'required');
Form::input('password', 'user_password2', 'Repite la contraseǹa', 'required');
Form::submit('Enviar', 'signup_submit');
Form::end();