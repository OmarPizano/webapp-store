<h1>Nuevo Usuario</h1>
<?
use tienda\core\ui\Form;

Form::begin(BASE_URL . '/register', 'POST');
Form::input('text', 'name', '', 'Nombre de usuario', 'required autofocus');
Form::input('email', 'email', '', 'Correo electrónico', 'required');
Form::input('text', 'address', '', 'Domicilio completo', 'required');
Form::input('password', 'password', '', 'Contraseña', 'required');
Form::input('password', 'password2', '', 'Verificar contraseña', 'required');
Form::submit('Enviar');
Form::end();