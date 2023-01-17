<?
namespace tienda\core\ui\form;

class Form
{
    public static function begin(string $action, string $method)
    {
        echo sprintf('
        <form action="%s" method="%s">
        ', $action, $method);
    }
    public static function input(
        string $type,
        string $name,
        string $placeholder,
        string $value = '',
        string $htmlparams = '',
        string $error_msg = '')
    {
        echo sprintf('
        <input type="%s" name="%s" placeholder="%s" value="%s" %s>
        <div class="input-error">%s</div>
        ', $type, $name, $placeholder, $value, $htmlparams, $error_msg);
    }
    public static function submit(string $value)
    {
        echo sprintf('
        <input type="submit" class="btn btn-black" value="%s">
        ', $value);
    }
    public static function end()
    {
        echo sprintf('
        </form>
        ');
    }
}