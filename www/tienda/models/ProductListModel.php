<?
namespace tienda\models;
use tienda\domain\Product;

class ProductListModel
{
    private $product_list = [];


    public function selectAllProducts() {
        $this->product_list = Product::all();
    }

    public function getProductList() {
        return $this->product_list;
    }
}