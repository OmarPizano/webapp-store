<?
namespace tienda\models;
use tienda\core\FormValidation;
use tienda\domain\Product;

class ProductsModel extends FormValidation
{
    public function getAllProducts() {
        return Product::all();
    }

    // TODO: getFeaturedProducts()
}