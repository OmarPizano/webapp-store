<?
namespace tienda\core\ui\layout;

class Sidebar
{
    public static function begin(string $title)
    {
        echo sprintf('
        <div id="user">
            <div id="login-form">
                <h3>%s</h3>
        ', $title);
    }
    public static function end()
    {
        echo sprintf('
            </div>
        </div>
        ');
    }
}