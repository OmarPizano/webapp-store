<?
namespace tienda\core;

class View
{
    private $view_data;
    private Template $template;
    private string $view_title;
    
    public function __construct($view_data, string $template_path, string $view_title = '') {
        $this->view_data = $view_data;
        $this->template = new Template($template_path);
        $this->view_title = $view_title;
    }

    public function render() {
        $this->template->setTitle($this->view_title);
        $this->template->loadMenu();
        $this->template->loadSidebar($this->view_data['sidebar']);
        $this->template->loadContent($this->view_data['content']);
        $this->template->loadFooter();
        return $this->template->getView();
    }
}