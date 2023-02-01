<?
namespace tienda\models;
use tienda\domain\Product;

class ProductsModel
{
    public function getAllProducts() {
        return Product::all();
    }

    // TODO: getFeaturedProducts()
}