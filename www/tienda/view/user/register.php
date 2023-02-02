<h1>Nuevo Usuario</h1>
<?
use tienda\core\ui\Form;
use tienda\core\ui\UiHelper;

UiHelper::checkAlert();

$content = $model->content_model;

Form::begin(BASE_URL . '/register', 'POST');
foreach ($content->getFieldNames() as $field) {
    Form::input(
        $content->getFieldFormType($field),
        $field,
        $content->domain->{$field},
        $content->getFieldDescription($field) ?? '',
        $content->getFieldHtmlParams($field) ?? '',
        $content->getFirstError($field) ?? ''
    );
}
Form::submit('Enviar', 'register_submit');
Form::end();