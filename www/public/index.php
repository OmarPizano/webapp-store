<?php
require('../tienda/config/app_config.php');
require(BASE_DIR . '/tienda/config/db.php');
require(BASE_DIR . '/vendor/autoload.php');

use tienda\core\Request;
use tienda\core\Response;

$request = new Request;
$name = $request->query('name', 'World');

$content = '<h1>Hello ' . $name . '!</h1>';
$response = new Response($content, 200);
$response->send();