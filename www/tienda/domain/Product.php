<?
namespace tienda\domain;
use tienda\core\ActiveRecord;

class Product extends ActiveRecord
{
    protected static string $primary_key = 'id';
    protected static string $table_name = 'products';
    protected static array $table_columns = [
        'id',
        'category_id',
        'product_name',
        'product_description',
        'product_price',
        'product_stock',
        'product_discount',
        'product_image'
    ];

    protected string $id;
    protected string $category_id;
    protected string $product_name;
    protected string $product_description;
    protected float $product_price;
    protected int $product_stock;
    protected float $product_discount;
    protected string $product_image;

    public function __construct(
        string $id = '',
        string $category_id = '',
        string $product_name = '',
        string $product_description = '',
        float $product_price = 0.0,
        int $product_stock = 0,
        float $product_discount = 0.0,
        string $product_image = ''
    ) {
        $this->id = $id;
        $this->category_id = $category_id;
        $this->product_name = $product_name;
        $this->product_description = $product_description;
        $this->product_price = $product_price;
        $this->product_stock = $product_stock;
        $this->product_discount = $product_discount;
        $this->product_image = $product_image;
    }

    public function getID() {
        return strval($this->id);
    }
    public function getCategoryID() {
        return strval($this->category_id);
    }
    public function getName() {
        return $this->product_name;
    }
    public function getstock() {
        return strval($this->product_stock);
    }
    public function getCurrentPrice() {
        $price = $this->product_price;
        $discount = $this->product_discount;
        $current = $price - ($price * $discount / 100);
        return '$' . strval($current);
    }
    public function getPrice() {
        return '$' . strval($this->product_price);
    }
    public function getDiscount() {
        return '-' . strval($this->product_discount) . '%';
    }
    public function getImage() {
        return $this->product_image;
    }
}