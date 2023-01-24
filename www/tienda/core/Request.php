<?
namespace tienda\core;

class Request
{
    private array $params;
    private string $method;
    private string $path;

    public function __construct() {
        $this->method = $_SERVER['REQUEST_METHOD'] ?? false;
        $this->path = $this->setPath();
        $this->params = $this->getParams($this->method);
    }

    /**
     * Agrega parámetros al request actual.
     * Se agregan a POST o GET dependiendo del Request actual.
     */
    public function setParams(array $params) {
        foreach ($params as $key => $value) {
            $this->params[$key] = filter_var($value, FILTER_SANITIZE_SPECIAL_CHARS);
        }
    }

    /**
     * Obtiene un parámetro de GET.
     * Si no existe, asigna uno por defecto.
     */
    public function query(string $key, mixed $default = null) {
        return $this->params[$key] ?? $default;
    }
    
    /**
     * Obtiene el método de la petición actual.
     * Si por alguna razón no existe, retorna false.
     */
    public function getMethod() {
        return $this->method;
    }

    /**
     * Obtiene la ruta de la petición actual sin los parametros GET.
     */
    public function getPath() {
        return $this->path;
    }

    /**
     * Genera el path a partir de $_SERVER sin los parámetros GET.
     */
    private function setPath() {
        $path = $_SERVER['REQUEST_URI'] ?? false;
        if ($path === false) {
            return '/';
        }
        $pos = strpos($path, '?');
        return ($pos === false) ? $path : substr($path, 0, $pos);
    }

    /**
     * Retorna los parámetros sanitizados de GET o POST dependiendo de la petición.
     */
    private function getParams(string $method) {
        $params = [];
        $config = ['GET' => [$_GET, INPUT_GET], 'POST' => [$_POST, INPUT_POST]];
        foreach ($config[$method][0] as $key => $value) {
            $params[$key] = filter_input($config[$method][1], $key, FILTER_SANITIZE_SPECIAL_CHARS);
        }
        return $params;
    }
}
