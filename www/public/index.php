<?php
require('../tienda/config/app_config.php');
require(BASE_DIR . '/tienda/config/db.php');
require(BASE_DIR . '/vendor/autoload.php');

use tienda\core\Router;
use tienda\core\Request;
use tienda\controller\ProductController;
use tienda\controller\UserController;

Router::get('/', [new ProductController, 'featured']);
Router::get('/register', [new UserController, 'register']);
Router::post('/register', [new UserController, 'register']);

$request = new Request;

Router::resolve($request);
