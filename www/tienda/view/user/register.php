<h1>Nuevo Usuario</h1>
<?
use tienda\core\ui\Form;
use tienda\core\ui\UiHelper;

UiHelper::checkAlert();

Form::begin(BASE_URL . '/register', 'POST');
Form::input('text', 'user_name', $model->user_name ?? '', 'Nombre de usuario', 'required autofocus', $model->errors['user_name'][0] ?? '');
Form::input('email', 'user_email', $model->user_email ?? '', 'Correo electrónico', 'required', $model->errors['user_email'][0] ?? '');
Form::input('text', 'user_address', $model->user_address ?? '', 'Domicilio completo', 'required', $model->errors['user_address'][0] ?? '');
Form::input('password', 'user_password', $model->user_password ?? '', 'Contraseña', 'required', $model->errors['user_password'][0] ?? '');
Form::input('password', 'user_password2', $model->user_password2 ?? '', 'Verificar contraseña', 'required', $model->errors['user_password2'][0] ?? '');
Form::submit('Enviar');
Form::end();