<?
namespace tienda\core\ui;

class Button
{
    public static function normal(string $href, string $text) {
        echo sprintf('
        <a href="%s" class="btn normal">%s</a>
        ', $href, $text);
    }
    public static function black(string $href, string $text) {
        echo sprintf('
        <a href="%s" class="btn black">%s</a>
        ', $href, $text);
    }
}