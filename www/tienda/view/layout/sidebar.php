<h1>Iniciar Sesión</h1>
<?
use tienda\core\ui\Button;
use tienda\core\ui\Form;

Form::begin(BASE_URL . '/login', 'POST');

$sidebar = $model->sidebar_model;

foreach ($sidebar->getFieldNames() as $field) {
    if ($field === 'user_name' or $field === 'user_password') {
        Form::input(
            $sidebar->getFieldFormType($field),
            $field,
            $sidebar->domain->{$field},
            $sidebar->getFieldDescription($field) ?? '',
            $sidebar->getFieldHtmlParams($field) ?? '',
            $sidebar->getFirstError($field) ?? ''
        );
    }
}
Form::submit('Entrar', 'login_submit');
Form::end();
Button::normal(BASE_URL . '/register', 'Registrarse');