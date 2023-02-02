<?
namespace tienda\models;
use tienda\domain\Product;

class ProductsModel
{
    public function getAll() {
        return Product::all();
    }

    // TODO: getFeaturedProducts()
}