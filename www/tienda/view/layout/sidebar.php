<h1>Iniciar Sesión</h1>
<?
use tienda\core\ui\Button;
use tienda\core\ui\Form;

Form::begin(BASE_URL . '/login', 'POST');

foreach ($user->getFieldNames() as $field) {
    if ($field === 'user_name' or $field === 'user_password') {
        Form::input(
            $user->getFieldFormType($field),
            $field,
            $user->domain->{$field},
            $user->getFieldDescription($field) ?? '',
            $user->getFieldHtmlParams($field) ?? '',
            $user->getFirstError($field) ?? ''
        );
    }
}
Form::submit('Entrar');
Form::end();
Button::normal(BASE_URL . '/register', 'Registrarse');