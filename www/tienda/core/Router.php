<?
namespace tienda\core;

class Router
{
    public static array $routes = [];

    public static function get(string $route, callable $callback) {
        self::$routes['GET'][$route] = $callback;
    }

    public static function post(string $route, callable $callback) {
        self::$routes['POST'][$route] = $callback;
    }

    public static function resolve() {
        $request = new Request;
        $path = $request->getPath();
        $method = $request->getMethod();
        $callback = self::$routes[$method][$path] ?? false;
        if ($callback === false) {
            $view = View::render('info/not_found');
            (new Response($view, 404))->send();
        } else {
            $view = call_user_func($callback, $request);
            (new Response($view, 200))->send();
        }
    }
}