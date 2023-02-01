<h1>Iniciar Sesión</h1>
<?
use tienda\core\ui\Button;
use tienda\core\ui\Form;
use tienda\core\View;

Form::begin(BASE_URL, 'POST');
foreach (View::$sidebar_model->getFieldNames() as $field) {
    Form::input(
        View::$sidebar_model->getFieldFormType($field),
        $field,
        View::$sidebar_model->{$field},
        View::$sidebar_model->getFieldDescription($field) ?? '',
        View::$sidebar_model->getFieldHtmlParams($field) ?? '',
        View::$sidebar_model->getFirstError($field) ?? ''
    );
}
Form::submit('Entrar');
Form::end();
Button::normal(BASE_URL, 'Registrarse');