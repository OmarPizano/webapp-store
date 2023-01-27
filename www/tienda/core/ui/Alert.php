<?
namespace tienda\core\ui;

class Alert
{
    public static function show(string $text, string $type) {
        echo sprintf('
        <div class="alert alert-%s">%s</div>
        ', $type, $text);
    }
}