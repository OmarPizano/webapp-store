<?php
namespace tienda\models;
use tienda\domain\Product;

class ProductListModel
{
    public int $id = 0;
    public int $category_id = 0;
    public string $product_name = '';
    public string $product_description = '';
    public float $product_price = 0.0;
    public int $product_stock = 0;
    public int $product_discount = 0;
    public string $product_image = '';

    private $product_list = [];
    
    public $crud_names = [
        'product_image' => 'Imagen',
        'product_name' => 'Nombre',
        'category_id' => 'Categoría',
        'product_stock' => 'Stock',
        'product_price' => 'Precio',
        'product_discount' => 'Descuento',
    ];

    public $search = '';

    public function selectAllProducts() {
        $this->product_list = Product::all();
    }

    public function searchProducts(string $search) {
        $this->search = $search;
        $list = Product::all();
        $this->product_list = [];
        foreach($list as $p) {
            if (str_contains(strtolower($p->name), strtolower($search))) {
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

    public function loadMoel(array $request_dump) {
        foreach ($request_dump as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }

    public function updateProduct() {
        $p = Product::find($this->id);
        $attrs = get_object_vars($p);
        foreach ($attrs as $key => $atr) {
            if (property_exists($this, $key)) {
                if (empty($this->{$key})) {
                    continue;
                }
                $p->{$key} = $this->{$key};
            }
        }
        echo '<pre>'; var_dump($_FILES); echo '</pre>';
        return $p->save();
    }

    private function checkFile(string $path) {
        if (! file_exists($path)) {
            return 1;
        }
    }
}