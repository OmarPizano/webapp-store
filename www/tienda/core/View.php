<?
namespace tienda\core;
use tienda\models\UserModel;

class View
{
    public Model $model;
    public UserModel $user_model;

    public function __construct(Model $model) {
        $this->model = $model;
        $this->user_model = new UserModel;
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
        ob_start();
        extract(['model' => $this->model, 'user' => $this->user_model]);
        require_once(BASE_DIR . '/tienda/view/' . $path . '.php');
        return ob_get_clean();
    }
}