<h1>Iniciar Sesión</h1>
<?
use tienda\core\ui\Button;
use tienda\core\ui\Form;

Form::begin(BASE_URL, 'POST');
// Form::input('email', 'email', '', 'Ingresa tu email', 'required');
// Form::input('password', 'password', '', 'Ingresa tu contraseña', 'required');
Form::submit('Entrar');
Form::end();
Button::normal(BASE_URL, 'Registrarse');