<?
namespace tienda\core\ui;
use tienda\core\Model;

class Form
{
    private static $model;

    public static function begin(string $action, string $method, $model) {
        self::$model = $model;
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
        string $placeholder,
        string $html_params) {
        echo sprintf('
            <input type="%s" name="%s" value="%s" placeholder="%s" %s>
            <div class="error-feedback">%s</div>
        ', $type, $name, self::$model->{$name}, $placeholder, $html_params, self::$model->errors[$name][0] ?? '');
    }
    public static function submit(string $text, string $name) {
        echo sprintf('
            <input type="submit" class="btn btn-black" value="%s" name="%s">
        ', $text, $name);
    }
}