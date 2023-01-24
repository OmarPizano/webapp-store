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

    public static function resolve(Request $request) {
        $callback = self::getCallback($request);
        if ($callback === false) {
            $view = View::render('info/not_found');
            (new Response($view, 404))->send();
        } else {
            $view = call_user_func($callback, $request);
            (new Response($view, 200))->send();
        }
    }

    private static function getCallback(Request $request) {
        // ver si la ruta solicitada es simple (sin parámetros)
        $callback = self::$routes[$request->getMethod()][$request->getPath()] ?? false;
        // si la encuentra, la retorna...
        if ($callback != false) {
            return $callback;
        }
        // ... de lo contrario, ver si se trata de una ruta con parámetros
        $path = trim($request->getPath(), '/');
        // obtener todas las rutas del mismo método que el de la petición
        $routes = self::$routes[$request->getMethod()];
        // recorrer los pares RUTA => callback
        foreach ($routes as $route => $callback) {
            $route = trim($route, '/');
            if (!$route) {
                continue;   // saltar si la ruta es '/'
            }
            // usar un regex para encontrar los identificadores de la ruta ACTUAL
            // p. ej. /user/{id}/{mode} -> ['id', 'mode']
            $routeKeys = [];
            if (preg_match_all('/(?<={).+?(?=})/', $route, $matches)) {
                $routeKeys = $matches[0];
            }
            // crear un regex a partir de la ruta actual
            // p. ej. /user/{id} -> @^/user/(.+?)$@
            $routeRegex = '@^' . preg_replace('/\{.+?\}/', '(.+?)' ,$route) . '$@';
            // ver si la ruta del request ($path) hace match con el regex de la ruta ACTUAL
            if (preg_match_all($routeRegex, $path, $valueMatches)) {
                // guardar todos VALORES de la ruta del request
                // p. ej. /user/{id}/{mode} -> /user/1sf0b6/mobile -> $values = ['1sf0b6', 'mobile'];
                $values = [];
                for ($i = 1; $i < count($valueMatches); $i++) {
                    $values[] = $valueMatches[$i][0];
                }
                // combinar los identificadores con los valores encontrados
                // p. ej. /user/{id}/{mode} -> /user/1sf0b6/mobile -> $params = ['id' => '1sf0b6', 'mode' => 'mobile'];
                $params = array_combine($routeKeys, $values);
                // agregar los parametros al Request actual y regresar el callback
                // de la ruta que hizo match
                $request->setParams($params);
                return $callback;
            }
        }
        // .. o de lo contrario no existe la ruta en absoluto
        return false;
    }
}