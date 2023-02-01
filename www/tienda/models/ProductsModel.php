<?
namespace tienda\models;
use tienda\core\Model;
use tienda\domain\Product;

class ProductsModel extends Model
{
    public function getAllProducts() {
        return Product::all();
    }

    // TODO: getFeaturedProducts()
}