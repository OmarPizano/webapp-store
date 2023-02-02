<?php
use tienda\models\ProductsModel;
require('../tienda/config/app_config.php');
require(BASE_DIR . '/tienda/config/db.php');
require(BASE_DIR . '/vendor/autoload.php');

use tienda\core\Router;
use tienda\core\Request;
use tienda\core\Session;
use tienda\controller\ProductController;
use tienda\controller\UserController;

Session::start();

Router::get('/',
    [ProductController::class, 'getFeatured'],
    [ProductsModel::class, 'getAll'],
    'product/featured'
);
Router::get('/register',
    [UserController::class, 'showForm'],
    [UserModel::class],
    'user/register'
);
Router::post('/register',
    [UserController::class, 'submitForm'],
    [UserModel::class],
    'user/register');

$request = new Request;

Router::resolve($request);
