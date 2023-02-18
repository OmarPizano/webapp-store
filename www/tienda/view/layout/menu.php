<?
use tienda\core\ui\Menu;

$model->selectAll();
$top = $model->getTop();

Menu::begin();
Menu::item(BASE_URL, 'Buscar');
foreach ($top as $category) {
    Menu::item(BASE_URL . '/product/cat/' . $category->id, $category->category_name);
}
Menu::item(BASE_URL, 'Acerca de');
Menu::end();