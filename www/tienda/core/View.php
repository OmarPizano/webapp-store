<?
namespace tienda\core;
use tienda\models\UserModel;

class View
{
    private $model;
    private Template $template;
    private string $view_title;
    
    public function __construct($model, string $template_path, string $view_title = '') {
        $this->model = $model;
        $this->template = new Template($template_path);
        $this->view_title = $view_title;
    }

    public function render() {
        $this->template->setTitle($this->view_title);
        $this->template->loadMenu();
        $this->template->loadUser(new UserModel);
        $this->template->loadContent($this->model);
        $this->template->loadFooter();
        return $this->template->getView();
    }
}