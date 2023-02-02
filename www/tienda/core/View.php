<?
namespace tienda\core;
use tienda\models\ViewModel;

class View
{
    public ViewModel $model;

    public function __construct(ViewModel $model) {
        $this->model = $model;
    }

    public function render(string $view) : string {
        // cargar layout y sus componentes
        $layout = self::getView('layout/layout');
        $menu = self::getView('layout/menu');
        $sidebar = self::getView('layout/sidebar');
        $footer = self::getView('layout/footer');
        // cargar el contenido
        $content = self::getView($view);
        // integrar el contenido del layout
        $layout = str_replace("{TITLE}", APP_TITLE, $layout);
        $layout = str_replace("{MENU}", $menu, $layout);
        $layout = str_replace("{USER}", $sidebar, $layout);
        $layout = str_replace("{CONTENT}", $content, $layout);
        $layout = str_replace("{FOOTER}", $footer, $layout);
        return $layout;
    }

    private function getView(string $path) : string {
        extract(['model' => $this->model]);
        ob_start();
        require_once(BASE_DIR . '/tienda/view/' . $path . '.php');
        return ob_get_clean();
    }
}