<?
namespace tienda\core\ui;

class Form
{
    public static function begin(string $action, string $method) {
        echo sprintf('
        <form action="%s" method="%s">
        ', $action, $method);
    }
    public static function end() {
        echo sprintf('
        </form>
        ');
    }
    public static function input(
        string $type,
        string $name,
        string $value = '',
        string $placeholder = '',
        string $html_params = '',
        string $error_msg = '') {
        echo sprintf('
            <input type="%s" name="%s" value="%s" placeholder="%s" %s>
            <div class="error-feedback">%s</div>
        ', $type, $name, $value, $placeholder, $html_params, $error_msg);
    }
    public static function submit(string $text) {
        echo sprintf('
            <input type="submit" class="btn btn-black" value="%s">
        ', $text);
    }
}