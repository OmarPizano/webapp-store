<h1>Productos Destacados</h1>
<?
use tienda\core\ui\ProductList;

ProductList::begin();
ProductList::item(ASSET_URL . '/logo.png', '$1000.00', '-50%', '$2000.00', '#', '#', 'Producto N Marca N');
ProductList::item(ASSET_URL . '/logo.png', '$1000.00', '-50%', '$2000.00', '#', '#', 'Producto N Marca N');
ProductList::item(ASSET_URL . '/logo.png', '$1000.00', '-50%', '$2000.00', '#', '#', 'Producto N Marca N');
ProductList::item(ASSET_URL . '/logo.png', '$1000.00', '-50%', '$2000.00', '#', '#', 'Producto N Marca N');
ProductList::item(ASSET_URL . '/logo.png', '$1000.00', '-50%', '$2000.00', '#', '#', 'Producto N Marca N');
ProductList::item(ASSET_URL . '/logo.png', '$1000.00', '-50%', '$2000.00', '#', '#', 'Producto N Marca N');
ProductList::end();