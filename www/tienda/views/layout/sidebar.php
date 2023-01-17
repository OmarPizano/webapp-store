<?
use tienda\core\ui\button\Button;
use tienda\core\ui\form\Form;
use tienda\core\ui\layout\Sidebar;

Sidebar::begin('Iniciar sesión');
Form::begin('#', 'POST');
Form::input('email', 'email', 'Ingresa tu email');
Form::input('password', 'password', 'Ingresa tu contraseña');
Form::submit('Entrar');
Button::normal(BASE_URL . '/user/register', 'Registrar');
Form::end();
Sidebar::end();