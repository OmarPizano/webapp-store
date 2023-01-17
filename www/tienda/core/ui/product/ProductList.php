<?
namespace tienda\core\ui\product;

class ProductList
{
    public static function begin(string $title)
    {
        echo sprintf('
        <h1>%s</h1>
        <div id="product-list">
        ', $title);
    }
    public static function end()
    {
        echo sprintf('
        </div>
        ');
    }
}