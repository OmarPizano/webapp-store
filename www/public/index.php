<?php
require('../tienda/config/app_config.php');
require(BASE_DIR . '/tienda/config/db.php');
require(BASE_DIR . '/vendor/autoload.php');

use tienda\core\Router;
use tienda\core\Request;
use tienda\core\Session;

use tienda\controller\ProductListController;
use tienda\controller\UserController;

Session::start();

Router::get('/', [ProductListController::class, 'getFeatured']);
Router::post('/login', [UserController::class, 'login']);
Router::get('/login', [UserController::class, 'login']);
Router::get('/logout', [UserController::class, 'logout']);
Router::get('/signup', [UserController::class, 'signup']);
Router::post('/signup', [UserController::class, 'signup']);
Router::get('/product/admin', [ProductListController::class, 'crudProducts']);
Router::post('/product/admin', [ProductListController::class, 'crudProducts']);

$request = new Request;

Router::resolve($request);