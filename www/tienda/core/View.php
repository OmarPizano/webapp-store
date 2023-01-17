<?
namespace tienda\core;
use tienda\core\ui\Header;
use tienda\core\ui\Layout;

abstract class View
{
    public static function render(string $view_file, array $view_data = array())
    {
        extract($view_data);
        // TODO: generar todos los componentes del layout
        $header = self::getHeader();
        $sidebar = self::getSidebar();
        $footer = self::getFooter();
        // Obtener el contenido solicitado
        ob_start();
        require_once(BASE_DIR . '/tienda/views/' . $view_file . '.php');
        $content = ob_get_clean();
        // TODO: generar y retornar el layout con los datos de la vista 
        $layout = self::getLayout(
            $header,
            $sidebar,
            $content,
            $footer
        );
        echo $layout;
    }

    private static function getLayout(
        string $header,
        string $sidebar,
        string $content,
        string $footer
    )
    {
        ob_start();
        require_once(BASE_DIR . '/tienda/views/layout/layout.php');
        return ob_get_clean();
    }
    private static function getHeader()
    {

        ob_start();
        require_once(BASE_DIR . '/tienda/views/layout/header.php');
        return ob_get_clean();
    }
    private static function getSidebar()
    {
        ob_start();
        require_once(BASE_DIR . '/tienda/views/layout/sidebar.php');
        return ob_get_clean();
    }
    private static function getFooter()
    {
        ob_start();
        require_once(BASE_DIR . '/tienda/views/layout/footer.php');
        return ob_get_clean();
    }
}