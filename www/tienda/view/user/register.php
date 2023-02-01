<h1>Nuevo Usuario</h1>
<?
use tienda\core\ui\Form;
use tienda\core\ui\UiHelper;

UiHelper::checkAlert();

Form::begin(BASE_URL . '/register', 'POST');
Form::makeInputs($model);
Form::submit('Enviar');
Form::end();