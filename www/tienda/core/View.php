<?php
namespace tienda\core;
use tienda\domain\User;
use tienda\models\CategoriesModel;

class View
{
    private $data;
    private Template $template;
    private string $view_title;
    
    public function __construct($data, string $template_path, string $view_title = '') {
        $this->data = $data;
        $this->template = new Template($template_path);
        $this->view_title = $view_title;
    }

    public function render() {
        $this->template->setTitle($this->view_title);
        $this->template->loadMenu($this->fetchMenuOps());
        $this->template->loadUser($this->fetchUserData());
        $this->template->loadContent($this->data);
        $this->template->loadFooter();
        return $this->template->getView();
    }

    private function fetchUserData() {
        $id = Session::get('user_id');
        if ($id) {
            $u = User::find($id);
            return [ 'id' => $id, 'user_name' => $u->user_name, 'user_image' => $u->user_image];
        } else {
            return ['id' => False];
        }
    }

    private function fetchMenuOps() {
        $admin = Session::get('admin');
        if ($admin) {
            return ['admin' => $admin];
        } else {
            $catmodel = new CategoriesModel();
            $catmodel->selectAll();
            $categories = $catmodel->getTop();
            return ['admin' => $admin, 'categories' => $categories];
        }
    }
}