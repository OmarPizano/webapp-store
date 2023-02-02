<?php
require('../tienda/config/app_config.php');
require(BASE_DIR . '/tienda/config/db.php');
require(BASE_DIR . '/vendor/autoload.php');

use tienda\core\Router;
use tienda\core\Request;
use tienda\core\Session;
use tienda\controller\ProductController;
use tienda\controller\UserController;
use tienda\models\ProductsModel;
use tienda\models\UserModel;

Session::start();

Router::get('/',
    [ProductController::class, 'getFeatured'],
    [ProductsModel::class],
    'product/featured'
);
Router::get('/register',
    [UserController::class, 'showRegisterForm'],
    [UserModel::class],
    'user/register'
);
Router::post('/register',
    [UserController::class, 'submitRegisterForm'],
    [UserModel::class],
    'user/register'
);

$request = new Request;

Router::resolve($request);
