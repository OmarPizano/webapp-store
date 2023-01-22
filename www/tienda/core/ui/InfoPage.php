<?
namespace tienda\core\ui;

class InfoPage
{
    public static function info(string $img, string $text) {
        echo sprintf('
        <div class="info-page">
            <img src="%s" alt="info-img">
            <p>%s</p>
        </div>
        ', $img, $text);
    }
}