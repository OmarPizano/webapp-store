<?
namespace tienda\models;
use tienda\domain\Product;

class ProductListModel
{
    private $product_list = [];

    public $search = '';

    public function selectAllProducts() {
        $this->product_list = Product::all();
    }

    public function searchProducts(string $search) {
        $this->search = $search;
        $list = Product::all();
        $this->product_list = [];
        foreach($list as $p) {
            if (str_contains(strtolower($p->getName()), strtolower($search))) {
                $this->product_list[] = $p;
            }
        }
    }

    public function getProductList() {
        return $this->product_list;
    }
}