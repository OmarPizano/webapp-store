<?
namespace tienda\controllers;

class ErrorController
{
    public function notFound()
    {
        require_once(BASE_DIR . '/tienda/views/error/404.php');
    }
}