<?php
namespace tienda\models;
use tienda\core\Request;
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

    private array $allowed_filetypes = [
        'image/png' => 'png',
        'image/jpeg' => 'jpg'
    ];
    
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

    public function loadModel(array $request_dump) {
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
                if ($key === 'product_image') {
                    $path = $this->product_image;
                    $ext = $this->checkFile($path);
                    if (!$ext) {
                        return false;
                    }
                    $filename = basename($path);
                    $target = BASE_DIR . '/public/assets/products';
                    $new_path = $target . '/' . $filename . '.' . $ext;
                    if (!copy($path, $new_path)) {
                        echo '<pre>'; var_dump($new_path); echo '</pre>';
                        return false;
                    }
                    $p->{$key} = '/products/' . $filename . '.' . $ext;
                    unlink($path);
                } else {
                    $p->{$key} = $this->{$key};
                }
            }
        }
        return $p->save();
    }

    private function checkFile(string $path) {
        $size = filesize($path);
        $type = finfo_file(finfo_open(FILEINFO_MIME_TYPE), $path);
        if (! file_exists($path)) {
            return false;
        }
        if ($size === 0 or $size > 1048576) {
            return false;
        }
        if (! in_array($type, array_keys($this->allowed_filetypes))) {
            return false;
        }
        return $this->allowed_filetypes[$type];
    }
}