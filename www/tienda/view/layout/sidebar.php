<h1>Iniciar Sesión</h1>
<?
use tienda\core\ui\Button;
use tienda\core\ui\Form;

Form::begin(BASE_URL, 'POST');

foreach ($model->getFieldNames() as $field) {
    if ($field === 'user_name' or $field === 'user_password') {
        Form::input(
            $model->getFieldFormType($field),
            $field,
            $model->domain->{$field},
            $model->getFieldDescription($field) ?? '',
            $model->getFieldHtmlParams($field) ?? '',
            $model->getFirstError($field) ?? ''
        );
    }
}
Form::submit('Entrar');
Form::end();
Button::normal(BASE_URL, 'Registrarse');