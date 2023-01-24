<?php
use tienda\controller\TestController;
use tienda\core\Request;
require('../tienda/config/app_config.php');
require(BASE_DIR . '/tienda/config/db.php');
require(BASE_DIR . '/vendor/autoload.php');

use tienda\core\Router;
use tienda\controller\ProductController;
use tienda\controller\UserController;

Router::get('/', [new ProductController, 'featured']);
// Router::get('/register', [new UserController, 'register']);
// Router::post('/register', [new UserController, 'register']);
Router::get('/hello/{name}', [new TestController, 'hello']);

$request = new Request;

Router::resolve($request);
