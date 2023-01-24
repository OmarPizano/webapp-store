<?
namespace tienda\core;

class Request
{
    private array $get;
    private array $post;
    private string $method;
    private string $path;

    public function __construct() {
        $this->method = $_SERVER['REQUEST_METHOD'] ?? false;
        $this->path = $this->getPath2();
        $this->post = $this->getBody('POST');
        $this->get = $this->getBody('GET');
    }

    // TODO: combinar esta función con getBody()
    /**
     * Agrega parámetros al request actual.
     * Se agregan a POST o GET dependiendo del Request actual.
     */
    public function setParams(array $params) {
        if ($this->method === 'GET') {
            foreach ($params as $key => $value) {
                $this->get[$key] = filter_var($value, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        if ($this->method === 'POST') {
            foreach ($params as $key => $value) {
                $this->post[$key] = filter_var($value, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
    }

    /**
     * Obtiene un parámetro de GET.
     * Si no existe, asigna uno por defecto.
     */
    public function query(string $key, mixed $default = null) {
        return $this->get[$key] ?? $default;
    }
    
    /**
     * Obtiene un parámetro de POST.
     * Si no existe, asigna uno por defecto.
     */
    public function input(string $key, mixed $default = null) {
        return $this->post[$key] ?? $default;
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
    private function getPath2() {
        $path = $_SERVER['REQUEST_URI'] ?? false;
        if ($path === false) {
            return '/';
        } else {
            $pos = strpos($path, '?');
            return ($pos === false) ? $path : substr($path, 0, $pos);
        }
    }

    /**
     * Sanitiza los GET ó POST para inicializarlos.
     */
    private function getBody(string $method) {
        $body = [];
        if ($method === 'GET') {
            foreach ($_GET as $key => $value) {
                $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        if ($method === 'POST') {
            foreach ($_POST as $key => $value) {
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        return $body;
    }
}
