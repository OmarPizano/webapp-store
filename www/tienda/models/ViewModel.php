<?
namespace tienda\models;

class ViewModel
{
    public $sidebar_model;
    public $content_model;

    public function __construct($model) {
        $this->sidebar_model = new UserModel;
        $this->content_model = $model;
    }
}