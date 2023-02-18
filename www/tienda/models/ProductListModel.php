<?
namespace tienda\models;
use tienda\domain\Product;

class ProductListModel
{
    /**
     * Carga todos los productos en el modelo.
     */
    public function getAll() {
        return Product::all();
    }
}