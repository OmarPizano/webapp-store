<?php
namespace tienda\domain;
use tienda\core\ActiveRecord;

class Category extends ActiveRecord
{
    protected static string $primary_key = 'id';
    protected static string $table_name = 'categories';
    protected static array $table_columns = [
        'id',
        'category_name'
    ];

    public string $id;
    public string $category_name;
}