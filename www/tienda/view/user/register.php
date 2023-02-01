<h1>Nuevo Usuario</h1>
<?
use tienda\core\ui\Form;
use tienda\core\ui\UiHelper;
use tienda\core\View;

UiHelper::checkAlert();

Form::begin(BASE_URL . '/register', 'POST');
foreach (View::$content_model->getFieldNames() as $field) {
    Form::input(
        View::$content_model->getFieldFormType($field),
        $field,
        View::$content_model->{$field},
        View::$content_model->getFieldDescription($field) ?? '',
        View::$content_model->getFieldHtmlParams($field) ?? '',
        View::$content_model->getFirstError($field) ?? ''
    );
}
Form::submit('Enviar');
Form::end();