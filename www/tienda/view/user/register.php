<h1>Nuevo Usuario</h1>
<?
use tienda\core\ui\Form;
use tienda\core\ui\UiHelper;

UiHelper::checkAlert();

Form::begin(BASE_URL . '/register', 'POST');
foreach ($model->getFieldNames() as $field) {
    Form::input(
        $model->getFieldFormType($field),
        $field,
        $model->domain->{$field},
        $model->getFieldDescription($field) ?? '',
        $model->getFieldHtmlParams($field) ?? '',
        $model->getFirstError($field) ?? ''
    );
}
Form::submit('Enviar');
Form::end();