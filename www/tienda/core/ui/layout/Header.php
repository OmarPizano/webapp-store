<?
namespace tienda\core\ui\layout;

class Header
{
    public static function logo(string $logo_path)
    {
        echo sprintf('
        <div id="logo">
            <a href="/"><img src="%s" alt="logo"></a>
        </div>
        ', $logo_path);
    }
    public static function nav_start()
    {
        echo sprintf('
        <nav id="menu">
        <ul>
        ');
    }
    public static function nav_item(string $href, string $text)
    {
        echo sprintf('
        <li><a href="%s">%s</a></li>
        ', $href, $text);
    }
    public static function nav_end()
    {
        echo sprintf('
        </ul>
        </nav>
        ');
    }
}