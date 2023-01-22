<?
namespace tienda\core;

class View
{
    public static function render(string $view, array $data = []) {
        // cargar layout y sus componentes
        $layout = self::getView('layout/layout');
        $menu = self::getView('layout/menu');
        $sidebar = self::getView('layout/sidebar');
        $footer = self::getView('layout/footer');
        // cargar el contenido
        $content = self::getView($view, $data);
        // integrar el contenido del layout
        $layout = str_replace("{TITLE}", APP_TITLE, $layout);
        $layout = str_replace("{MENU}", $menu, $layout);
        $layout = str_replace("{USER}", $sidebar, $layout);
        $layout = str_replace("{CONTENT}", $content, $layout);
        $layout = str_replace("{FOOTER}", $footer, $layout);
        return $layout;
    }

    private static function getView(string $path, array $data = []) {
        extract($data);
        ob_start();
        require_once(BASE_DIR . '/tienda/view/' . $path . '.php');
        return ob_get_clean();
    }
}