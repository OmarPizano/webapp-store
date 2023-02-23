<?php
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

    public int $id;
    public int $category_id;
    public string $product_name;
    public string $product_description;
    public float $product_price;
    public int $product_stock;
    public int $product_discount;
    public string $product_image;

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
        return '-' . strval($this->product_discount . '%');
    }
    public function getImage() {
        return $this->product_image;
    }
}