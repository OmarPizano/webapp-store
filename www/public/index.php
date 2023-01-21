<?php
use tienda\core\View;
require('../tienda/config/app_config.php');
require(BASE_DIR . '/tienda/config/db.php');
require(BASE_DIR . '/vendor/autoload.php');

use tienda\core\Request;
use tienda\core\Response;

// $view = View::render('product/featured');
$view = View::render('user/register');
$response = new Response($view, 200);
$response->send();