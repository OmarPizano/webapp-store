<?
namespace tienda\models;
use tienda\domain\Product;

class ProductListModel
{
    public $id = '';
    public $category_id = '';
    public $product_name = '';
    public $product_description = '';
    public $product_price = '';
    public $product_stock = '';
    public $product_discount = '';
    public $product_image = '';

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

    public function loadProduct(string $id) {
        $p = Product::find($id);
        $attrs = get_object_vars($p);
        foreach ($attrs as $key => $atr) {
            if (property_exists($this, $key)) {
                $this->{$key} = $atr;
            }
        }
    }
}