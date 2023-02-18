<?
namespace tienda\core;

class Router
{
    public static array $routes = [];

    public static function get(string $route, array $controller) {
        self::$routes['GET'][$route] = $controller;
    }

    public static function post(string $route, array $controller) {
        self::$routes['POST'][$route] = $controller;
    }

    public static function resolve(Request $request) {
        $callback = self::getCallback($request);
        if ($callback === false) {
            // TODO: considerar casos para cuando el sidebar cambia
            // $view = View::render('info/not_found');
            $view = 'Resource not found.';
            (new Response($view, 404))->send();
        } else {
            // ejecutar la acción del controlador (regresa vista)
            $view = call_user_func([$callback[0], $callback[1]], $request);
            // enviar el response con la vista renderizada
            (new Response($view->render(), 200))->send();
        }
    }

    private static function getCallback(Request $request) : array | bool {
        // buscar ruta simple
        $callback = self::$routes[$request->getMethod()][$request->getPath()] ?? false;
        if ($callback != false) {
            return $callback;
        }
        // buscar una ruta con parámetros
        $path = trim($request->getPath(), '/');
        $routes = self::$routes[$request->getMethod()];
        foreach ($routes as $route => $callback) {
            $route = trim($route, '/');
            if (!$route) {
                continue;   // saltar si la ruta es '/'
            }
            // usar un regex para encontrar los identificadores de la ruta ACTUAL
            $routeKeys = [];
            if (preg_match_all('/(?<={).+?(?=})/', $route, $matches)) {
                $routeKeys = $matches[0];
            }
            // crear un regex a partir de la ruta actual
            $routeRegex = '@^' . preg_replace('/\{.+?\}/', '(.+?)' ,$route) . '$@';
            // ver si la ruta del request ($path) hace match con el regex de la ruta ACTUAL
            if (preg_match_all($routeRegex, $path, $valueMatches)) {
                // guardar los VALORES de la ruta del request
                $values = [];
                for ($i = 1; $i < count($valueMatches); $i++) {
                    $values[] = $valueMatches[$i][0];
                }
                // combinar los identificadores con los valores encontrados
                $params = array_combine($routeKeys, $values);
                // agregar los parametros al Request y regresar el callback
                $request->setParams($params);
                return $callback;
            }
        }
        // .. o de lo contrario no existe la ruta en absoluto
        return false;
    }
}