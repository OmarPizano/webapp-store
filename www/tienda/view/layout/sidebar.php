<h1>Iniciar Sesión</h1>
<?
use tienda\core\ui\Button;
use tienda\core\ui\Form;

Form::begin(BASE_URL, 'POST');

$m = $model->login_model;

foreach ($m->getFieldNames() as $field) {
        Form::input(
            $m->getFieldFormType($field),
            $field,
            $m->{$field},
            $m->getFieldDescription($field) ?? '',
            $m->getFieldHtmlParams($field) ?? '',
            $m->getFirstError($field) ?? ''
        );
}
Form::submit('Entrar');
Form::end();
Button::normal(BASE_URL, 'Registrarse');