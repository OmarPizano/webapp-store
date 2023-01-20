<?php
use tienda\core\View;
require('../tienda/config/app_config.php');
require(BASE_DIR . '/tienda/config/db.php');
require(BASE_DIR . '/vendor/autoload.php');

use tienda\core\Request;
use tienda\core\Response;

$request = new Request;
$response = new Response();

$name = $request->query('name', 'World');
$view = View::render('test', ['name' => $name]);

$response->content = $view;
$response->status = 200;
$response->send();