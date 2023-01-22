<?php
require('../tienda/config/app_config.php');
require(BASE_DIR . '/tienda/config/db.php');
require(BASE_DIR . '/vendor/autoload.php');

use tienda\core\Request;
use tienda\core\Router;
use tienda\controller\ProductController;

Router::get('/', [new ProductController, 'featured']);

Router::resolve(new Request);