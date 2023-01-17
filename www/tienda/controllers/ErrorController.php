<?
namespace tienda\controllers;
use tienda\core\View;

class ErrorController
{
    public function notFound()
    {
        View::render('error/404');
    }
}