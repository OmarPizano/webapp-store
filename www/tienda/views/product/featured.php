<?
use tienda\core\ui\product\Product;
use tienda\core\ui\product\ProductList;

ProductList::begin('Productos Destacados');
Product::item(BASE_URL . '/public/assets/logo.png','1000.00','-50%','2000.00','#','#','Producto N MARCA MODELO'); 
Product::item(BASE_URL . '/public/assets/logo.png','1000.00','-50%','2000.00','#','#','Producto N MARCA MODELO'); 
Product::item(BASE_URL . '/public/assets/logo.png','1000.00','-50%','2000.00','#','#','Producto N MARCA MODELO'); 
Product::item(BASE_URL . '/public/assets/logo.png','1000.00','-50%','2000.00','#','#','Producto N MARCA MODELO'); 
Product::item(BASE_URL . '/public/assets/logo.png','1000.00','-50%','2000.00','#','#','Producto N MARCA MODELO'); 
Product::item(BASE_URL . '/public/assets/logo.png','1000.00','-50%','2000.00','#','#','Producto N MARCA MODELO'); 
ProductList::end();