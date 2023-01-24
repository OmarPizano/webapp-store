<?
namespace tienda\controller;
use tienda\core\Request;
use tienda\core\View;

class TestController
{
    public function hello(Request $request) {
        $name = $request->query('name', 'World');
        return View::render('test/hello', ['name' => $name]);
    }
}