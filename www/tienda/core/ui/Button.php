<?
namespace tienda\core\ui;

class Button
{
    public static function normal(string $href, string $text) {
        echo sprintf('
        <a href="%s" class="btn btn-normal">%s</a>
        ', $href, $text);
    }
    public static function black(string $href, string $text) {
        echo sprintf('
        <a href="%s" class="btn btn-black">%s</a>
        ', $href, $text);
    }
    public static function login(string $href, string $text) {
        echo sprintf('
        <a href="%s" class="btn-login">%s</a>
        ', $href, $text);
    }
    public static function signup(string $href, string $text) {
        echo sprintf('
        <a href="%s" class="btn-signup">%s</a>
        ', $href, $text);
    }
}