<?
namespace tienda\core\ui;

class Menu
{
    public static function begin() {
        echo sprintf('
        <ul>
        ');
    }
    public static function end() {
        echo sprintf('
        </ul>
        ');
    }
    public static function item(string $href, string $text) {
        echo sprintf('
            <li><a href="%s">%s</a></li>
        ', $href, $text);
    }
}