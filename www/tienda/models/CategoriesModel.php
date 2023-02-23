<?php

namespace tienda\models;
use tienda\domain\Category;

class CategoriesModel
{
    private array $categories_list = [];

    public function selectAll() {
        $this->categories_list = Category::all();
    }

    public function getTop() {
        // TODO: obtener las 2 categorías con mas pedidos
        return array_slice($this->categories_list, 0, 3);
    }
    public function getAll() {
        // TODO: obtener las 2 categorías con mas pedidos
        return $this->categories_list;
    }
}