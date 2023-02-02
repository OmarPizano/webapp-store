<?
namespace tienda\controller;
use tienda\models\ProductsModel;

class ProductController
{
    public static function getFeatured(ProductsModel $model) {
        return $model;
    }
}