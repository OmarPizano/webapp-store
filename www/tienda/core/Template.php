<?
namespace tienda\core;

class Template
{
    private string $layout;
    private string $template_path;

    public function __construct(string $template_path) {
        $this->layout = $this->loadTemplate('layout/layout');
        $this->template_path = $template_path;
    }

    public function setTitle(string $title) {
        $this->layout = str_replace("{VIEW_TITLE}", $title, $this->layout);
        $title = (empty($title)) ? APP_TITLE : APP_TITLE . ' | ' . $title;
        $this->layout = str_replace("{TITLE}", $title, $this->layout);
    }

    public function loadMenu($model) {
        $menu = $this->loadTemplate('layout/menu', $model);
        $this->layout = str_replace("{MENU}", $menu, $this->layout);
    }

    public function loadFooter() {
        $footer = $this->loadTemplate('layout/footer');
        $this->layout = str_replace("{FOOTER}", $footer, $this->layout);
    }

    public function loadUser($model) {
        $content = $this->loadTemplate('layout/user', $model);
        $this->layout = str_replace("{USER}", $content, $this->layout);
    }

    public function loadContent($model) {
        $content = $this->loadTemplate($this->template_path, $model);
        $this->layout = str_replace("{CONTENT}", $content, $this->layout);
    }

    public function getView() {
        return $this->layout;
    }

    private function loadTemplate(string $path, $model = false) {
        extract(['model' => $model]);
        ob_start();
        require_once(BASE_DIR . '/tienda/view/' . $path . '.php');
        return ob_get_clean();
    }
}