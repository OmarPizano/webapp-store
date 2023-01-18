<?
namespace tienda\core;

class Response
{
    private string $content;
    private int $status;

    public function __construct(string $content = '', int $status = 200) {
        $this->content = $content;
        $this->status = $status;
    }

    /**
     * Envía la petición.
     * Primero envía los headers predeterminados.
     */
    public function send() {
        header('Content-Type: text/html; charset=utf-8', true, $this->status);
        echo $this->content;
    }

    /**
     * Envía el header 'Location: URL'.  
     */
    public static function redirect(string $url) {
        header('Location: ' . $url);
    }
}